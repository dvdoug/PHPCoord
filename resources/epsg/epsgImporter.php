<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

/**
 * Imports raw EPSG Dataset from Postgres format.
 */
$dbPath = __DIR__ . '/epsg.sqlite';
$srcDir = dirname(__DIR__, 2) . '/src';

createSQLiteDB($dbPath);
createInterfacesWithIDs($dbPath, $srcDir);
csFixGeneratedFiles($srcDir);

function createSQLiteDB(string $dbPath): void
{
    //remove old file if any
    if (file_exists($dbPath)) {
        unlink($dbPath);
    }

    $sqlite = new SQLite3(
        $dbPath,
        SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE
    );
    $sqlite->enableExceptions(true);
    $sqlite->exec('PRAGMA journal_mode=WAL'); //WAL is faster

    $tableSchema = file_get_contents(__DIR__ . '/PostgreSQL_Table_Script.sql');
    $sqlite->exec($tableSchema);

    $tableData = file_get_contents(__DIR__ . '/PostgreSQL_Data_Script.sql');
    $sqlite->exec($tableData);

    $sqlite->exec('VACUUM');
    $sqlite->exec('PRAGMA journal_mode=DELETE'); //but WAL is not openable read-only in older SQLite
    $sqlite->close();
}

function createInterfacesWithIDs(string $dbPath, string $srcDir): void
{
    $sqlite = new SQLite3(
        $dbPath,
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
                m.remarks AS constant_help,
                m.deprecated
            FROM epsg_unitofmeasure m
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_unitofmeasure' AND dep.object_code = m.uom_code AND dep.deprecation_date <= '2020-09-01'
            WHERE dep.deprecation_id IS NULL
            ORDER BY constant_name
            ";

    $result = $sqlite->query($sql);

    generateInterface($srcDir, 'PHPCoord\UnitOfMeasure', 'UnitOfMeasureIds', $result);

    /*
     * Prime Meridians
     */
    $sql = "
            SELECT
                p.prime_meridian_code AS constant_value,
                p.prime_meridian_name AS constant_name,
                p.remarks AS constant_help,
                p.deprecated
            FROM epsg_primemeridian p
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_primemeridian' AND dep.object_code = p.prime_meridian_code AND dep.deprecation_date <= '2020-09-01'
            WHERE dep.deprecation_id IS NULL
            ORDER BY constant_name
            ";

    $result = $sqlite->query($sql);

    generateInterface($srcDir, 'PHPCoord\Datum', 'PrimeMeridianIds', $result);

    /*
     * Ellipsoids
     */
    $sql = "
            SELECT
            DISTINCT
                e.ellipsoid_code AS constant_value,
                e.ellipsoid_name AS constant_name,
                e.remarks AS constant_help,
                e.deprecated
            FROM epsg_ellipsoid e
            JOIN epsg_datum d ON d.ellipsoid_code = e.ellipsoid_code -- there are some never used entries
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_ellipsoid' AND dep.object_code = e.ellipsoid_code AND dep.deprecation_date <= '2020-09-01'
            WHERE dep.deprecation_id IS NULL
            ORDER BY constant_name
            ";
    $result = $sqlite->query($sql);

    generateInterface($srcDir, 'PHPCoord\Datum', 'EllipsoidIds', $result);

    /*
     * Datums
     */
    $sql = "
            SELECT
                DISTINCT
                d.datum_code AS constant_value,
                d.datum_name AS constant_name,
                'Type: ' || d.datum_type || '\n' || 'Extent: ' || e.extent_description || '\n' || 'Scope: ' || s.scope || '\n' || d.origin_description || '\n' || d.remarks AS constant_help,
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

    generateInterface($srcDir, 'PHPCoord\Datum', 'DatumIds', $result);

    $sqlite->close();
}

function generateInterface(string $srcDir, string $namespaceName, string $interfaceName, SQLite3Result $interfaceConstants): void
{
    $php = "<?php\nnamespace {$namespaceName};\n/**\n* THIS FILE IS AUTO-GENERATED\n*/\ninterface {$interfaceName} {\n";

    while ($row = $interfaceConstants->fetchArray(SQLITE3_ASSOC)) {
        $name = str_replace(
            [' ', '-', '\'', '(', ')', '[', ']', '.', '/', '=', ',', ':', '°', '+', '&'],
            ['_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_DEG_', '_PLUS_', '_AND_'],
            $row['constant_name']
        );
        $name = preg_replace('/_+/', '_', $name);
        $name = rtrim($name, '_');

        if ($row['constant_help'] || $row['deprecated']) {
            $php .= "/**\n";
            $helpLines = explode("\n", trim(wordwrap($row['constant_help'], 112)));
            foreach ($helpLines as $helpLine) {
                $php .= '* ' . $helpLine . "\n";
            }
            if ($row['deprecated']) {
                $php .= "* @deprecated\n";
            }
            $php .= " */\n";
        }
        $php .= sprintf("public const %s = %d;\n\n", strtoupper('EPSG_' . $name), $row['constant_value']);
    }

    $php .= '}';

    $psr4Dir = str_replace(['PHPCoord\\', '\\'], ['', '/'], $namespaceName);
    file_put_contents($srcDir . "/$psr4Dir/{$interfaceName}.php", $php);
}

function csFixGeneratedFiles(string $srcDir): void
{
    chdir(dirname($srcDir));
    shell_exec('php vendor/friendsofphp/php-cs-fixer/php-cs-fixer fix');
}
