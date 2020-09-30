<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

use PHPCoord\EPSG\Import\AddNewConstantsVisitor;
use PHPCoord\EPSG\Import\ASTPrettyPrinter;
use PHPCoord\EPSG\Import\RemoveExistingConstantsVisitor;
use PhpParser\Lexer\Emulative;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\CloningVisitor;
use PhpParser\Parser\Php7;

require __DIR__ . '/../../../vendor/autoload.php';

/**
 * Imports raw EPSG Dataset from Postgres format.
 */
$resDir = __DIR__ . '/../../../resources';
$srcDir = dirname(__DIR__, 2);

createSQLiteDB($resDir);
generateConstants($resDir, $srcDir);
csFixGeneratedFiles($srcDir);

function createSQLiteDB(string $resDir): void
{
    //remove old file if any
    if (file_exists($resDir . '/epsg/epsg.sqlite')) {
        unlink($resDir . '/epsg/epsg.sqlite');
    }

    $sqlite = new SQLite3(
        $resDir . '/epsg/epsg.sqlite',
        SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE
    );
    $sqlite->enableExceptions(true);
    $sqlite->exec('PRAGMA journal_mode=WAL'); //WAL is faster

    $tableSchema = file_get_contents($resDir . '/epsg/PostgreSQL_Table_Script.sql');
    $sqlite->exec($tableSchema);

    $tableData = file_get_contents($resDir . '/epsg/PostgreSQL_Data_Script.sql');
    $sqlite->exec($tableData);

    $sqlite->exec('VACUUM');
    $sqlite->exec('PRAGMA journal_mode=DELETE'); //but WAL is not openable read-only in older SQLite
    $sqlite->close();
}

function generateConstants(string $resDir, string $srcDir): void
{
    $sqlite = new SQLite3(
        $resDir . '/epsg/epsg.sqlite',
        SQLITE3_OPEN_READONLY
    );
    $sqlite->enableExceptions(true);

    /*
     * Units of Measure
     */
    $sql = "
            SELECT
                m.uom_code AS constant_value,
                m.unit_of_meas_type || '_' || m.unit_of_meas_name AS constant_name,
                m.unit_of_meas_name || '\n' || m.remarks AS constant_help,
                m.deprecated
            FROM epsg_unitofmeasure m
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_unitofmeasure' AND dep.object_code = m.uom_code AND dep.deprecation_date <= '2020-09-01'
            WHERE dep.deprecation_id IS NULL
            ORDER BY constant_name
            ";

    $result = $sqlite->query($sql);

    updateFile($srcDir . '/UnitOfMeasure/UnitOfMeasure.php', $result, 'public');

    /*
     * Prime Meridians
     */
    $sql = "
            SELECT
                p.prime_meridian_code AS constant_value,
                p.prime_meridian_name AS constant_name,
                p.prime_meridian_name || '\n' || p.remarks AS constant_help,
                p.deprecated
            FROM epsg_primemeridian p
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_primemeridian' AND dep.object_code = p.prime_meridian_code AND dep.deprecation_date <= '2020-09-01'
            WHERE dep.deprecation_id IS NULL
            ORDER BY constant_name
            ";

    $result = $sqlite->query($sql);

    updateFile($srcDir . '/Datum/PrimeMeridian.php', $result, 'public');

    /*
     * Ellipsoids
     */
    $sql = "
            SELECT
            DISTINCT
                e.ellipsoid_code AS constant_value,
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

    updateFile($srcDir . '/Datum/Ellipsoid.php', $result, 'public');

    /*
     * Datums
     */
    $sql = "
            SELECT
                DISTINCT
                d.datum_code AS constant_value,
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

    updateFile($srcDir . '/Datum/Datum.php', $result, 'public');

    /*
     * Coordinate systems
     */
    $sql = "
            SELECT
                DISTINCT
                cs.coord_sys_code AS constant_value,
                cs.coord_sys_name || CASE cs.coord_sys_code WHEN 4531 THEN '_LOWERCASE' ELSE '' END AS constant_name,
                cs.coord_sys_name || '\n' || 'Type: ' || cs.coord_sys_type || '\n' || cs.remarks AS constant_help,
                cs.deprecated
            FROM epsg_coordinatesystem cs
            JOIN epsg_coordinatereferencesystem crs ON crs.coord_sys_code = cs.coord_sys_code AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%'
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatesystem' AND dep.object_code = cs.coord_sys_code AND dep.deprecation_date <= '2020-09-01'
            WHERE dep.deprecation_id IS NULL AND cs.coord_sys_type != 'ordinal'
            ORDER BY constant_name
        ";
    $result = $sqlite->query($sql);

    updateFile($srcDir . '/CoordinateSystem/CoordinateSystem.php', $result, 'public');

    /*
     * Coordinate systems (cartesian)
     */
    $sql = "
            SELECT
                DISTINCT
                cs.coord_sys_code AS constant_value,
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

    updateFile($srcDir . '/CoordinateSystem/Cartesian.php', $result, 'public');

    /*
     * Coordinate systems (ellipsoidal)
     */
    $sql = "
            SELECT
                DISTINCT
                cs.coord_sys_code AS constant_value,
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

    updateFile($srcDir . '/CoordinateSystem/Ellipsoidal.php', $result, 'public');

    /*
     * Coordinate systems (vertical)
     */
    $sql = "
            SELECT
                DISTINCT
                cs.coord_sys_code AS constant_value,
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

    updateFile($srcDir . '/CoordinateSystem/Vertical.php', $result, 'public');

    /*
     * Coordinate systems (other)
     */
    $sql = "
            SELECT
                DISTINCT
                cs.coord_sys_code AS constant_value,
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

    updateFile($srcDir . '/CoordinateSystem/CoordinateSystem.php', $result, 'public');

    /*
     * Coordinate reference systems (compound)
     */
    $sql = "
            SELECT
                crs.coord_ref_sys_code AS constant_value,
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

    updateFile($srcDir . '/CoordinateReferenceSystem/Compound.php', $result, 'public');

    /*
     * Coordinate reference systems (geocentric)
     */
    $sql = "
            SELECT
                crs.coord_ref_sys_code AS constant_value,
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

    updateFile($srcDir . '/CoordinateReferenceSystem/Geocentric.php', $result, 'public');

    /*
     * Coordinate reference systems (geographic 2D)
     */
    $sql = "
            SELECT
                crs.coord_ref_sys_code AS constant_value,
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

    updateFile($srcDir . '/CoordinateReferenceSystem/Geographic2D.php', $result, 'public');

    /*
     * Coordinate reference systems (geographic 3D)
     */
    $sql = "
            SELECT
                crs.coord_ref_sys_code AS constant_value,
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

    updateFile($srcDir . '/CoordinateReferenceSystem/Geographic3D.php', $result, 'public');

    /*
     * Coordinate reference systems (projected)
     */
    $sql = "
            SELECT
                crs.coord_ref_sys_code AS constant_value,
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

    updateFile($srcDir . '/CoordinateReferenceSystem/Projected.php', $result, 'public');

    /*
     * Coordinate reference systems (vertical)
     */
    $sql = "
            SELECT
                crs.coord_ref_sys_code AS constant_value,
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

    updateFile($srcDir . '/CoordinateReferenceSystem/Vertical.php', $result, 'public');

    /*
     * Coordinate reference systems (other)
     */
    $sql = "
            SELECT
                crs.coord_ref_sys_code AS constant_value,
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

    updateFile($srcDir . '/CoordinateReferenceSystem/CoordinateReferenceSystem.php', $result, 'public');

    /*
     * Coordinate operation methods
     */
    $sql = "
            SELECT
                m.coord_op_method_code AS constant_value,
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
                m.coord_op_method_code AS constant_value,
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

    updateFile($srcDir . '/CoordinateOperation/CoordinateOperationMethods.php', $result, 'protected');

    $sqlite->close();
}

function updateFile(string $fileName, SQLite3Result $classConstants, string $visibility): void
{
    $lexer = new Emulative([
        'usedAttributes' => [
            'comments',
            'startLine', 'endLine',
            'startTokenPos', 'endTokenPos',
        ],
    ]);
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
}

function csFixGeneratedFiles(string $srcDir): void
{
    chdir(dirname($srcDir));
    shell_exec('php vendor/friendsofphp/php-cs-fixer/php-cs-fixer fix');
}
