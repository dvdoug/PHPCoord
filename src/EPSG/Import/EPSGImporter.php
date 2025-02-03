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
use function str_starts_with;
use function substr;
use function unlink;
use function sleep;
use function str_contains;

use const SQLITE3_OPEN_CREATE;
use const SQLITE3_OPEN_READWRITE;
use const SQLITE3_OPEN_READONLY;
use const SQLITE3_ASSOC;

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
         * Time-dependent transformations from/to ETRS89 are only present in transforms involving specific realisations
         * so add transforms to/from the generic ensemble codes to ETRF2000 (ETRF2020 is technically better, ETRF2000
         * is still recommended by EUREF for georeferencing)
         * XXX technically, the ensemble accuracy is 0.1m not 0, but we're actively assuming the relevant realisation
         */
        $sqlite->exec("INSERT INTO epsg_coordoperation (coord_op_code, coord_op_name, coord_op_type, source_crs_code, target_crs_code, coord_op_method_code, coord_op_accuracy, data_source, revision_date, deprecated, show_operation, remarks) VALUES (32773, 'ETRS89 to ETRF2000 (geocen)', 'transformation', 4936, 7930, 32768, 0, 'PHPCoord', '2023-02-23', 0, 1, '')");
        $sqlite->exec("INSERT INTO epsg_usage (object_table_name, object_code, extent_code, scope_code) VALUES ('epsg_coordoperation', 32773, 1298, 1203)");
        $sqlite->exec("INSERT INTO epsg_coordoperation (coord_op_code, coord_op_name, coord_op_type, source_crs_code, target_crs_code, coord_op_method_code, coord_op_accuracy, data_source, revision_date, deprecated, show_operation, remarks) VALUES (32774, 'ETRS89 to ETRF2000 (geog2D)', 'transformation', 4258, 9067, 32768, 0, 'PHPCoord', '2023-02-23', 0, 1, '')");
        $sqlite->exec("INSERT INTO epsg_usage (object_table_name, object_code, extent_code, scope_code) VALUES ('epsg_coordoperation', 32774, 1298, 1203)");
        $sqlite->exec("INSERT INTO epsg_coordoperation (coord_op_code, coord_op_name, coord_op_type, source_crs_code, target_crs_code, coord_op_method_code, coord_op_accuracy, data_source, revision_date, deprecated, show_operation, remarks) VALUES (32775, 'ETRS89 to ETRF2000 (geog3D)', 'transformation', 4937, 7931, 32768, 0, 'PHPCoord', '2023-02-23', 0, 1, '')");
        $sqlite->exec("INSERT INTO epsg_usage (object_table_name, object_code, extent_code, scope_code) VALUES ('epsg_coordoperation', 32775, 1298, 1203)");
        $sqlite->exec("INSERT INTO epsg_coordoperation (coord_op_code, coord_op_name, coord_op_type, source_crs_code, target_crs_code, coord_op_method_code, coord_op_accuracy, data_source, revision_date, deprecated, show_operation, remarks) VALUES (32776, 'ETRS89 to ETRF2000 (geog2D to geocen)', 'transformation', 4258, 7930, 9602, 0, 'PHPCoord', '2023-02-23', 0, 1, '')");
        $sqlite->exec("INSERT INTO epsg_usage (object_table_name, object_code, extent_code, scope_code) VALUES ('epsg_coordoperation', 32776, 1298, 1203)");
        $sqlite->exec("INSERT INTO epsg_coordoperation (coord_op_code, coord_op_name, coord_op_type, source_crs_code, target_crs_code, coord_op_method_code, coord_op_accuracy, data_source, revision_date, deprecated, show_operation, remarks) VALUES (32777, 'ETRS89 to ETRF2000 (geog3D to geocen)', 'transformation', 4937, 7930, 9602, 0, 'PHPCoord', '2023-02-23', 0, 1, '')");
        $sqlite->exec("INSERT INTO epsg_usage (object_table_name, object_code, extent_code, scope_code) VALUES ('epsg_coordoperation', 32777, 1298, 1203)");

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

        $sqlite->close();
    }

    public function dataFromGeoRepository(): void
    {
        if (!file_exists($this->resourceDir . '/epsg/extents.sqlite')) {
            $extentDB = new SQLite3(
                $this->resourceDir . '/epsg/extents.sqlite',
                SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE
            );

            $extentDB->exec('CREATE TABLE extent(extent_code INTEGER PRIMARY KEY, original TEXT, buffered TEXT, bbox TEXT, revision_date DATE)');
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

        $extents = $dataDB->query('SELECT extent_code, extent_name, revision_date FROM epsg_extent e WHERE deprecated = 0');

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
                    ON CONFLICT(extent_code) DO UPDATE SET original = excluded.original, revision_date=excluded.revision_date, buffered = excluded.buffered
                ";
                $extentDB->exec($upsertSQL);
                sleep(2);
            }
            $extentDB->exec('UPDATE extent SET buffered = CASE WHEN ST_NPoints(GeomFromGeoJSON(original)) > ' . self::BUFFER_THRESHOLD . ' THEN AsGeoJSON(ST_Buffer(GeomFromGeoJSON(original), ' . self::BUFFER_SIZE . ')) ELSE original END WHERE buffered IS NULL AND extent_code=' . $extentMetaData['extent_code']);

            // Bounding box calc + update have to be done in 2 parts as the SQL function is defined as aggregate and needs a GROUP BY even though just a single row
            $bboxes = $extentDB->query("SELECT extent_code, AsGeoJSON(Extent(GeomFromGeoJSON(original))) AS original_bbox, AsGeoJSON(Extent(GeomFromGeoJSON(buffered))) AS buffered_bbox FROM extent WHERE bbox IS NULL AND extent_code = {$extentMetaData['extent_code']} GROUP BY extent_code");
            while ($bbox = $bboxes->fetchArray(SQLITE3_ASSOC)) {
                if (str_contains($extentMetaData['extent_name'], '°')) { // if defined degree extent in name, assume original is accurate at extremities
                    $extentDB->exec("UPDATE extent SET bbox = '{$bbox['original_bbox']}' WHERE extent_code = {$bbox['extent_code']}");
                } else {
                    $extentDB->exec("UPDATE extent SET bbox = '{$bbox['buffered_bbox']}' WHERE extent_code = {$bbox['extent_code']}");
                }
            }
        }
        $extentDB->close();
        $dataDB->close();
    }
}
