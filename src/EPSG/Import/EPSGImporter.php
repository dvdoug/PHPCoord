<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

use SQLite3;

use function file_exists;
use function file_get_contents;
use function file_put_contents;
use function json_encode;
use function ksort;
use function sleep;
use function str_starts_with;
use function substr;
use function unlink;

use const JSON_PRETTY_PRINT;
use const JSON_THROW_ON_ERROR;
use const JSON_UNESCAPED_SLASHES;
use const SQLITE3_ASSOC;
use const SQLITE3_OPEN_CREATE;
use const SQLITE3_OPEN_READONLY;
use const SQLITE3_OPEN_READWRITE;

class EPSGImporter
{
    private string $resourceDir;

    private const BOM = "\xEF\xBB\xBF";

    private const BUFFER_THRESHOLD = 150; // rough guess at where map maker got bored adding vertices for complex shapes
    private const BUFFER_SIZE = 0.1; // approx 10km

    public function __construct()
    {
        $this->resourceDir = __DIR__ . '/../../../resources';
    }

    public function dataFromSQLFiles(): void
    {
        // remove old file if any
        if (file_exists($this->resourceDir . '/epsg/epsg.sqlite')) {
            unlink($this->resourceDir . '/epsg/epsg.sqlite');
        }

        $sqlite = new SQLite3(
            $this->resourceDir . '/epsg/epsg.sqlite',
            SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE
        );

        $sqlite->enableExceptions(true);
        $sqlite->exec('PRAGMA journal_mode=WAL'); // WAL is faster

        $tableSchema = file_get_contents($this->resourceDir . '/epsg/PostgreSQL_Table_Script.sql');
        if (str_starts_with($tableSchema, self::BOM)) {
            $tableSchema = substr($tableSchema, 3);
        }
        $sqlite->exec($tableSchema);

        $tableData = file_get_contents($this->resourceDir . '/epsg/PostgreSQL_Data_Script.sql');
        if (str_starts_with($tableData, self::BOM)) {
            $tableData = substr($tableData, 3);
        }
        $sqlite->exec($tableData);

        // Custom alias/no-op method
        $sqlite->exec("INSERT INTO epsg_coordoperationmethod (coord_op_method_code, coord_op_method_name, reverse_op, data_source, revision_date, deprecated, remarks) VALUES (32768, 'Alias', 1, 'PHPCoord', '2021-10-28', 0, '')");

        // Corrections
        $sqlite->exec("UPDATE epsg_coordoperationparamvalue SET param_value_file_ref = NULL WHERE param_value_file_ref = ''");
        $sqlite->exec('UPDATE epsg_coordinateaxis SET uom_code = 9102 WHERE uom_code = 9122'); // supplier-defined degrees to regular degrees
        $sqlite->exec('UPDATE epsg_coordoperation SET deprecated = 1 WHERE coord_op_code IN (1851, 9235, 15933)');
        $sqlite->exec('DELETE FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_code = 9912;'); // erroneous test entry
        $sqlite->exec('DELETE FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_code = 10480;'); // deprecated, but never in a release
        $sqlite->exec('DELETE FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_code = 10788;'); // deprecated, but never in a release
        $sqlite->exec("DELETE FROM epsg_usage WHERE object_table_name = 'epsg_coordoperation' AND object_code = 1240 AND extent_code = 4780;"); // Global, but also listed as Vietnam-specific

        /*
         * AusGeoidv2 abuses the NTv2 file format to have very large files, and a confusing implementation (latitude shifts are actually height offsets),
         * so use a GTX conversion of those files instead...
         */
        $sqlite->exec('UPDATE epsg_coordoperation SET coord_op_method_code = 1088 WHERE coord_op_code IN (9465, 9466, 9467, 9693)');
        $sqlite->exec('UPDATE epsg_coordoperation SET coord_op_method_code = 9665 WHERE coord_op_code IN (5656, 5657, 8451, 9461, 9692)');

        $sqlite->exec("UPDATE epsg_coordoperationparamvalue SET param_value_file_ref = REPLACE(param_value_file_ref, '.gsb', '.gtx') WHERE coord_op_code IN (9465, 9466, 9467, 9693) OR coord_op_code IN (5656, 5657, 8451, 9692)");
        $sqlite->exec('UPDATE epsg_coordoperationparamvalue SET coord_op_method_code = 1088 WHERE coord_op_code IN (9465, 9466, 9467, 9693)');
        $sqlite->exec('UPDATE epsg_coordoperationparamvalue SET coord_op_method_code = 9665 WHERE coord_op_code IN (5656, 5657, 8451, 9692)');

        /*
         * VERTCON files/extents described in EPSG are the old VERTCON1/2 .94 file format, not the VERTCON3 .b files
         * which cover geographically different extents. Therefore we use the official NOAA VDatum GTX conversions of the
         * older files instead to avoid yet-another-grid-format implementation.
         */
        $sqlite->exec('UPDATE epsg_coordoperation SET coord_op_method_code = 1084 WHERE coord_op_code IN (7969, 7970, 7971)');
        $sqlite->exec("UPDATE epsg_coordoperationparamvalue SET param_value_file_ref = REPLACE(param_value_file_ref, '.94', '.gtx') WHERE coord_op_code IN (7969, 7970, 7971)");
        $sqlite->exec('UPDATE epsg_coordoperationparamvalue SET coord_op_method_code = 1084 WHERE coord_op_code IN (7969, 7970, 7971)');

        /*
         * Transformation from S-JTSK [JTSK03] to S-JTSK is listed as NADCON even though there's an official NTv2 file.
         * EPSG have declined to add it as an alternate to the DB, so override that here.
         */
        $sqlite->exec('UPDATE epsg_coordoperation SET coord_op_method_code = 9615 WHERE coord_op_code = 8364');
        $sqlite->exec('DELETE FROM epsg_coordoperationparamvalue WHERE coord_op_code = 8364');
        $sqlite->exec("INSERT INTO epsg_coordoperationparamvalue (coord_op_code, coord_op_method_code, parameter_code, param_value_file_ref) VALUES (8364, 9615, 8656, 'Slovakia_JTSK03_to_JTSK.gsb')");

        /*
         * NKG_RF17vel is registered as Gravsoft three-file GRI (method 1139). The public product is one GeoTIFF;
         * remap onto a PHPCoord GTG point-motion method. Operation 10808 is geographic 3D ETRF2014 (EPSG 8403).
         */
        $sqlite->exec("INSERT INTO epsg_coordoperationmethod (coord_op_method_code, coord_op_method_name, reverse_op, data_source, revision_date, deprecated, remarks) VALUES (32769, 'Point motion (geog3D domain) using NEU velocity grid (gtg)', 1, 'PHPCoord', '2026-09-13', 0, 'NKG registered Gravsoft three-file GRI; public product is one GeoTIFF')");
        $sqlite->exec("INSERT INTO epsg_coordoperationparamusage (coord_op_method_code, parameter_code, sort_order, param_sign_reversal) VALUES (32769, 1050, 1, 'No')");
        $sqlite->exec("INSERT INTO epsg_coordoperationparamusage (coord_op_method_code, parameter_code, sort_order, param_sign_reversal) VALUES (32769, 1048, 2, 'No')");
        $sqlite->exec('UPDATE epsg_coordoperation SET coord_op_method_code = 32769 WHERE coord_op_code = 10808');
        $sqlite->exec('DELETE FROM epsg_coordoperationparamvalue WHERE coord_op_code = 10808 AND parameter_code IN (1072, 1073, 1074)');
        $sqlite->exec('UPDATE epsg_coordoperationparamvalue SET coord_op_method_code = 32769 WHERE coord_op_code = 10808');
        $sqlite->exec("INSERT INTO epsg_coordoperationparamvalue (coord_op_code, coord_op_method_code, parameter_code, param_value_file_ref) VALUES (10808, 32769, 1050, 'eur_nkg_nkgrf17vel.tif')");

        /*
         * Time-dependent transformations from/to WGS84 are only present in transforms involving specific realisations
         * so add transforms to/from the generic ensemble codes to the most recent version.
         * XXX technically, the ensemble accuracy is 2m not 0, but we're actively assuming the latest realisation
         */
        $sqlite->exec("INSERT INTO epsg_coordoperation (coord_op_code, coord_op_name, coord_op_type, source_crs_code, target_crs_code, coord_op_method_code, coord_op_accuracy, data_source, revision_date, deprecated, show_operation, remarks) VALUES (32768, 'WGS 84 to WGS 84 (G2296) (geocen)', 'transformation', 4978, 10604, 32768, 0, 'PHPCoord', '2024-03-06', 0, 1, '')");
        $sqlite->exec("INSERT INTO epsg_usage (object_table_name, object_code, extent_code, scope_code) VALUES ('epsg_coordoperation', 32768, 1262, 1203)");
        $sqlite->exec("INSERT INTO epsg_coordoperation (coord_op_code, coord_op_name, coord_op_type, source_crs_code, target_crs_code, coord_op_method_code, coord_op_accuracy, data_source, revision_date, deprecated, show_operation, remarks) VALUES (32769, 'WGS 84 to WGS 84 (G2296) (geog2D)', 'transformation', 4326, 10606, 32768, 0, 'PHPCoord', '2024-03-06', 0, 1, '')");
        $sqlite->exec("INSERT INTO epsg_usage (object_table_name, object_code, extent_code, scope_code) VALUES ('epsg_coordoperation', 32769, 1262, 1203)");
        $sqlite->exec("INSERT INTO epsg_coordoperation (coord_op_code, coord_op_name, coord_op_type, source_crs_code, target_crs_code, coord_op_method_code, coord_op_accuracy, data_source, revision_date, deprecated, show_operation, remarks) VALUES (32770, 'WGS 84 to WGS 84 (G2296) (geog3D)', 'transformation', 4979, 10605, 32768, 0, 'PHPCoord', '2024-03-06', 0, 1, '')");
        $sqlite->exec("INSERT INTO epsg_usage (object_table_name, object_code, extent_code, scope_code) VALUES ('epsg_coordoperation', 32770, 1262, 1203)");
        $sqlite->exec("INSERT INTO epsg_coordoperation (coord_op_code, coord_op_name, coord_op_type, source_crs_code, target_crs_code, coord_op_method_code, coord_op_accuracy, data_source, revision_date, deprecated, show_operation, remarks) VALUES (32771, 'WGS 84 to WGS 84 (G2296) (geog2D to geocen)', 'transformation', 4326, 10604, 9602, 0, 'PHPCoord', '2024-03-06', 0, 1, '')");
        $sqlite->exec("INSERT INTO epsg_usage (object_table_name, object_code, extent_code, scope_code) VALUES ('epsg_coordoperation', 32771, 1262, 1203)");
        $sqlite->exec("INSERT INTO epsg_coordoperation (coord_op_code, coord_op_name, coord_op_type, source_crs_code, target_crs_code, coord_op_method_code, coord_op_accuracy, data_source, revision_date, deprecated, show_operation, remarks) VALUES (32772, 'WGS 84 to WGS 84 (G2296) (geog3D to geocen)', 'transformation', 4979, 10604, 9602, 0, 'PHPCoord', '2024-03-06', 0, 1, '')");
        $sqlite->exec("INSERT INTO epsg_usage (object_table_name, object_code, extent_code, scope_code) VALUES ('epsg_coordoperation', 32772, 1262, 1203)");

        /*
         * Geographic 2D WGS 84 only links to geocentric via geographic 3D (two conversions). A direct
         * geog2D↔geocentric conversion of the same ensemble datum keeps time-dependent paths within
         * the path-finder depth.
         */
        $sqlite->exec("INSERT INTO epsg_coordoperation (coord_op_code, coord_op_name, coord_op_type, source_crs_code, target_crs_code, coord_op_method_code, coord_op_accuracy, data_source, revision_date, deprecated, show_operation, remarks) VALUES (32780, 'WGS 84 to WGS 84 (geog2D to geocen)', 'transformation', 4326, 4978, 9602, 0, 'PHPCoord', '2026-09-10', 0, 1, '')");
        $sqlite->exec("INSERT INTO epsg_usage (object_table_name, object_code, extent_code, scope_code) VALUES ('epsg_coordoperation', 32780, 1262, 1203)");

        /*
         * Time-dependent ETRS89 operations are on ETRF2000 geocentric. These hops reach that hub from the
         * ensemble CRS; accuracy is the ETRS89 ensemble accuracy.
         */
        $etrs89EnsembleAccuracy = $sqlite->querySingle('SELECT ensemble_accuracy FROM epsg_datumensemble WHERE datum_ensemble_code = 6258');
        $sqlite->exec("INSERT INTO epsg_coordoperation (coord_op_code, coord_op_name, coord_op_type, source_crs_code, target_crs_code, coord_op_method_code, coord_op_accuracy, data_source, revision_date, deprecated, show_operation, remarks) VALUES (32773, 'ETRS89 to ETRF2000 (geocen)', 'transformation', 4936, 7930, 32768, {$etrs89EnsembleAccuracy}, 'PHPCoord', '2023-02-23', 0, 1, '')");
        $sqlite->exec("INSERT INTO epsg_usage (object_table_name, object_code, extent_code, scope_code) VALUES ('epsg_coordoperation', 32773, 1298, 1203)");
        $sqlite->exec("INSERT INTO epsg_coordoperation (coord_op_code, coord_op_name, coord_op_type, source_crs_code, target_crs_code, coord_op_method_code, coord_op_accuracy, data_source, revision_date, deprecated, show_operation, remarks) VALUES (32776, 'ETRS89 to ETRF2000 (geog2D to geocen)', 'transformation', 4258, 7930, 9602, {$etrs89EnsembleAccuracy}, 'PHPCoord', '2023-02-23', 0, 1, '')");
        $sqlite->exec("INSERT INTO epsg_usage (object_table_name, object_code, extent_code, scope_code) VALUES ('epsg_coordoperation', 32776, 1298, 1203)");
        $sqlite->exec("INSERT INTO epsg_coordoperation (coord_op_code, coord_op_name, coord_op_type, source_crs_code, target_crs_code, coord_op_method_code, coord_op_accuracy, data_source, revision_date, deprecated, show_operation, remarks) VALUES (32781, 'ETRS89 ensemble member to ETRS89', 'transformation', 4258, 4258, 32768, {$etrs89EnsembleAccuracy}, 'PHPCoord', '2026-09-11', 0, 1, '')");
        $sqlite->exec("INSERT INTO epsg_usage (object_table_name, object_code, extent_code, scope_code) VALUES ('epsg_coordoperation', 32781, 1298, 1203)");

        /*
         * EPSG has a transform listed from generic ETRS89 (2D) to generic WGS84 (2D) but not the 3D for some reason
         */
        $sqlite->exec("INSERT INTO epsg_coordoperation (coord_op_code, coord_op_name, coord_op_type, source_crs_code, target_crs_code, coord_op_method_code, coord_op_accuracy, data_source, revision_date, deprecated, show_operation, remarks) VALUES (32778, 'ETRS89 to WGS 84 (geocen)', 'transformation', 4936, 4978, 32768, 1, 'PHPCoord', '2023-02-19', 0, 1, '')");
        $sqlite->exec("INSERT INTO epsg_usage (object_table_name, object_code, extent_code, scope_code) VALUES ('epsg_coordoperation', 32778, 1262, 1298)");
        $sqlite->exec("INSERT INTO epsg_coordoperation (coord_op_code, coord_op_name, coord_op_type, source_crs_code, target_crs_code, coord_op_method_code, coord_op_accuracy, data_source, revision_date, deprecated, show_operation, remarks) VALUES (32779, 'ETRS89 to WGS 84 (geog3D)', 'transformation', 4937, 4979, 32768, 1, 'PHPCoord', '2023-02-19', 0, 1, '')");
        $sqlite->exec("INSERT INTO epsg_usage (object_table_name, object_code, extent_code, scope_code) VALUES ('epsg_coordoperation', 32779, 1262, 1298)");

        /*
         * Too many "world" extents with confusing descriptions, unify
         */
        $sqlite->exec('UPDATE epsg_usage SET extent_code = 1262 WHERE extent_code IN (1263, 2346, 2830, 4393, 4520, 4523)');

        /*
         * Shorten extent names
         */
        $sqlite->exec("UPDATE epsg_extent SET extent_description = REPLACE(extent_description, 'United Arab Emirates (UAE)', 'UAE')");
        $sqlite->exec("UPDATE epsg_extent SET extent_description = REPLACE(extent_description, 'United Kingdom (UK)', 'UK')");
        $sqlite->exec("UPDATE epsg_extent SET extent_description = REPLACE(extent_description, 'United States (USA)', 'USA')");
        $sqlite->exec("UPDATE epsg_extent SET extent_description = REPLACE(extent_description, 'Russian Federation', 'Russia')");
        $sqlite->exec("UPDATE epsg_extent SET extent_description = REPLACE(extent_description, 'Türkiye (Turkey)', 'Turkey')");
        $sqlite->exec("UPDATE epsg_extent SET extent_description = REPLACE(extent_description, ' All onshore and offshore.', '')");
        $sqlite->exec("UPDATE epsg_extent SET extent_description = REPLACE(extent_description, ' - onshore and offshore', '')");
        $sqlite->exec("UPDATE epsg_extent SET extent_description = REPLACE(extent_description, 'onshore and offshore - ', '- ')");
        $sqlite->exec("UPDATE epsg_extent SET extent_description = REPLACE(extent_description, ', onshore and offshore.', '.')");
        $sqlite->exec("UPDATE epsg_extent SET extent_description = REPLACE(extent_description, ', onshore and offshore', ', ')");
        $sqlite->exec("UPDATE epsg_extent SET extent_description = REPLACE(extent_description, 'onshore and offshore.', '.')");
        $sqlite->exec("UPDATE epsg_extent SET extent_description = REPLACE(extent_description, ' onshore and offshore', '')");

        $sqlite->exec("UPDATE epsg_extent SET extent_description = RTRIM(extent_description, ' ')");
        $sqlite->exec("UPDATE epsg_extent SET extent_description = RTRIM(extent_description, ',')");
        $sqlite->exec("UPDATE epsg_extent SET extent_description = RTRIM(extent_description, '.') WHERE extent_description NOT LIKE '%.%.'");

        /*
         * Ireland TM75 Polynomial is not "reversible" but can be reversed via iteration
         */
        $sqlite->exec('UPDATE epsg_coordoperationmethod SET reverse_op = 1 WHERE coord_op_method_code = 9648');

        /*
         * Helmert / Molodensky-Badekas reverse is implemented as the exact inverse
         * (R^T / M, original parameter signs) rather than EPSG's small-angle
         * approximation of negating T, R and dS. param_sign_reversal must be No
         * so codegen and performOperation pass the published values into inReverse.
         */
        $sqlite->exec("UPDATE epsg_coordoperationparamusage SET param_sign_reversal = 'No' WHERE coord_op_method_code IN (
            1031, 9603, 1035,
            1032, 1033, 1037, 1038, 9606, 9607,
            1034, 1039, 9636, 1061, 1062, 1063,
            1053, 1054, 1055, 1056, 1057, 1058,
            1065, 1066,
            1132, 1133, 1140, 1149
        )");

        $sqlite->close();
    }

    public function dataFromGeoRepository(): void
    {
        if (!file_exists($this->resourceDir . '/epsg/extents.sqlite')) {
            $extentDB = new SQLite3(
                $this->resourceDir . '/epsg/extents.sqlite',
                SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE
            );

            $extentDB->exec('CREATE TABLE extent(extent_code INTEGER PRIMARY KEY, original TEXT, buffered TEXT, bbox TEXT, revision_date DATE, interior_lat REAL, interior_lon REAL)');
        } else {
            $extentDB = new SQLite3(
                $this->resourceDir . '/epsg/extents.sqlite',
                SQLITE3_OPEN_READWRITE
            );
        }
        $extentDB->enableExceptions(true);
        $extentDB->exec('PRAGMA journal_mode=WAL'); // WAL is faster
        $extentDB->loadExtension('mod_spatialite.so');

        $dataDB = new SQLite3(
            $this->resourceDir . '/epsg/epsg.sqlite',
            SQLITE3_OPEN_READONLY
        );
        $dataDB->enableExceptions(true);

        $extents = $dataDB->query('SELECT extent_code, revision_date, bbox_south_bound_lat, bbox_west_bound_lon, bbox_north_bound_lat, bbox_east_bound_lon FROM epsg_extent e WHERE deprecated = 0');

        while ($extentMetaData = $extents->fetchArray(SQLITE3_ASSOC)) {
            $existingExtentSQL = "
            SELECT extent_code
            FROM extent
            WHERE extent_code = {$extentMetaData['extent_code']}
              AND revision_date = '{$extentMetaData['revision_date']}'
              AND original != ''
            ";
            $existingExtent = $extentDB->querySingle($existingExtentSQL);

            if (!$existingExtent) {
                echo $extentMetaData['extent_code'] . "\n";
                $geoJson = file_get_contents("https://apps.epsg.org/api/v1/Extent/{$extentMetaData['extent_code']}/polygon/");
                $upsertSQL = "
                    INSERT INTO extent (extent_code, original, buffered, bbox, revision_date)
                    VALUES ({$extentMetaData['extent_code']}, '{$geoJson}', NULL, NULL, '{$extentMetaData['revision_date']}')
                    ON CONFLICT(extent_code) DO UPDATE SET original = excluded.original, revision_date=excluded.revision_date, buffered = excluded.buffered, bbox = NULL, interior_lat = NULL, interior_lon = NULL
                ";
                $extentDB->exec($upsertSQL);
                sleep(2);
            }
            $extentDB->exec('UPDATE extent SET buffered = CASE WHEN ST_NPoints(GeomFromGeoJSON(original)) > ' . self::BUFFER_THRESHOLD . ' THEN AsGeoJSON(ST_Buffer(GeomFromGeoJSON(original), ' . self::BUFFER_SIZE . ')) ELSE original END WHERE buffered IS NULL AND extent_code=' . $extentMetaData['extent_code']);

            if ($extentMetaData['bbox_west_bound_lon'] !== null && $extentMetaData['bbox_east_bound_lon'] !== null && $extentMetaData['bbox_south_bound_lat'] !== null && $extentMetaData['bbox_north_bound_lat'] !== null) {
                $west = $extentMetaData['bbox_west_bound_lon'];
                $east = $extentMetaData['bbox_east_bound_lon'];
                $south = $extentMetaData['bbox_south_bound_lat'];
                $north = $extentMetaData['bbox_north_bound_lat'];
                // EPSG records an antimeridian crossing as west > east. Shift before the margin: expanding first can close the gap and hide the crossing. BoundingArea retries the point at longitude +/- 360 only when a vertex is outside +/-180.
                if ($west > $east) {
                    $east += 360;
                }
                $west -= self::BUFFER_SIZE;
                $east += self::BUFFER_SIZE;
                $south -= self::BUFFER_SIZE;
                $north += self::BUFFER_SIZE;
                $bbox = json_encode(
                    [
                        'type' => 'Polygon',
                        'coordinates' => [[
                            [$west, $south],
                            [$east, $south],
                            [$east, $north],
                            [$west, $north],
                            [$west, $south],
                        ]],
                    ],
                    JSON_THROW_ON_ERROR
                );
                $extentDB->exec("UPDATE extent SET bbox = '{$bbox}' WHERE extent_code = {$extentMetaData['extent_code']}");
            }

            $extentDB->exec('UPDATE extent SET interior_lon = ST_X(ST_PointOnSurface(GeomFromGeoJSON(buffered))), interior_lat = ST_Y(ST_PointOnSurface(GeomFromGeoJSON(buffered))) WHERE interior_lat IS NULL AND extent_code=' . $extentMetaData['extent_code']);

            // Area 1159 is the Mayotte maritime polygon. Its surface point is in the sea east of Grande-Terre, outside the RGM04 grid. Use the onshore area's surface point.
            if ((int) $extentMetaData['extent_code'] === 1159) {
                $extentDB->exec('UPDATE extent SET interior_lat = -12.82671176417377, interior_lon = 45.1804293832095 WHERE extent_code = 1159');
            }
        }

        $points = [];
        $result = $extentDB->query('SELECT extent_code, interior_lat, interior_lon FROM extent WHERE interior_lat IS NOT NULL AND interior_lon IS NOT NULL');
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $points['urn:ogc:def:area:EPSG::' . $row['extent_code']] = [
                (float) $row['interior_lat'],
                (float) $row['interior_lon'],
            ];
        }
        ksort($points);
        file_put_contents(
            $this->resourceDir . '/../tests/Geometry/extent-interior-points.json',
            json_encode($points, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n"
        );

        $extentDB->close();
        $dataDB->close();
    }
}
