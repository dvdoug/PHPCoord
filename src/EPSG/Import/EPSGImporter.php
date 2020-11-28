<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

use function dirname;
use function file_exists;
use function file_get_contents;
use function file_put_contents;
use PHPCoord\Datum\Datum;
use PhpCsFixer\AbstractFixer;
use PhpCsFixer\Config;
use PhpCsFixer\Console\ConfigurationResolver;
use PhpCsFixer\Tokenizer\Tokens;
use PhpCsFixer\ToolInfo;
use PhpParser\Lexer\Emulative;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\CloningVisitor;
use PhpParser\Parser\Php7;
use SplFileInfo;
use SQLite3;
use function unlink;

class EPSGImporter
{
    private string $resourceDir;

    private string $sourceDir;

    public function __construct()
    {
        $this->resourceDir = __DIR__ . '/../../../resources';
        $this->sourceDir = dirname(__DIR__, 2);
    }

    public function createSQLiteDB(): void
    {
        //remove old file if any
        if (file_exists($this->resourceDir . '/epsg/epsg.sqlite')) {
            unlink($this->resourceDir . '/epsg/epsg.sqlite');
        }

        $sqlite = new SQLite3(
        $this->resourceDir . '/epsg/epsg.sqlite',
        SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE
        );

        $sqlite->enableExceptions(true);
        $sqlite->exec('PRAGMA journal_mode=WAL'); //WAL is faster

        $tableSchema = file_get_contents($this->resourceDir . '/epsg/PostgreSQL_Table_Script.sql');
        $sqlite->exec($tableSchema);

        $tableData = file_get_contents($this->resourceDir . '/epsg/PostgreSQL_Data_Script.sql');
        $sqlite->exec($tableData);

        $sqlite->exec('VACUUM');
        $sqlite->exec('PRAGMA journal_mode=DELETE'); //but WAL is not openable read-only in older SQLite
        $sqlite->close();
    }

    public function doCodeGeneration(): void
    {
        $sqlite = new SQLite3(
        $this->resourceDir . '/epsg/epsg.sqlite',
        SQLITE3_OPEN_READONLY
        );

        $sqlite->enableExceptions(true);

        $this->generateDataUnitsOfMeasure($sqlite);
        $this->generateDataPrimeMeridians($sqlite);
        $this->generateDataEllipsoids($sqlite);
        $this->generateDataDatums($sqlite);

        $this->generateConstantsUnitsOfMeasure($sqlite);
        $this->generateConstantsPrimeMeridians($sqlite);
        $this->generateConstantsEllipsoids($sqlite);
        $this->generateConstantsDatums($sqlite);
        $this->generateConstantsCoordinateSystems($sqlite);
        $this->generateConstantsCoordinateReferenceSystems($sqlite);
        $this->generateConstantsCoordinateOperationMethods($sqlite);

        $sqlite->close();
    }

    public function generateConstantsUnitsOfMeasure(SQLite3 $sqlite): void
    {
        $sql = "
            SELECT
                'urn:ogc:def:uom:EPSG::' || m.uom_code AS constant_value,
                m.unit_of_meas_type || '_' || m.unit_of_meas_name AS constant_name,
                m.unit_of_meas_name || '\n' || m.remarks AS constant_help,
                m.deprecated
            FROM epsg_unitofmeasure m
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_unitofmeasure' AND dep.object_code = m.uom_code AND dep.deprecation_date <= '2020-09-01'
            WHERE dep.deprecation_id IS NULL
            ORDER BY constant_name
            ";

        $result = $sqlite->query($sql);
        $constants = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $constants[] = $row;
        }

        $this->updateFileConstants($this->sourceDir . '/UnitOfMeasure/UnitOfMeasure.php', $constants, 'public');
    }

    public function generateDataUnitsOfMeasure(SQLite3 $sqlite): void
    {
        $sql = "
            SELECT
               'urn:ogc:def:uom:EPSG::' || m.uom_code AS urn,
                m.unit_of_meas_name AS name,
                m.unit_of_meas_type AS type,
                'urn:ogc:def:uom:EPSG::' || m.target_uom_code AS target_uom,
                m.factor_b,
                m.factor_c
            FROM epsg_unitofmeasure m
            ORDER BY urn
            ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->updateFileData($this->sourceDir . '/UnitOfMeasure/UnitOfMeasureFactory.php', $data);
    }

    public function generateConstantsPrimeMeridians(SQLite3 $sqlite): void
    {
        $sql = "
            SELECT
                'urn:ogc:def:meridian:EPSG::' || p.prime_meridian_code AS constant_value,
                p.prime_meridian_name AS constant_name,
                p.prime_meridian_name || '\n' || p.remarks AS constant_help,
                p.deprecated
            FROM epsg_primemeridian p
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_primemeridian' AND dep.object_code = p.prime_meridian_code AND dep.deprecation_date <= '2020-09-01'
            WHERE dep.deprecation_id IS NULL
            ORDER BY constant_name
            ";

        $result = $sqlite->query($sql);
        $constants = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $constants[] = $row;
        }

        $this->updateFileConstants($this->sourceDir . '/Datum/PrimeMeridian.php', $constants, 'public');
    }

    public function generateDataPrimeMeridians(SQLite3 $sqlite): void
    {
        $sql = "
            SELECT
                'urn:ogc:def:meridian:EPSG::' || p.prime_meridian_code AS urn,
                p.prime_meridian_name AS name,
                p.greenwich_longitude,
                'urn:ogc:def:uom:EPSG::' || p.uom_code AS uom
            FROM epsg_primemeridian p
            ORDER BY urn
            ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->updateFileData($this->sourceDir . '/Datum/PrimeMeridian.php', $data);
    }

    public function generateConstantsEllipsoids(SQLite3 $sqlite): void
    {
        $sql = "
            SELECT
            DISTINCT
                'urn:ogc:def:ellipsoid:EPSG::' || e.ellipsoid_code AS constant_value,
                e.ellipsoid_name AS constant_name,
                e.ellipsoid_name || '\n' || e.remarks AS constant_help,
                e.deprecated
            FROM epsg_ellipsoid e
            JOIN epsg_datum d ON d.ellipsoid_code = e.ellipsoid_code -- there are some never used entries
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_ellipsoid' AND dep.object_code = e.ellipsoid_code AND dep.deprecation_date <= '2020-09-01'
            WHERE dep.deprecation_id IS NULL
            ORDER BY constant_name
            ";

        $result = $sqlite->query($sql);
        $constants = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $constants[] = $row;
        }

        $this->updateFileConstants($this->sourceDir . '/Datum/Ellipsoid.php', $constants, 'public');
    }

    public function generateDataEllipsoids(SQLite3 $sqlite): void
    {
        $sql = "
            SELECT
                'urn:ogc:def:ellipsoid:EPSG::' || el.ellipsoid_code AS urn,
                el.ellipsoid_name AS name,
                el.semi_major_axis,
                el.semi_minor_axis,
                el.inv_flattening,
                'urn:ogc:def:uom:EPSG::' || el.uom_code AS uom
            FROM epsg_ellipsoid el
            ORDER BY urn
        ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            // some ellipsoids are defined via inverse flattening and the DB doesn't store the calculated data...
            if (!$row['semi_minor_axis']) {
                $row['semi_minor_axis'] = $row['semi_major_axis'] - ($row['semi_major_axis'] / $row['inv_flattening']);
            }
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
            unset($data[$row['urn']]['inv_flattening']);
        }

        $this->updateFileData($this->sourceDir . '/Datum/Ellipsoid.php', $data);
    }

    public function generateConstantsDatums(SQLite3 $sqlite): void
    {
        $sql = "
            SELECT
                DISTINCT
                'urn:ogc:def:datum:EPSG::' || d.datum_code AS constant_value,
                d.datum_name AS constant_name,
                d.datum_name || '\n' || 'Type: ' || d.datum_type || '\n' || 'Extent: ' || e.extent_description || '\n' || 'Scope: ' || s.scope || '\n' || d.origin_description || '\n' || d.remarks AS constant_help,
                d.deprecated
            FROM epsg_datum d
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_datum' AND dep.object_code = d.datum_code AND dep.deprecation_date <= '2020-09-01'
            LEFT JOIN epsg_usage u ON u.object_table_name = 'epsg_datum' AND u.object_code = d.datum_code
            LEFT JOIN epsg_scope s ON u.scope_code = s.scope_code
            LEFT JOIN epsg_extent e ON u.extent_code = e.extent_code
            WHERE dep.deprecation_id IS NULL AND d.datum_type != 'engineering'
            ORDER BY constant_name
        ";

        $result = $sqlite->query($sql);
        $constants = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $constants[] = $row;
        }

        $this->updateFileConstants($this->sourceDir . '/Datum/Datum.php', $constants, 'public');
    }

    public function generateDataDatums(SQLite3 $sqlite): void
    {
        $sql = "
            SELECT
                'urn:ogc:def:datum:EPSG::' || d.datum_code AS urn,
                d.datum_name AS name,
                d.datum_type AS type,
                'urn:ogc:def:ellipsoid:EPSG::' || d.ellipsoid_code AS ellipsoid,
                'urn:ogc:def:meridian:EPSG::' || d.prime_meridian_code AS prime_meridian,
                d.conventional_rs_code AS conventional_rs,
                d.frame_reference_epoch
            FROM epsg_datum d
            WHERE d.datum_type != 'engineering'
            ORDER BY urn
        ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            if ($row['type'] === Datum::DATUM_TYPE_ENSEMBLE) {
                $row['ensemble'] = [];
                $ensembleSql = "
                    SELECT
                        'urn:ogc:def:datum:EPSG::' || d.datum_ensemble_code AS ensemble,
                        'urn:ogc:def:datum:EPSG::' || d.datum_code AS datum,
                        d.datum_sequence
                    FROM epsg_datumensemblemember d
                    WHERE ensemble = '{$row['urn']}'
                    ORDER BY d.datum_sequence
                    ";

                $ensembleResult = $sqlite->query($ensembleSql);
                while ($ensembleRow = $ensembleResult->fetchArray(SQLITE3_ASSOC)) {
                    $row['ensemble'][] = $ensembleRow['datum'];
                }
            }
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->updateFileData($this->sourceDir . '/Datum/Datum.php', $data);
    }

    public function generateConstantsCoordinateSystems(SQLite3 $sqlite): void
    {
        /*
         * Coordinate systems (cartesian)
         */
        $sql = "
            SELECT
                DISTINCT
                'urn:ogc:def:cs:EPSG::' || cs.coord_sys_code AS constant_value,
                REPLACE(REPLACE(REPLACE(cs.coord_sys_name, 'Cartesian 2D CS', ''), 'Cartesian 3D CS', ''), 'for', '') || CASE cs.coord_sys_code WHEN 4531 THEN '_LOWERCASE' ELSE '' END AS constant_name,
                cs.coord_sys_name || '\n' || 'Type: ' || cs.coord_sys_type || '\n' || cs.remarks AS constant_help,
                cs.deprecated
            FROM epsg_coordinatesystem cs
            JOIN epsg_coordinatereferencesystem crs ON crs.coord_sys_code = cs.coord_sys_code AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%'
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatesystem' AND dep.object_code = cs.coord_sys_code AND dep.deprecation_date <= '2020-09-01'
            WHERE dep.deprecation_id IS NULL AND cs.coord_sys_type != 'ordinal'
            AND cs.coord_sys_type = 'Cartesian'
            ORDER BY constant_name
        ";

        $result = $sqlite->query($sql);
        $constants = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $constants[] = $row;
        }

        $this->updateFileConstants($this->sourceDir . '/CoordinateSystem/Cartesian.php', $constants, 'public');

        /*
         * Coordinate systems (ellipsoidal)
         */
        $sql = "
            SELECT
                DISTINCT
                'urn:ogc:def:cs:EPSG::' || cs.coord_sys_code AS constant_value,
                REPLACE(REPLACE(REPLACE(cs.coord_sys_name, 'Ellipsoidal 2D CS', ''), 'Ellipsoidal 3D CS', ''), 'for', '') AS constant_name,
                cs.coord_sys_name || '\n' || 'Type: ' || cs.coord_sys_type || '\n' || cs.remarks AS constant_help,
                cs.deprecated
            FROM epsg_coordinatesystem cs
            JOIN epsg_coordinatereferencesystem crs ON crs.coord_sys_code = cs.coord_sys_code AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%'
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatesystem' AND dep.object_code = cs.coord_sys_code AND dep.deprecation_date <= '2020-09-01'
            WHERE dep.deprecation_id IS NULL AND cs.coord_sys_type != 'ordinal'
            AND cs.coord_sys_type = 'ellipsoidal'
            ORDER BY constant_name
        ";

        $result = $sqlite->query($sql);
        $constants = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $constants[] = $row;
        }

        $this->updateFileConstants($this->sourceDir . '/CoordinateSystem/Ellipsoidal.php', $constants, 'public');

        /*
         * Coordinate systems (vertical)
         */
        $sql = "
            SELECT
                DISTINCT
                'urn:ogc:def:cs:EPSG::' || cs.coord_sys_code AS constant_value,
                REPLACE(REPLACE(cs.coord_sys_name, 'Vertical CS', ''), 'for', '') AS constant_name,
                cs.coord_sys_name || '\n' || 'Type: ' || cs.coord_sys_type || '\n' || cs.remarks AS constant_help,
                cs.deprecated
            FROM epsg_coordinatesystem cs
            JOIN epsg_coordinatereferencesystem crs ON crs.coord_sys_code = cs.coord_sys_code AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%'
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatesystem' AND dep.object_code = cs.coord_sys_code AND dep.deprecation_date <= '2020-09-01'
            WHERE dep.deprecation_id IS NULL AND cs.coord_sys_type != 'ordinal'
            AND cs.coord_sys_type = 'vertical'
            ORDER BY constant_name
        ";

        $result = $sqlite->query($sql);
        $constants = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $constants[] = $row;
        }

        $this->updateFileConstants($this->sourceDir . '/CoordinateSystem/Vertical.php', $constants, 'public');

        /*
         * Coordinate systems (other)
         */
        $sql = "
            SELECT
                DISTINCT
                'urn:ogc:def:cs:EPSG::' || cs.coord_sys_code AS constant_value,
                cs.coord_sys_name AS constant_name,
                cs.coord_sys_name || '\n' || 'Type: ' || cs.coord_sys_type || '\n' || cs.remarks AS constant_help,
                cs.deprecated
            FROM epsg_coordinatesystem cs
            JOIN epsg_coordinatereferencesystem crs ON crs.coord_sys_code = cs.coord_sys_code AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%'
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatesystem' AND dep.object_code = cs.coord_sys_code AND dep.deprecation_date <= '2020-09-01'
            WHERE dep.deprecation_id IS NULL AND cs.coord_sys_type != 'ordinal'
            AND cs.coord_sys_type NOT IN ('Cartesian', 'ellipsoidal', 'vertical')
            ORDER BY constant_name
        ";

        $result = $sqlite->query($sql);
        $constants = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $constants[] = $row;
        }

        $this->updateFileConstants($this->sourceDir . '/CoordinateSystem/CoordinateSystem.php', $constants, 'public');
    }

    public function generateConstantsCoordinateReferenceSystems(SQLite3 $sqlite): void
    {
        /*
         * Coordinate reference systems (compound)
         */
        $sql = "
            SELECT
                'urn:ogc:def:crs:EPSG::' || crs.coord_ref_sys_code AS constant_value,
                crs.coord_ref_sys_name AS constant_name,
                crs.coord_ref_sys_name || '\n' || 'Extent: ' || e.extent_description || '\n' || 'Scope: ' || s.scope || '\n' || crs.remarks AS constant_help,
                crs.deprecated
            FROM epsg_coordinatereferencesystem crs
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2020-09-01'
            LEFT JOIN epsg_usage u ON u.object_table_name = 'epsg_coordinatereferencesystem' AND u.object_code = crs.coord_ref_sys_code
            LEFT JOIN epsg_scope s ON u.scope_code = s.scope_code
            LEFT JOIN epsg_extent e ON u.extent_code = e.extent_code
            WHERE dep.deprecation_id IS NULL AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%'
            AND (crs.cmpd_horizcrs_code IS NULL OR crs.cmpd_horizcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind IN ('engineering', 'derived')))
            AND (crs.cmpd_vertcrs_code IS NULL OR crs.cmpd_vertcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind IN ('engineering', 'derived')))
            AND crs.coord_ref_sys_kind = 'compound'
            GROUP BY crs.coord_ref_sys_code
            ORDER BY constant_name
        ";

        $result = $sqlite->query($sql);
        $constants = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $constants[] = $row;
        }

        $this->updateFileConstants($this->sourceDir . '/CoordinateReferenceSystem/Compound.php', $constants, 'public');

        /*
         * Coordinate reference systems (geocentric)
         */
        $sql = "
            SELECT
                'urn:ogc:def:crs:EPSG::' || crs.coord_ref_sys_code AS constant_value,
                crs.coord_ref_sys_name AS constant_name,
                crs.coord_ref_sys_name || '\n' || 'Extent: ' || e.extent_description || '\n' || 'Scope: ' || s.scope || '\n' || crs.remarks AS constant_help,
                crs.deprecated
            FROM epsg_coordinatereferencesystem crs
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2020-09-01'
            LEFT JOIN epsg_usage u ON u.object_table_name = 'epsg_coordinatereferencesystem' AND u.object_code = crs.coord_ref_sys_code
            LEFT JOIN epsg_scope s ON u.scope_code = s.scope_code
            LEFT JOIN epsg_extent e ON u.extent_code = e.extent_code
            WHERE dep.deprecation_id IS NULL AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%'
            AND (crs.cmpd_horizcrs_code IS NULL OR crs.cmpd_horizcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind IN ('engineering', 'derived')))
            AND (crs.cmpd_vertcrs_code IS NULL OR crs.cmpd_vertcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind IN ('engineering', 'derived')))
            AND crs.coord_ref_sys_kind = 'geocentric'
            GROUP BY crs.coord_ref_sys_code
            ORDER BY constant_name
        ";

        $result = $sqlite->query($sql);
        $constants = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $constants[] = $row;
        }

        $this->updateFileConstants($this->sourceDir . '/CoordinateReferenceSystem/Geocentric.php', $constants, 'public');

        /*
         * Coordinate reference systems (geographic 2D)
         */
        $sql = "
            SELECT
                'urn:ogc:def:crs:EPSG::' || crs.coord_ref_sys_code AS constant_value,
                crs.coord_ref_sys_name AS constant_name,
                crs.coord_ref_sys_name || '\n' || 'Extent: ' || e.extent_description || '\n' || 'Scope: ' || s.scope || '\n' || crs.remarks AS constant_help,
                crs.deprecated
            FROM epsg_coordinatereferencesystem crs
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2020-09-01'
            LEFT JOIN epsg_usage u ON u.object_table_name = 'epsg_coordinatereferencesystem' AND u.object_code = crs.coord_ref_sys_code
            LEFT JOIN epsg_scope s ON u.scope_code = s.scope_code
            LEFT JOIN epsg_extent e ON u.extent_code = e.extent_code
            WHERE dep.deprecation_id IS NULL AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%'
            AND (crs.cmpd_horizcrs_code IS NULL OR crs.cmpd_horizcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind IN ('engineering', 'derived')))
            AND (crs.cmpd_vertcrs_code IS NULL OR crs.cmpd_vertcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind IN ('engineering', 'derived')))
            AND crs.coord_ref_sys_kind = 'geographic 2D'
            GROUP BY crs.coord_ref_sys_code
            ORDER BY constant_name
        ";

        $result = $sqlite->query($sql);
        $constants = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $constants[] = $row;
        }

        $this->updateFileConstants($this->sourceDir . '/CoordinateReferenceSystem/Geographic2D.php', $constants, 'public');

        /*
         * Coordinate reference systems (geographic 3D)
         */
        $sql = "
            SELECT
                'urn:ogc:def:crs:EPSG::' || crs.coord_ref_sys_code AS constant_value,
                crs.coord_ref_sys_name AS constant_name,
                crs.coord_ref_sys_name || '\n' || 'Extent: ' || e.extent_description || '\n' || 'Scope: ' || s.scope || '\n' || crs.remarks AS constant_help,
                crs.deprecated
            FROM epsg_coordinatereferencesystem crs
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2020-09-01'
            LEFT JOIN epsg_usage u ON u.object_table_name = 'epsg_coordinatereferencesystem' AND u.object_code = crs.coord_ref_sys_code
            LEFT JOIN epsg_scope s ON u.scope_code = s.scope_code
            LEFT JOIN epsg_extent e ON u.extent_code = e.extent_code
            WHERE dep.deprecation_id IS NULL AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%'
            AND (crs.cmpd_horizcrs_code IS NULL OR crs.cmpd_horizcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind IN ('engineering', 'derived')))
            AND (crs.cmpd_vertcrs_code IS NULL OR crs.cmpd_vertcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind IN ('engineering', 'derived')))
            AND crs.coord_ref_sys_kind = 'geographic 3D'
            GROUP BY crs.coord_ref_sys_code
            ORDER BY constant_name
        ";

        $result = $sqlite->query($sql);
        $constants = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $constants[] = $row;
        }

        $this->updateFileConstants($this->sourceDir . '/CoordinateReferenceSystem/Geographic3D.php', $constants, 'public');

        /*
         * Coordinate reference systems (projected)
         */
        $sql = "
            SELECT
                'urn:ogc:def:crs:EPSG::' || crs.coord_ref_sys_code AS constant_value,
                crs.coord_ref_sys_name AS constant_name,
                crs.coord_ref_sys_name || '\n' || 'Extent: ' || e.extent_description || '\n' || 'Scope: ' || s.scope || '\n' || crs.remarks AS constant_help,
                crs.deprecated
            FROM epsg_coordinatereferencesystem crs
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2020-09-01'
            LEFT JOIN epsg_usage u ON u.object_table_name = 'epsg_coordinatereferencesystem' AND u.object_code = crs.coord_ref_sys_code
            LEFT JOIN epsg_scope s ON u.scope_code = s.scope_code
            LEFT JOIN epsg_extent e ON u.extent_code = e.extent_code
            WHERE dep.deprecation_id IS NULL AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%'
            AND (crs.cmpd_horizcrs_code IS NULL OR crs.cmpd_horizcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind IN ('engineering', 'derived')))
            AND (crs.cmpd_vertcrs_code IS NULL OR crs.cmpd_vertcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind IN ('engineering', 'derived')))
            AND crs.coord_ref_sys_kind = 'projected'
            GROUP BY crs.coord_ref_sys_code
            ORDER BY constant_name
        ";

        $result = $sqlite->query($sql);
        $constants = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $constants[] = $row;
        }

        $this->updateFileConstants($this->sourceDir . '/CoordinateReferenceSystem/Projected.php', $constants, 'public');

        /*
         * Coordinate reference systems (vertical)
         */
        $sql = "
            SELECT
                'urn:ogc:def:crs:EPSG::' || crs.coord_ref_sys_code AS constant_value,
                crs.coord_ref_sys_name AS constant_name,
                crs.coord_ref_sys_name || '\n' || 'Extent: ' || e.extent_description || '\n' || 'Scope: ' || s.scope || '\n' || crs.remarks AS constant_help,
                crs.deprecated
            FROM epsg_coordinatereferencesystem crs
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2020-09-01'
            LEFT JOIN epsg_usage u ON u.object_table_name = 'epsg_coordinatereferencesystem' AND u.object_code = crs.coord_ref_sys_code
            LEFT JOIN epsg_scope s ON u.scope_code = s.scope_code
            LEFT JOIN epsg_extent e ON u.extent_code = e.extent_code
            WHERE dep.deprecation_id IS NULL AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%'
            AND (crs.cmpd_horizcrs_code IS NULL OR crs.cmpd_horizcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind IN ('engineering', 'derived')))
            AND (crs.cmpd_vertcrs_code IS NULL OR crs.cmpd_vertcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind IN ('engineering', 'derived')))
            AND crs.coord_ref_sys_kind = 'vertical'
            GROUP BY crs.coord_ref_sys_code
            ORDER BY constant_name
        ";

        $result = $sqlite->query($sql);
        $constants = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $constants[] = $row;
        }

        $this->updateFileConstants($this->sourceDir . '/CoordinateReferenceSystem/Vertical.php', $constants, 'public');

        /*
         * Coordinate reference systems (other)
         */
        $sql = "
            SELECT
                'urn:ogc:def:crs:EPSG::' || crs.coord_ref_sys_code AS constant_value,
                crs.coord_ref_sys_kind || '_' || crs.coord_ref_sys_name AS constant_name,
                crs.coord_ref_sys_name || '\n' || 'Type: ' || crs.coord_ref_sys_kind || '\n' || 'Extent: ' || e.extent_description || '\n' || 'Scope: ' || s.scope || '\n' || crs.remarks AS constant_help,
                crs.deprecated
            FROM epsg_coordinatereferencesystem crs
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2020-09-01'
            LEFT JOIN epsg_usage u ON u.object_table_name = 'epsg_coordinatereferencesystem' AND u.object_code = crs.coord_ref_sys_code
            LEFT JOIN epsg_scope s ON u.scope_code = s.scope_code
            LEFT JOIN epsg_extent e ON u.extent_code = e.extent_code
            WHERE dep.deprecation_id IS NULL AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%'
            AND (crs.cmpd_horizcrs_code IS NULL OR crs.cmpd_horizcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind IN ('engineering', 'derived')))
            AND (crs.cmpd_vertcrs_code IS NULL OR crs.cmpd_vertcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind IN ('engineering', 'derived')))
            AND crs.coord_ref_sys_kind NOT IN ('compound', 'geocentric', 'geographic 2D', 'geographic 3D', 'projected', 'vertical')
            GROUP BY crs.coord_ref_sys_code
            ORDER BY constant_name
        ";

        $result = $sqlite->query($sql);
        $constants = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $constants[] = $row;
        }

        $this->updateFileConstants($this->sourceDir . '/CoordinateReferenceSystem/CoordinateReferenceSystem.php', $constants, 'public');
    }

    public function generateConstantsCoordinateOperationMethods(SQLite3 $sqlite): void
    {
        $sql = "
            SELECT
                'urn:ogc:def:method:EPSG::' || m.coord_op_method_code AS constant_value,
                m.coord_op_method_name AS constant_name,
                m.coord_op_method_name || '\n' || m.remarks AS constant_help,
                m.deprecated
            FROM epsg_coordoperationmethod m
            JOIN epsg_coordoperation o on m.coord_op_method_code = o.coord_op_method_code -- only want methods that are actually used
            LEFT JOIN epsg_coordoperationparamvalue p ON p.coord_op_code = o.coord_op_code AND p.coord_op_method_code = m.coord_op_method_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperationmethod' AND dep.object_code = m.coord_op_method_code AND dep.deprecation_date <= '2020-09-01'
            WHERE dep.deprecation_id IS NULL
            AND o.coord_op_type != 'conversion'
            AND m.coord_op_method_name NOT LIKE '%wellbore%'
            AND m.coord_op_method_name NOT LIKE '%mining%'
            AND m.coord_op_method_name NOT LIKE '%seismic%'
            AND o.coord_op_name NOT LIKE '%example%'
            AND o.remarks NOT LIKE '%user-defined%'
            GROUP BY m.coord_op_method_code
            HAVING (SUM(CASE WHEN p.param_value_file_ref != '' THEN 1 ELSE 0 END) = 0) -- skip anything that needs some kind of datafile

            UNION

            SELECT
                'urn:ogc:def:method:EPSG::' || m.coord_op_method_code AS constant_value,
                m.coord_op_method_name AS constant_name,
                m.coord_op_method_name || '\n' || m.remarks AS constant_help,
                m.deprecated
            FROM epsg_coordoperationmethod m
            JOIN epsg_coordoperation o on m.coord_op_method_code = o.coord_op_method_code -- only want methods that are actually used
            JOIN epsg_coordinatereferencesystem crs ON crs.projection_conv_code = o.coord_op_code
            LEFT JOIN epsg_coordoperationparamvalue p ON p.coord_op_code = o.coord_op_code AND p.coord_op_method_code = m.coord_op_method_code
            LEFT JOIN epsg_deprecation dep_method ON dep_method.object_table_name = 'epsg_coordoperationmethod' AND dep_method.object_code = m.coord_op_method_code AND dep_method.deprecation_date <= '2020-09-01'
            LEFT JOIN epsg_deprecation dep_crs ON dep_crs.object_table_name = 'epsg_coordinatereferencesystem' AND dep_crs.object_code = crs.coord_ref_sys_code AND dep_crs.deprecation_date <= '2020-09-01'            
            WHERE dep_method.deprecation_id IS NULL AND dep_crs.deprecation_id IS NULL
            AND m.coord_op_method_name NOT LIKE '%wellbore%'
            AND m.coord_op_method_name NOT LIKE '%mining%'
            AND m.coord_op_method_name NOT LIKE '%seismic%'
            AND o.coord_op_name NOT LIKE '%example%'
            AND o.remarks NOT LIKE '%user-defined%'
            GROUP BY m.coord_op_method_code
            HAVING (SUM(CASE WHEN p.param_value_file_ref != '' THEN 1 ELSE 0 END) = 0) -- skip anything that needs some kind of datafile

            ORDER BY constant_name
        ";

        $result = $sqlite->query($sql);
        $constants = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $constants[] = $row;
        }

        $this->updateFileConstants($this->sourceDir . '/CoordinateOperation/CoordinateOperationMethods.php', $constants, 'protected');
    }

    private function updateFileConstants(string $fileName, array $classConstants, string $visibility): void
    {
        echo "Updating constants in {$fileName}...";

        $lexer = new Emulative(
            [
                'usedAttributes' => [
                    'comments',
                    'startLine', 'endLine',
                    'startTokenPos', 'endTokenPos',
                ],
            ]
        );
        $parser = new Php7($lexer);

        $traverser = new NodeTraverser();
        $traverser->addVisitor(new CloningVisitor());

        $oldStmts = $parser->parse(file_get_contents($fileName));
        $oldTokens = $lexer->getTokens();

        $newStmts = $traverser->traverse($oldStmts);

        /*
         * First remove all existing EPSG consts
         */
        $traverser = new NodeTraverser();
        $traverser->addVisitor(new RemoveExistingConstantsVisitor());
        $newStmts = $traverser->traverse($newStmts);

        /*
         * Then add the ones wanted
         */
        $traverser = new NodeTraverser();
        $traverser->addVisitor(new AddNewConstantsVisitor($classConstants, $visibility));
        $newStmts = $traverser->traverse($newStmts);

        $prettyPrinter = new ASTPrettyPrinter();
        file_put_contents($fileName, $prettyPrinter->printFormatPreserving($newStmts, $oldStmts, $oldTokens));
        $this->csFixFile($fileName);
        echo 'done' . PHP_EOL;
    }

    private function updateFileData(string $fileName, array $data): void
    {
        echo "Updating data in {$fileName}...";

        $lexer = new Emulative(
            [
                'usedAttributes' => [
                    'comments',
                    'startLine', 'endLine',
                    'startTokenPos', 'endTokenPos',
                ],
            ]
        );
        $parser = new Php7($lexer);

        $traverser = new NodeTraverser();
        $traverser->addVisitor(new CloningVisitor());

        $oldStmts = $parser->parse(file_get_contents($fileName));
        $oldTokens = $lexer->getTokens();

        $newStmts = $traverser->traverse($oldStmts);

        /*
         * First remove all existing EPSG consts
         */
        $traverser = new NodeTraverser();
        $traverser->addVisitor(new RemoveExistingDataVisitor());
        $newStmts = $traverser->traverse($newStmts);

        /*
         * Then add the ones wanted
         */
        $traverser = new NodeTraverser();
        $traverser->addVisitor(new AddNewDataVisitor($data));
        $newStmts = $traverser->traverse($newStmts);

        $prettyPrinter = new ASTPrettyPrinter();
        file_put_contents($fileName, $prettyPrinter->printFormatPreserving($newStmts, $oldStmts, $oldTokens));
        $this->csFixFile($fileName);
        echo 'done' . PHP_EOL;
    }

    private function csFixFile(string $fileName): void
    {
        /** @var Config $config */
        $config = require __DIR__ . '/../../../.php_cs.dist';

        $resolver = new ConfigurationResolver(
            $config,
            [],
            dirname($this->sourceDir),
            new ToolInfo()
        );

        $file = new SplFileInfo($fileName);
        $old = file_get_contents($fileName);
        $fixers = $resolver->getFixers();

        $tokens = Tokens::fromCode($old);

        foreach ($fixers as $fixer) {
            if (
                !$fixer instanceof AbstractFixer &&
                (!$fixer->supports($file) || !$fixer->isCandidate($tokens))
            ) {
                continue;
            }

            $fixer->fix($file, $tokens);

            if ($tokens->isChanged()) {
                $tokens->clearEmptyTokens();
                $tokens->clearChanged();
            }
        }

        $new = $tokens->generateCode();

        if ($old !== $new) {
            file_put_contents($fileName, $new);
        }
    }
}
