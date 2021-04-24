<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

use function array_flip;
use function array_map;
use function array_reverse;
use function array_unique;
use function assert;
use function dirname;
use Exception;
use function explode;
use function fclose;
use function file_exists;
use function file_get_contents;
use function file_put_contents;
use function fopen;
use function fwrite;
use function glob;
use function in_array;
use const PHP_EOL;
use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\CoordinateSystem\Cartesian;
use PHPCoord\CoordinateSystem\Ellipsoidal;
use PHPCoord\CoordinateSystem\Vertical as VerticalCS;
use PHPCoord\Datum\Datum;
use PHPCoord\Datum\Ellipsoid;
use PHPCoord\Datum\PrimeMeridian;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Rate;
use PHPCoord\UnitOfMeasure\Scale\Scale;
use PHPCoord\UnitOfMeasure\Time\Time;
use PhpCsFixer\AbstractFixer;
use PhpCsFixer\Config;
use PhpCsFixer\Console\ConfigurationResolver;
use PhpCsFixer\Tokenizer\Tokens;
use PhpCsFixer\ToolInfo;
use PhpParser\Lexer\Emulative;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\CloningVisitor;
use PhpParser\Parser\Php7;
use ReflectionClass;
use Shapefile\Geometry\MultiPolygon;
use Shapefile\Shapefile;
use Shapefile\ShapefileReader;
use SplFileInfo;
use SQLite3;
use const SQLITE3_ASSOC;
use const SQLITE3_OPEN_CREATE;
use const SQLITE3_OPEN_READONLY;
use const SQLITE3_OPEN_READWRITE;
use function str_repeat;
use function str_replace;
use function strlen;
use function strpos;
use function strtolower;
use function substr;
use function trim;
use function ucfirst;
use function unlink;

class EPSGImporter
{
    private string $resourceDir;

    private string $sourceDir;

    private const BOM = "\xEF\xBB\xBF";

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
        if (strpos($tableSchema, self::BOM) === 0) {
            $tableSchema = substr($tableSchema, 3);
        }
        $sqlite->exec($tableSchema);

        $tableData = file_get_contents($this->resourceDir . '/epsg/PostgreSQL_Data_Script.sql');
        if (strpos($tableData, self::BOM) === 0) {
            $tableData = substr($tableData, 3);
        }
        $sqlite->exec($tableData);

        //Corrections
        $sqlite->exec('UPDATE epsg_coordinatereferencesystem SET base_crs_code = 8817 WHERE coord_ref_sys_code = 8818');
        $sqlite->exec('UPDATE epsg_coordinatereferencesystem SET base_crs_code = 9695 WHERE coord_ref_sys_code = 9696');
        $sqlite->exec('UPDATE epsg_coordinatereferencesystem SET projection_conv_code = 15593 WHERE coord_ref_sys_code = 9057');
        $sqlite->exec('UPDATE epsg_coordinatereferencesystem SET projection_conv_code = 15593 WHERE coord_ref_sys_code = 9066');
        $sqlite->exec('UPDATE epsg_coordinatereferencesystem SET projection_conv_code = NULL WHERE coord_ref_sys_code = 4203');
        $sqlite->exec('UPDATE epsg_coordinatereferencesystem SET projection_conv_code = NULL WHERE coord_ref_sys_code = 4277');
        $sqlite->exec('UPDATE epsg_coordinatereferencesystem SET projection_conv_code = NULL WHERE coord_ref_sys_code = 4728');

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
        $this->generateDataCoordinateSystems($sqlite);
        $this->generateDataCoordinateReferenceSystems($sqlite);
        $this->generateDataCoordinateOperationMethods($sqlite);
        $this->generateDataCoordinateOperations($sqlite);
        $this->generateExtents($sqlite);

        $sqlite->close();
    }

    public function generateDataUnitsOfMeasure(SQLite3 $sqlite): void
    {
        $sql = "
            SELECT
                'urn:ogc:def:uom:EPSG::' || m.uom_code AS urn,
                m.unit_of_meas_name AS name,
                m.unit_of_meas_name || '\n' || m.remarks AS constant_help,
                m.remarks AS doc_help,
                m.deprecated
            FROM epsg_unitofmeasure m
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_unitofmeasure' AND dep.object_code = m.uom_code AND dep.deprecation_date <= '2020-12-14'
            LEFT JOIN epsg_ellipsoid e ON e.uom_code = m.uom_code
            LEFT JOIN epsg_primemeridian pm ON pm.uom_code = m.uom_code
            LEFT JOIN epsg_coordinateaxis ca ON ca.uom_code = m.uom_code
            LEFT JOIN epsg_coordoperationparamvalue pv ON pv.uom_code = m.uom_code
            WHERE m.unit_of_meas_type = 'angle' AND m.unit_of_meas_name NOT LIKE '%per second%' AND m.unit_of_meas_name NOT LIKE '%per year%'
            AND (e.uom_code IS NOT NULL OR ca.uom_code IS NOT NULL OR pm.uom_code IS NOT NULL OR pv.uom_code IS NOT NULL)
            GROUP BY m.uom_code
            ORDER BY name
            ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->updateFileData($this->sourceDir . '/UnitOfMeasure/Angle/Angle.php', $data);
        $this->updateFileConstants($this->sourceDir . '/UnitOfMeasure/Angle/Angle.php', $data, 'public', []);
        $this->updateDocs(Angle::class, $data);

        $sql = "
            SELECT
                'urn:ogc:def:uom:EPSG::' || m.uom_code AS urn,
                m.unit_of_meas_name AS name,
                m.unit_of_meas_name || '\n' || m.remarks AS constant_help,
                m.remarks AS doc_help,
                m.deprecated
            FROM epsg_unitofmeasure m
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_unitofmeasure' AND dep.object_code = m.uom_code AND dep.deprecation_date <= '2020-12-14'
            LEFT JOIN epsg_ellipsoid e ON e.uom_code = m.uom_code
            LEFT JOIN epsg_coordinateaxis ca ON ca.uom_code = m.uom_code
            LEFT JOIN epsg_coordoperationparamvalue pv ON pv.uom_code = m.uom_code
            WHERE m.unit_of_meas_type = 'length' AND m.unit_of_meas_name NOT LIKE '%per second%' AND m.unit_of_meas_name NOT LIKE '%per year%'
            AND dep.deprecation_id IS NULL
            AND m.unit_of_meas_name NOT LIKE '%bin%'
            AND (e.uom_code IS NOT NULL OR ca.uom_code IS NOT NULL OR pv.uom_code IS NOT NULL)
            GROUP BY m.uom_code
            ORDER BY name
            ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->updateFileData($this->sourceDir . '/UnitOfMeasure/Length/Length.php', $data);
        $this->updateFileConstants($this->sourceDir . '/UnitOfMeasure/Length/Length.php', $data, 'public', []);
        $this->updateDocs(Length::class, $data);

        $sql = "
            SELECT
                'urn:ogc:def:uom:EPSG::' || m.uom_code AS urn,
                m.unit_of_meas_name AS name,
                m.unit_of_meas_name || '\n' || m.remarks AS constant_help,
                m.remarks AS doc_help,
                m.deprecated
            FROM epsg_unitofmeasure m
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_unitofmeasure' AND dep.object_code = m.uom_code AND dep.deprecation_date <= '2020-12-14'
            LEFT JOIN epsg_ellipsoid e ON e.uom_code = m.uom_code
            LEFT JOIN epsg_coordinateaxis ca ON ca.uom_code = m.uom_code
            LEFT JOIN epsg_coordoperationparamvalue pv ON pv.uom_code = m.uom_code
            WHERE m.unit_of_meas_type = 'scale' AND m.unit_of_meas_name NOT LIKE '%per second%' AND m.unit_of_meas_name NOT LIKE '%per year%'
            AND dep.deprecation_id IS NULL
            AND m.unit_of_meas_name NOT LIKE '%bin%'
            AND (e.uom_code IS NOT NULL OR ca.uom_code IS NOT NULL OR pv.uom_code IS NOT NULL)
            GROUP BY m.uom_code
            ORDER BY name
            ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->updateFileData($this->sourceDir . '/UnitOfMeasure/Scale/Scale.php', $data);
        $this->updateFileConstants($this->sourceDir . '/UnitOfMeasure/Scale/Scale.php', $data, 'public', []);
        $this->updateDocs(Scale::class, $data);

        $sql = "
            SELECT
                'urn:ogc:def:uom:EPSG::' || m.uom_code AS urn,
                m.unit_of_meas_name AS name,
                m.unit_of_meas_name || '\n' || m.remarks AS constant_help,
                m.remarks AS doc_help,
                m.deprecated
            FROM epsg_unitofmeasure m
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_unitofmeasure' AND dep.object_code = m.uom_code AND dep.deprecation_date <= '2020-12-14'
            LEFT JOIN epsg_ellipsoid e ON e.uom_code = m.uom_code
            LEFT JOIN epsg_coordinateaxis ca ON ca.uom_code = m.uom_code
            LEFT JOIN epsg_coordoperationparamvalue pv ON pv.uom_code = m.uom_code
            WHERE m.unit_of_meas_type = 'time' AND m.unit_of_meas_name NOT LIKE '%per second%' AND m.unit_of_meas_name NOT LIKE '%per year%'
            AND dep.deprecation_id IS NULL
            AND (e.uom_code IS NOT NULL OR ca.uom_code IS NOT NULL OR pv.uom_code IS NOT NULL)
            GROUP BY m.uom_code
            ORDER BY name
            ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->updateFileData($this->sourceDir . '/UnitOfMeasure/Time/Time.php', $data);
        $this->updateFileConstants($this->sourceDir . '/UnitOfMeasure/Time/Time.php', $data, 'public', []);
        $this->updateDocs(Time::class, $data);

        $sql = "
            SELECT
                'urn:ogc:def:uom:EPSG::' || m.uom_code AS urn,
                m.unit_of_meas_name AS name,
                m.unit_of_meas_name || '\n' || m.remarks AS constant_help,
                m.remarks AS doc_help,
                m.deprecated
            FROM epsg_unitofmeasure m
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_unitofmeasure' AND dep.object_code = m.uom_code AND dep.deprecation_date <= '2020-12-14'
            LEFT JOIN epsg_ellipsoid e ON e.uom_code = m.uom_code
            LEFT JOIN epsg_coordinateaxis ca ON ca.uom_code = m.uom_code
            LEFT JOIN epsg_coordoperationparamvalue pv ON pv.uom_code = m.uom_code
            WHERE (m.unit_of_meas_name LIKE '%per second%' OR m.unit_of_meas_name LIKE '%per year%')
            AND dep.deprecation_id IS NULL
            AND (e.uom_code IS NOT NULL OR ca.uom_code IS NOT NULL OR pv.uom_code IS NOT NULL)
            GROUP BY m.uom_code
            ORDER BY name
            ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->updateFileData($this->sourceDir . '/UnitOfMeasure/Rate.php', $data);
        $this->updateFileConstants($this->sourceDir . '/UnitOfMeasure/Rate.php', $data, 'public', []);
        $this->updateDocs(Rate::class, $data);

        $sql = "
            SELECT
                'urn:ogc:def:uom:EPSG::' || m.uom_code AS urn,
                m.unit_of_meas_type || '_' || m.unit_of_meas_name AS name,
                m.unit_of_meas_name || '\n' || m.remarks AS constant_help,
                m.deprecated
            FROM epsg_unitofmeasure m
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_unitofmeasure' AND dep.object_code = m.uom_code AND dep.deprecation_date <= '2020-12-14'
            LEFT JOIN epsg_ellipsoid e ON e.uom_code = m.uom_code
            LEFT JOIN epsg_coordinateaxis ca ON ca.uom_code = m.uom_code
            LEFT JOIN epsg_coordoperationparamvalue pv ON pv.uom_code = m.uom_code
            WHERE m.unit_of_meas_type NOT IN ('angle', 'length', 'scale', 'time') AND m.unit_of_meas_name NOT LIKE '%per second%' AND m.unit_of_meas_name NOT LIKE '%per year%'
            AND dep.deprecation_id IS NULL
            AND (e.uom_code IS NOT NULL OR ca.uom_code IS NOT NULL OR pv.uom_code IS NOT NULL)
            GROUP BY m.uom_code
            ORDER BY name
            ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->updateFileData($this->sourceDir . '/UnitOfMeasure/UnitOfMeasure.php', $data);
        $this->updateFileConstants($this->sourceDir . '/UnitOfMeasure/UnitOfMeasure.php', $data, 'public', []);
    }

    public function generateDataPrimeMeridians(SQLite3 $sqlite): void
    {
        $sql = "
            SELECT
                'urn:ogc:def:meridian:EPSG::' || p.prime_meridian_code AS urn,
                p.prime_meridian_name AS name,
                p.prime_meridian_name || '\n' || p.remarks AS constant_help,
                p.greenwich_longitude,
                'urn:ogc:def:uom:EPSG::' || p.uom_code AS uom,
                p.remarks AS doc_help,
                p.deprecated
            FROM epsg_primemeridian p
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_primemeridian' AND dep.object_code = p.prime_meridian_code AND dep.deprecation_date <= '2020-12-14'
            WHERE dep.deprecation_id IS NULL
            ORDER BY name
            ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->updateFileData($this->sourceDir . '/Datum/PrimeMeridian.php', $data);
        $this->updateFileConstants($this->sourceDir . '/Datum/PrimeMeridian.php', $data, 'public', []);
        $this->updateDocs(PrimeMeridian::class, $data);
    }

    public function generateDataEllipsoids(SQLite3 $sqlite): void
    {
        $sql = "
            SELECT
                'urn:ogc:def:ellipsoid:EPSG::' || e.ellipsoid_code AS urn,
                e.ellipsoid_name AS name,
                e.semi_major_axis,
                e.semi_minor_axis,
                e.inv_flattening,
                'urn:ogc:def:uom:EPSG::' || e.uom_code AS uom,
                e.ellipsoid_name || '\n' || e.remarks AS constant_help,
                e.remarks AS doc_help,
                e.deprecated
            FROM epsg_ellipsoid e
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_ellipsoid' AND dep.object_code = e.ellipsoid_code AND dep.deprecation_date <= '2020-12-14'
            WHERE dep.deprecation_id IS NULL
            ORDER BY name
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
        $this->updateFileConstants($this->sourceDir . '/Datum/Ellipsoid.php', $data, 'public', []);
        $this->updateDocs(Ellipsoid::class, $data);
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
                d.frame_reference_epoch,
                d.datum_name || '\n' || 'Type: ' || d.datum_type || '\n' || 'Extent: ' || GROUP_CONCAT(e.extent_description, ' ') || '\n' || d.origin_description || '\n' || d.remarks AS constant_help,
                GROUP_CONCAT(e.extent_description, ' ') AS extent,
                d.origin_description || '\n' || d.remarks AS doc_help,
                d.deprecated
            FROM epsg_datum d
            JOIN epsg_usage u ON u.object_table_name = 'epsg_datum' AND u.object_code = d.datum_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_datum' AND dep.object_code = d.datum_code AND dep.deprecation_date <= '2020-12-14'
            WHERE dep.deprecation_id IS NULL AND d.datum_type != 'engineering'
            GROUP BY d.datum_code
            ORDER BY name
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
        $this->updateFileConstants(
            $this->sourceDir . '/Datum/Datum.php',
            $data,
            'public',
            [
                Datum::EPSG_ORDNANCE_SURVEY_OF_GREAT_BRITAIN_1936 => ['OSGB 1936'],
            ]
        );
        $this->updateDocs(Datum::class, $data);
    }

    public function generateDataCoordinateSystems(SQLite3 $sqlite): void
    {
        /*
         * cartesian
         */
        $sql = "
            SELECT
                'urn:ogc:def:cs:EPSG::' || cs.coord_sys_code AS urn,
                REPLACE(REPLACE(cs.coord_sys_name, 'Cartesian ', ''), 'CS. ', '') || CASE cs.coord_sys_code WHEN 4531 THEN '_LOWERCASE' ELSE '' END AS name,
                cs.coord_sys_name || '\n' || 'Type: ' || cs.coord_sys_type || '\n' || cs.remarks AS constant_help,
                cs.remarks AS doc_help,
                cs.deprecated
            FROM epsg_coordinatesystem cs
            JOIN epsg_coordinatereferencesystem crs ON crs.coord_sys_code = cs.coord_sys_code AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%'
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatesystem' AND dep.object_code = cs.coord_sys_code AND dep.deprecation_date <= '2020-12-14'
            WHERE dep.deprecation_id IS NULL AND cs.coord_sys_type != 'ordinal'
            AND cs.coord_sys_type = 'Cartesian'
            GROUP BY cs.coord_sys_code
            ORDER BY name
            ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['axes'] = [];
            $axisSql = "
                SELECT
                    'urn:ogc:def:cs:EPSG::' || a.coord_sys_code AS coord_sys,
                    a.coord_axis_orientation AS orientation,
                    a.coord_axis_abbreviation AS abbreviation,
                    an.coord_axis_name AS name,
                    'urn:ogc:def:uom:EPSG::' || a.uom_code AS uom
                FROM epsg_coordinateaxis a
                JOIN epsg_coordinateaxisname an on a.coord_axis_name_code = an.coord_axis_name_code
                WHERE coord_sys = '{$row['urn']}'
                ORDER BY a.coord_axis_order
                ";

            $axisResult = $sqlite->query($axisSql);
            while ($axisRow = $axisResult->fetchArray(SQLITE3_ASSOC)) {
                unset($axisRow['coord_sys']);
                $row['axes'][] = $axisRow;
            }
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->updateFileData($this->sourceDir . '/CoordinateSystem/Cartesian.php', $data);
        $this->updateFileConstants($this->sourceDir . '/CoordinateSystem/Cartesian.php', $data, 'public', []);
        $this->updateDocs(Cartesian::class, $data);

        /*
         * ellipsoidal
         */
        $sql = "
            SELECT
                'urn:ogc:def:cs:EPSG::' || cs.coord_sys_code AS urn,
                REPLACE(REPLACE(cs.coord_sys_name, 'Ellipsoidal ', ''), 'CS. ', '') AS name,
                cs.coord_sys_name || '\n' || 'Type: ' || cs.coord_sys_type || '\n' || cs.remarks AS constant_help,
                cs.remarks AS doc_help,
                cs.deprecated
            FROM epsg_coordinatesystem cs
            JOIN epsg_coordinatereferencesystem crs ON crs.coord_sys_code = cs.coord_sys_code AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%'
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatesystem' AND dep.object_code = cs.coord_sys_code AND dep.deprecation_date <= '2020-12-14'
            WHERE dep.deprecation_id IS NULL AND cs.coord_sys_type != 'ordinal'
            AND cs.coord_sys_type = 'ellipsoidal'
            GROUP BY cs.coord_sys_code
            ORDER BY name
            ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['axes'] = [];
            $axisSql = "
                SELECT
                    'urn:ogc:def:cs:EPSG::' || a.coord_sys_code AS coord_sys,
                    a.coord_axis_orientation AS orientation,
                    a.coord_axis_abbreviation AS abbreviation,
                    an.coord_axis_name AS name,
                    'urn:ogc:def:uom:EPSG::' || a.uom_code AS uom
                FROM epsg_coordinateaxis a
                JOIN epsg_coordinateaxisname an on a.coord_axis_name_code = an.coord_axis_name_code
                WHERE coord_sys = '{$row['urn']}'
                ORDER BY a.coord_axis_order
                ";

            $axisResult = $sqlite->query($axisSql);
            while ($axisRow = $axisResult->fetchArray(SQLITE3_ASSOC)) {
                unset($axisRow['coord_sys']);
                $row['axes'][] = $axisRow;
            }
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->updateFileData($this->sourceDir . '/CoordinateSystem/Ellipsoidal.php', $data);
        $this->updateFileConstants($this->sourceDir . '/CoordinateSystem/Ellipsoidal.php', $data, 'public', []);
        $this->updateDocs(Ellipsoidal::class, $data);

        /*
         * vertical
         */
        $sql = "
            SELECT
                'urn:ogc:def:cs:EPSG::' || cs.coord_sys_code AS urn,
                REPLACE(REPLACE(cs.coord_sys_name, 'Vertical ', ''), 'CS. ', '') AS name,
                cs.coord_sys_name || '\n' || 'Type: ' || cs.coord_sys_type || '\n' || cs.remarks AS constant_help,
                cs.remarks AS doc_help,
                cs.deprecated
            FROM epsg_coordinatesystem cs
            JOIN epsg_coordinatereferencesystem crs ON crs.coord_sys_code = cs.coord_sys_code AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%'
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatesystem' AND dep.object_code = cs.coord_sys_code AND dep.deprecation_date <= '2020-12-14'
            WHERE dep.deprecation_id IS NULL AND cs.coord_sys_type != 'ordinal'
            AND cs.coord_sys_type = 'vertical'
            GROUP BY cs.coord_sys_code
            ORDER BY name
            ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['axes'] = [];
            $axisSql = "
                SELECT
                    'urn:ogc:def:cs:EPSG::' || a.coord_sys_code AS coord_sys,
                    a.coord_axis_orientation AS orientation,
                    a.coord_axis_abbreviation AS abbreviation,
                    an.coord_axis_name AS name,
                    'urn:ogc:def:uom:EPSG::' || a.uom_code AS uom
                FROM epsg_coordinateaxis a
                JOIN epsg_coordinateaxisname an on a.coord_axis_name_code = an.coord_axis_name_code
                WHERE coord_sys = '{$row['urn']}'
                ORDER BY a.coord_axis_order
                ";

            $axisResult = $sqlite->query($axisSql);
            while ($axisRow = $axisResult->fetchArray(SQLITE3_ASSOC)) {
                unset($axisRow['coord_sys']);
                $row['axes'][] = $axisRow;
            }
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->updateFileData($this->sourceDir . '/CoordinateSystem/Vertical.php', $data);
        $this->updateFileConstants($this->sourceDir . '/CoordinateSystem/Vertical.php', $data, 'public', []);
        $this->updateDocs(VerticalCS::class, $data);

        /*
         * other
         */
        $sql = "
            SELECT
                'urn:ogc:def:cs:EPSG::' || cs.coord_sys_code AS urn,
                cs.coord_sys_name AS name,
                cs.coord_sys_type AS type,
                cs.coord_sys_name || '\n' || 'Type: ' || cs.coord_sys_type || '\n' || cs.remarks AS constant_help,
                cs.deprecated
            FROM epsg_coordinatesystem cs
            JOIN epsg_coordinatereferencesystem crs ON crs.coord_sys_code = cs.coord_sys_code AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%'
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatesystem' AND dep.object_code = cs.coord_sys_code AND dep.deprecation_date <= '2020-12-14'
            WHERE dep.deprecation_id IS NULL AND cs.coord_sys_type != 'ordinal'
            AND cs.coord_sys_type NOT IN ('Cartesian', 'ellipsoidal', 'vertical')
            GROUP BY cs.coord_sys_code
            ORDER BY name
            ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['axes'] = [];
            $axisSql = "
                SELECT
                    'urn:ogc:def:cs:EPSG::' || a.coord_sys_code AS coord_sys,
                    a.coord_axis_orientation AS orientation,
                    a.coord_axis_abbreviation AS abbreviation,
                    an.coord_axis_name AS name,
                    'urn:ogc:def:uom:EPSG::' || a.uom_code AS uom
                FROM epsg_coordinateaxis a
                JOIN epsg_coordinateaxisname an on a.coord_axis_name_code = an.coord_axis_name_code
                WHERE coord_sys = '{$row['urn']}'
                ORDER BY a.coord_axis_order
                ";

            $axisResult = $sqlite->query($axisSql);
            while ($axisRow = $axisResult->fetchArray(SQLITE3_ASSOC)) {
                unset($axisRow['coord_sys']);
                $row['axes'][] = $axisRow;
            }
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->updateFileData($this->sourceDir . '/CoordinateSystem/CoordinateSystem.php', $data);
        $this->updateFileConstants($this->sourceDir . '/CoordinateSystem/CoordinateSystem.php', $data, 'public', []);
    }

    public function generateDataCoordinateReferenceSystems(SQLite3 $sqlite): void
    {
        /*
         * compound
         */
        $sql = "
            SELECT
                'urn:ogc:def:crs:EPSG::' || crs.coord_ref_sys_code AS urn,
                crs.coord_ref_sys_name AS name,
                'urn:ogc:def:crs:EPSG::' || crs.cmpd_horizcrs_code AS horizontal_crs,
                horizontal.coord_ref_sys_kind AS horizontal_crs_type,
                'urn:ogc:def:crs:EPSG::' || crs.cmpd_vertcrs_code AS vertical_crs,
                crs.coord_ref_sys_name || '\n' || 'Extent: ' || GROUP_CONCAT(e.extent_description, ' ') || '\n' || crs.remarks AS constant_help,
                GROUP_CONCAT(e.extent_code, ',') AS extent_code,
                GROUP_CONCAT(e.extent_description, ' ') AS extent,
                crs.remarks AS doc_help,
                crs.deprecated
            FROM epsg_coordinatereferencesystem crs
            JOIN epsg_usage u ON u.object_table_name = 'epsg_coordinatereferencesystem' AND u.object_code = crs.coord_ref_sys_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            JOIN epsg_coordinatereferencesystem horizontal ON horizontal.coord_ref_sys_code = crs.cmpd_horizcrs_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2020-12-14'
            WHERE dep.deprecation_id IS NULL AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%' AND crs.coord_ref_sys_name NOT LIKE '%mining%'
            AND (crs.cmpd_horizcrs_code IS NULL OR crs.cmpd_horizcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind = 'engineering'))
            AND (crs.cmpd_vertcrs_code IS NULL OR crs.cmpd_vertcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind = 'engineering'))
            AND crs.coord_ref_sys_kind = 'compound'
            GROUP BY crs.coord_ref_sys_code
            ORDER BY name
            ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['extent_code'] = array_unique(explode(',', $row['extent_code']));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/CompoundSRIDData.php', $data);
        $this->updateFileConstants(
            $this->sourceDir . '/CoordinateReferenceSystem/Compound.php',
            $data,
            'public',
            [
                Compound::EPSG_OSGB36_BRITISH_NATIONAL_GRID_PLUS_ODN_HEIGHT => ['OSGB 1936 / British National Grid + ODN height'],
            ]
        );
        $this->updateDocs(Compound::class, $data);

        /*
         * geocentric
         */
        $sql = "
            SELECT
                'urn:ogc:def:crs:EPSG::' || crs.coord_ref_sys_code AS urn,
                crs.coord_ref_sys_name AS name,
                'urn:ogc:def:cs:EPSG::' || crs.coord_sys_code AS coordinate_system,
                'urn:ogc:def:datum:EPSG::' || COALESCE(crs.datum_code, crs_base.datum_code) AS datum,
                crs.coord_ref_sys_name || '\n' || 'Extent: ' || GROUP_CONCAT(e.extent_description, ' ') || '\n' || crs.remarks AS constant_help,
                GROUP_CONCAT(e.extent_code, ',') AS extent_code,
                GROUP_CONCAT(e.extent_description, ' ') AS extent,
                crs.remarks AS doc_help,
                crs.deprecated
            FROM epsg_coordinatereferencesystem crs
            JOIN epsg_usage u ON u.object_table_name = 'epsg_coordinatereferencesystem' AND u.object_code = crs.coord_ref_sys_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_coordinatereferencesystem crs_base ON crs_base.coord_ref_sys_code = crs.base_crs_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2020-12-14'
            WHERE dep.deprecation_id IS NULL AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%' AND crs.coord_ref_sys_name NOT LIKE '%mining%'
            AND (crs.cmpd_horizcrs_code IS NULL OR crs.cmpd_horizcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind = 'engineering'))
            AND (crs.cmpd_vertcrs_code IS NULL OR crs.cmpd_vertcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind = 'engineering'))
            AND crs.coord_ref_sys_kind = 'geocentric'
            GROUP BY crs.coord_ref_sys_code
            ORDER BY name
            ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['extent_code'] = array_unique(explode(',', $row['extent_code']));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/GeocentricSRIDData.php', $data);
        $this->updateFileConstants(
            $this->sourceDir . '/CoordinateReferenceSystem/Geocentric.php',
            $data,
            'public',
            []
        );
        $this->updateDocs(Geocentric::class, $data);

        /*
         * geographic 2D
         */
        $sql = "
            SELECT
                'urn:ogc:def:crs:EPSG::' || crs.coord_ref_sys_code AS urn,
                crs.coord_ref_sys_name AS name,
                'urn:ogc:def:cs:EPSG::' || crs.coord_sys_code AS coordinate_system,
                'urn:ogc:def:datum:EPSG::' || COALESCE(crs.datum_code, crs_base.datum_code) AS datum,
                crs.coord_ref_sys_name || '\n' || 'Extent: ' || GROUP_CONCAT(e.extent_description, ' ') || '\n' || crs.remarks AS constant_help,
                GROUP_CONCAT(e.extent_code, ',') AS extent_code,
                GROUP_CONCAT(e.extent_description, ' ') AS extent,
                crs.remarks AS doc_help,
                crs.deprecated
            FROM epsg_coordinatereferencesystem crs
            JOIN epsg_usage u ON u.object_table_name = 'epsg_coordinatereferencesystem' AND u.object_code = crs.coord_ref_sys_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_coordinatereferencesystem crs_base ON crs_base.coord_ref_sys_code = crs.base_crs_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2020-12-14'
            WHERE dep.deprecation_id IS NULL AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%' AND crs.coord_ref_sys_name NOT LIKE '%mining%'
            AND (crs.cmpd_horizcrs_code IS NULL OR crs.cmpd_horizcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind = 'engineering'))
            AND (crs.cmpd_vertcrs_code IS NULL OR crs.cmpd_vertcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind = 'engineering'))
            AND crs.coord_ref_sys_kind = 'geographic 2D'
            GROUP BY crs.coord_ref_sys_code
            ORDER BY name
            ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['extent_code'] = array_unique(explode(',', $row['extent_code']));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/Geographic2DSRIDData.php', $data);
        $this->updateFileConstants(
            $this->sourceDir . '/CoordinateReferenceSystem/Geographic2D.php',
            $data,
            'public',
            [
                Geographic2D::EPSG_OSGB36 => ['OSGB 1936'],
            ]
        );
        $this->updateDocs(Geographic2D::class, $data);

        /*
         * geographic 3D
         */
        $sql = "
            SELECT
                'urn:ogc:def:crs:EPSG::' || crs.coord_ref_sys_code AS urn,
                crs.coord_ref_sys_name AS name,
                'urn:ogc:def:cs:EPSG::' || crs.coord_sys_code AS coordinate_system,
                'urn:ogc:def:datum:EPSG::' || COALESCE(crs.datum_code, crs_base.datum_code) AS datum,
                crs.coord_ref_sys_name || '\n' || 'Extent: ' || GROUP_CONCAT(e.extent_description, ' ') || '\n' || crs.remarks AS constant_help,
                GROUP_CONCAT(e.extent_code, ',') AS extent_code,
                GROUP_CONCAT(e.extent_description, ' ') AS extent,
                crs.remarks AS doc_help,
                crs.deprecated
            FROM epsg_coordinatereferencesystem crs
            JOIN epsg_usage u ON u.object_table_name = 'epsg_coordinatereferencesystem' AND u.object_code = crs.coord_ref_sys_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_coordinatereferencesystem crs_base ON crs_base.coord_ref_sys_code = crs.base_crs_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2020-12-14'
            WHERE dep.deprecation_id IS NULL AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%' AND crs.coord_ref_sys_name NOT LIKE '%mining%'
            AND (crs.cmpd_horizcrs_code IS NULL OR crs.cmpd_horizcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind = 'engineering'))
            AND (crs.cmpd_vertcrs_code IS NULL OR crs.cmpd_vertcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind = 'engineering'))
            AND crs.coord_ref_sys_kind = 'geographic 3D'
            GROUP BY crs.coord_ref_sys_code
            ORDER BY name
            ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['extent_code'] = array_unique(explode(',', $row['extent_code']));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/Geographic3DSRIDData.php', $data);
        $this->updateFileConstants(
            $this->sourceDir . '/CoordinateReferenceSystem/Geographic3D.php',
            $data,
            'public',
            []
        );
        $this->updateDocs(Geographic3D::class, $data);

        /*
         * projected
         */
        $sql = "
            SELECT
                'urn:ogc:def:crs:EPSG::' || crs.coord_ref_sys_code AS urn,
                crs.coord_ref_sys_name AS name,
                'urn:ogc:def:cs:EPSG::' || crs.coord_sys_code AS coordinate_system,
                'urn:ogc:def:datum:EPSG::' || COALESCE(crs.datum_code, crs_base.datum_code) AS datum,
                crs.coord_ref_sys_name || '\n' || 'Extent: ' || GROUP_CONCAT(e.extent_description, ' ') || '\n' || crs.remarks AS constant_help,
                GROUP_CONCAT(e.extent_code, ',') AS extent_code,
                GROUP_CONCAT(e.extent_description, ' ') AS extent,
                crs.remarks AS doc_help,
                crs.deprecated
            FROM epsg_coordinatereferencesystem crs
            JOIN epsg_usage u ON u.object_table_name = 'epsg_coordinatereferencesystem' AND u.object_code = crs.coord_ref_sys_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_coordinatereferencesystem crs_base ON crs_base.coord_ref_sys_code = crs.base_crs_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2020-12-14'
            WHERE dep.deprecation_id IS NULL AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%' AND crs.coord_ref_sys_name NOT LIKE '%mining%'
            AND (crs.cmpd_horizcrs_code IS NULL OR crs.cmpd_horizcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind = 'engineering'))
            AND (crs.cmpd_vertcrs_code IS NULL OR crs.cmpd_vertcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind = 'engineering'))
            AND crs.coord_ref_sys_kind = 'projected'
            GROUP BY crs.coord_ref_sys_code
            ORDER BY name
            ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['extent_code'] = array_unique(explode(',', $row['extent_code']));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/ProjectedSRIDData.php', $data);
        $this->updateFileConstants(
            $this->sourceDir . '/CoordinateReferenceSystem/Projected.php',
            $data,
            'public',
            [
                Projected::EPSG_OSGB36_BRITISH_NATIONAL_GRID => ['OSGB 1936 / British National Grid'],
                Projected::EPSG_ETRF2000_PL_CS2000_15 => ['ETRS89 / Poland CS2000 zone 5'],
                Projected::EPSG_ETRF2000_PL_CS2000_18 => ['ETRS89 / Poland CS2000 zone 6'],
                Projected::EPSG_ETRF2000_PL_CS2000_21 => ['ETRS89 / Poland CS2000 zone 7'],
                Projected::EPSG_ETRF2000_PL_CS2000_24 => ['ETRS89 / Poland CS2000 zone 8'],
                Projected::EPSG_ETRF2000_PL_CS92 => ['ETRS89 / Poland CS92'],
            ]
        );
        $this->updateDocs(Projected::class, $data);

        /*
         * vertical
         */
        $sql = "
            SELECT
                'urn:ogc:def:crs:EPSG::' || crs.coord_ref_sys_code AS urn,
                crs.coord_ref_sys_name AS name,
                'urn:ogc:def:cs:EPSG::' || crs.coord_sys_code AS coordinate_system,
                'urn:ogc:def:datum:EPSG::' || COALESCE(crs.datum_code, crs_base.datum_code, crs_base2.datum_code) AS datum,
                crs.coord_ref_sys_name || '\n' || 'Extent: ' || GROUP_CONCAT(e.extent_description, ' ') || '\n' || crs.remarks AS constant_help,
                GROUP_CONCAT(e.extent_code, ',') AS extent_code,
                GROUP_CONCAT(e.extent_description, ' ') AS extent,
                crs.remarks AS doc_help,
                crs.deprecated
            FROM epsg_coordinatereferencesystem crs
            JOIN epsg_usage u ON u.object_table_name = 'epsg_coordinatereferencesystem' AND u.object_code = crs.coord_ref_sys_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_coordinatereferencesystem crs_base ON crs_base.coord_ref_sys_code = crs.base_crs_code
            LEFT JOIN epsg_coordinatereferencesystem crs_base2 ON crs_base2.coord_ref_sys_code = crs_base.base_crs_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2020-12-14'
            WHERE dep.deprecation_id IS NULL AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%' AND crs.coord_ref_sys_name NOT LIKE '%mining%'
            AND (crs.cmpd_horizcrs_code IS NULL OR crs.cmpd_horizcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind = 'engineering'))
            AND (crs.cmpd_vertcrs_code IS NULL OR crs.cmpd_vertcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind = 'engineering'))
            AND crs.coord_ref_sys_kind = 'vertical'
            GROUP BY crs.coord_ref_sys_code
            ORDER BY name
            ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['extent_code'] = array_unique(explode(',', $row['extent_code']));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/VerticalSRIDData.php', $data);
        $this->updateFileConstants(
            $this->sourceDir . '/CoordinateReferenceSystem/Vertical.php',
            $data,
            'public',
            []
        );
        $this->updateDocs(Vertical::class, $data);

        /*
         * other
         */
        $sql = "
            SELECT
                'urn:ogc:def:crs:EPSG::' || crs.coord_ref_sys_code AS urn,
                crs.coord_ref_sys_kind AS kind,
                crs.coord_ref_sys_name AS name,
                'urn:ogc:def:cs:EPSG::' || crs.coord_sys_code AS coordinate_system,
                'urn:ogc:def:datum:EPSG::' || COALESCE(crs.datum_code, crs_base.datum_code) AS datum,
                crs.coord_ref_sys_name || '\n' || 'Extent: ' || GROUP_CONCAT(e.extent_description, ' ') || '\n' || crs.remarks AS constant_help,
                crs.deprecated
            FROM epsg_coordinatereferencesystem crs
            JOIN epsg_usage u ON u.object_table_name = 'epsg_coordinatereferencesystem' AND u.object_code = crs.coord_ref_sys_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_coordinatereferencesystem crs_base ON crs_base.coord_ref_sys_code = crs.base_crs_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2020-12-14'
            WHERE dep.deprecation_id IS NULL AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%' AND crs.coord_ref_sys_name NOT LIKE '%mining%'
            AND (crs.cmpd_horizcrs_code IS NULL OR crs.cmpd_horizcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind = 'engineering'))
            AND (crs.cmpd_vertcrs_code IS NULL OR crs.cmpd_vertcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind = 'engineering'))
            AND crs.coord_ref_sys_kind NOT IN ('compound', 'geocentric', 'geographic 2D', 'geographic 3D', 'projected', 'vertical')
            GROUP BY crs.coord_ref_sys_code
            ORDER BY name
            ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/CoordinateReferenceSystem.php', $data);
        $this->updateFileConstants(
            $this->sourceDir . '/CoordinateReferenceSystem/CoordinateReferenceSystem.php',
            $data,
            'public',
            []
        );
    }

    public function generateDataCoordinateOperationMethods(SQLite3 $sqlite): void
    {
        $sql = "
            SELECT
                'urn:ogc:def:method:EPSG::' || m.coord_op_method_code AS urn,
                m.coord_op_method_name AS name,
                m.coord_op_method_name || '\n' || m.remarks AS constant_help,
                m.deprecated
            FROM epsg_coordoperationmethod m
            LEFT JOIN epsg_coordoperationparamvalue p ON p.coord_op_method_code = m.coord_op_method_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperationmethod' AND dep.object_code = m.coord_op_method_code AND dep.deprecation_date <= '2020-12-14'
            WHERE dep.deprecation_id IS NULL AND m.deprecated = 0
            AND m.coord_op_method_name NOT LIKE '%wellbore%'
            AND m.coord_op_method_name NOT LIKE '%mining%'
            AND m.coord_op_method_name NOT LIKE '%seismic%'
            GROUP BY m.coord_op_method_code
            HAVING (SUM(CASE WHEN p.param_value_file_ref != '' THEN 1 ELSE 0 END) = 0) -- skip anything that needs some kind of datafile
            ORDER BY name
        ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->updateFileConstants(
            $this->sourceDir . '/CoordinateOperation/CoordinateOperationMethods.php',
            $data,
            'public',
            []
        );
    }

    public function generateDataCoordinateOperations(SQLite3 $sqlite): void
    {
        $sql = "
            SELECT
                'urn:ogc:def:coordinateOperation:EPSG::' || o.coord_op_code AS operation,
                o.coord_op_name AS name,
                'urn:ogc:def:crs:EPSG::' || o.source_crs_code AS source_crs,
                'urn:ogc:def:crs:EPSG::' || o.target_crs_code AS target_crs,
                COALESCE(o.coord_op_accuracy, 0) AS accuracy,
                m.reverse_op AS reversible
            FROM epsg_coordoperation o
            JOIN epsg_coordoperationmethod m ON m.coord_op_method_code = o.coord_op_method_code
            JOIN epsg_coordinatereferencesystem sourcecrs ON sourcecrs.coord_ref_sys_code = o.source_crs_code AND sourcecrs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND sourcecrs.deprecated = 0
            JOIN epsg_coordinatereferencesystem targetcrs ON targetcrs.coord_ref_sys_code = o.target_crs_code AND targetcrs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND targetcrs.deprecated = 0
            LEFT JOIN epsg_coordoperationparamvalue p ON p.coord_op_code = o.coord_op_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code AND dep.deprecation_date <= '2020-12-14'
            WHERE o.coord_op_type != 'conversion' AND o.coord_op_name NOT LIKE '%example%' AND o.coord_op_name NOT LIKE '%mining%'
            AND dep.deprecation_id IS NULL
            GROUP BY source_crs, target_crs, o.coord_op_code
            HAVING (SUM(CASE WHEN p.param_value_file_ref != '' THEN 1 ELSE 0 END) = 0) -- skip anything that needs some kind of datafile

            UNION

            SELECT
                'urn:ogc:def:coordinateOperation:EPSG::' || o.coord_op_code AS operation,
                o.coord_op_name AS name,
                'urn:ogc:def:crs:EPSG::' || projcrs.base_crs_code AS source_crs,
                'urn:ogc:def:crs:EPSG::' || projcrs.coord_ref_sys_code AS target_crs,
                COALESCE(o.coord_op_accuracy, 0) AS accuracy,
                m.reverse_op AS reversible
            FROM epsg_coordoperation o
            JOIN epsg_coordinatereferencesystem projcrs ON projcrs.projection_conv_code = o.coord_op_code AND projcrs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND projcrs.deprecated = 0
            JOIN epsg_coordoperationmethod m ON m.coord_op_method_code = o.coord_op_method_code
            LEFT JOIN epsg_coordoperationparamvalue p ON p.coord_op_code = o.coord_op_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code AND dep.deprecation_date <= '2020-12-14'
            WHERE o.coord_op_type = 'conversion' AND o.coord_op_name NOT LIKE '%example%' AND o.coord_op_name NOT LIKE '%mining%'
            AND dep.deprecation_id IS NULL
            GROUP BY source_crs, target_crs, o.coord_op_code
            HAVING (SUM(CASE WHEN p.param_value_file_ref != '' THEN 1 ELSE 0 END) = 0) -- skip anything that needs some kind of datafile

            UNION

            SELECT
                'urn:ogc:def:coordinateOperation:EPSG::' || o.coord_op_code AS operation,
                o.coord_op_name AS name,
                'urn:ogc:def:crs:EPSG::' || o.source_crs_code AS source_crs,
                'urn:ogc:def:crs:EPSG::' || o.target_crs_code AS target_crs,
                COALESCE(o.coord_op_accuracy, 0) AS accuracy,
                CASE WHEN SUM(CASE WHEN cm.reverse_op = 0 THEN 1 ELSE 0 END) = 0 THEN 1 ELSE 0 END AS reversible
            FROM epsg_coordoperation o
            LEFT JOIN epsg_coordoperationpath p ON p.concat_operation_code = o.coord_op_code
            LEFT JOIN epsg_coordoperation co ON p.single_operation_code = co.coord_op_code
            LEFT JOIN epsg_coordoperationmethod cm ON co.coord_op_method_code = cm.coord_op_method_code
            JOIN epsg_coordinatereferencesystem sourcecrs ON sourcecrs.coord_ref_sys_code = o.source_crs_code AND sourcecrs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND sourcecrs.deprecated = 0
            JOIN epsg_coordinatereferencesystem targetcrs ON targetcrs.coord_ref_sys_code = o.target_crs_code AND targetcrs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND targetcrs.deprecated = 0
            LEFT JOIN epsg_coordoperationparamvalue p ON p.coord_op_code = co.coord_op_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code AND dep.deprecation_date <= '2020-12-14'
            WHERE o.coord_op_type = 'concatenated operation' AND o.coord_op_name NOT LIKE '%example%' AND o.coord_op_name NOT LIKE '%mining%'
            AND dep.deprecation_id IS NULL
            GROUP BY source_crs, target_crs, o.coord_op_code
            HAVING (SUM(CASE WHEN p.param_value_file_ref != '' THEN 1 ELSE 0 END) = 0) -- skip anything that needs some kind of datafile

            ORDER BY source_crs, target_crs, operation
            ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['reversible'] = (bool) $row['reversible'];
            $data[] = $row;
        }

        $this->updateFileData($this->sourceDir . '/CoordinateOperation/CRSTransformations.php', $data);

        $sql = "
            SELECT
                'urn:ogc:def:coordinateOperation:EPSG::' || o.coord_op_code AS urn,
                o.coord_op_name AS name,
                o.coord_op_type AS type,
                'urn:ogc:def:method:EPSG::' || o.coord_op_method_code AS method,
                GROUP_CONCAT(e.extent_code, ',') AS extent_code
            FROM epsg_coordoperation o
            JOIN epsg_coordoperationmethod m ON m.coord_op_method_code = o.coord_op_method_code
            JOIN epsg_coordinatereferencesystem sourcecrs ON sourcecrs.coord_ref_sys_code = o.source_crs_code AND sourcecrs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND sourcecrs.deprecated = 0
            JOIN epsg_coordinatereferencesystem targetcrs ON targetcrs.coord_ref_sys_code = o.target_crs_code AND targetcrs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND targetcrs.deprecated = 0
            JOIN epsg_usage u ON u.object_table_name = 'epsg_coordoperation' AND u.object_code = o.coord_op_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_coordoperationparamvalue p ON p.coord_op_code = o.coord_op_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code AND dep.deprecation_date <= '2020-12-14'
            WHERE o.coord_op_type != 'conversion' AND o.coord_op_type != 'concatenated operation' AND o.coord_op_name NOT LIKE '%example%'
            AND dep.deprecation_id IS NULL
            GROUP BY o.coord_op_code
            HAVING (SUM(CASE WHEN p.param_value_file_ref != '' THEN 1 ELSE 0 END) = 0) -- skip anything that needs some kind of datafile

            UNION

            SELECT
                'urn:ogc:def:coordinateOperation:EPSG::' || o.coord_op_code AS urn,
                o.coord_op_name AS name,
                o.coord_op_type AS type,
                'urn:ogc:def:method:EPSG::' || o.coord_op_method_code AS method,
                GROUP_CONCAT(e.extent_code, ',') AS extent_code
            FROM epsg_coordoperation o
            JOIN epsg_coordinatereferencesystem projcrs ON projcrs.projection_conv_code = o.coord_op_code AND projcrs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND projcrs.deprecated = 0
            JOIN epsg_coordoperationmethod m ON m.coord_op_method_code = o.coord_op_method_code
            JOIN epsg_usage u ON u.object_table_name = 'epsg_coordoperation' AND u.object_code = o.coord_op_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_coordoperationparamvalue p ON p.coord_op_code = o.coord_op_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code AND dep.deprecation_date <= '2020-12-14'
            WHERE o.coord_op_type = 'conversion' AND o.coord_op_name NOT LIKE '%example%'
            AND dep.deprecation_id IS NULL
            GROUP BY o.coord_op_code
            HAVING (SUM(CASE WHEN p.param_value_file_ref != '' THEN 1 ELSE 0 END) = 0) -- skip anything that needs some kind of datafile

            UNION

            SELECT
                'urn:ogc:def:coordinateOperation:EPSG::' || o.coord_op_code AS urn,
                o.coord_op_name AS name,
                o.coord_op_type AS type,
                null AS method,
                GROUP_CONCAT(e.extent_code, ',') AS extent_code
            FROM epsg_coordoperation o
            LEFT JOIN epsg_coordoperationpath p ON p.concat_operation_code = o.coord_op_code
            LEFT JOIN epsg_coordoperation co ON p.single_operation_code = co.coord_op_code
            LEFT JOIN epsg_coordoperationmethod cm ON co.coord_op_method_code = cm.coord_op_method_code
            JOIN epsg_coordinatereferencesystem sourcecrs ON sourcecrs.coord_ref_sys_code = o.source_crs_code AND sourcecrs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND sourcecrs.deprecated = 0
            JOIN epsg_coordinatereferencesystem targetcrs ON targetcrs.coord_ref_sys_code = o.target_crs_code AND targetcrs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND targetcrs.deprecated = 0
            JOIN epsg_usage u ON u.object_table_name = 'epsg_coordoperation' AND u.object_code = o.coord_op_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_coordoperationparamvalue p ON p.coord_op_code = co.coord_op_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code AND dep.deprecation_date <= '2020-12-14'
            WHERE o.coord_op_type = 'concatenated operation' AND o.coord_op_name NOT LIKE '%example%'
            AND dep.deprecation_id IS NULL
            GROUP BY o.coord_op_code
            HAVING (SUM(CASE WHEN p.param_value_file_ref != '' THEN 1 ELSE 0 END) = 0) -- skip anything that needs some kind of datafile

            UNION

            SELECT
                'urn:ogc:def:coordinateOperation:EPSG::' || o.coord_op_code AS urn,
                o.coord_op_name AS name,
                o.coord_op_type AS type,
                'urn:ogc:def:method:EPSG::' || o.coord_op_method_code AS method,
                GROUP_CONCAT(e.extent_code, ',') AS extent_code
            FROM epsg_coordoperation o
            JOIN epsg_coordoperationpath p ON p.single_operation_code = o.coord_op_code
            JOIN epsg_usage u ON u.object_table_name = 'epsg_coordoperation' AND u.object_code = o.coord_op_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_coordoperationparamvalue p ON p.coord_op_code = o.coord_op_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code AND dep.deprecation_date <= '2020-12-14'
            WHERE o.coord_op_name NOT LIKE '%example%'
            AND dep.deprecation_id IS NULL
            GROUP BY o.coord_op_code
            HAVING (SUM(CASE WHEN p.param_value_file_ref != '' THEN 1 ELSE 0 END) = 0) -- skip anything that needs some kind of datafile

            ORDER BY urn
            ";

        $result = $sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            if ($row['type'] === 'concatenated operation') {
                unset($row['method']);
                $row['operations'] = [];
                $operationsSql = "
                    SELECT
                        'urn:ogc:def:coordinateOperation:EPSG::' || p.concat_operation_code AS concat_code,
                        'urn:ogc:def:coordinateOperation:EPSG::' || p.single_operation_code AS single_code,
                        'urn:ogc:def:crs:EPSG::' || o.source_crs_code AS source_crs,
                        'urn:ogc:def:crs:EPSG::' || o.target_crs_code AS target_crs
                    FROM epsg_coordoperationpath p
                    JOIN epsg_coordoperation o ON p.single_operation_code = o.coord_op_code
                    WHERE concat_code = '{$row['urn']}'
                    ORDER BY p.op_path_step
                    ";

                $operationsResult = $sqlite->query($operationsSql);
                while ($operationsRow = $operationsResult->fetchArray(SQLITE3_ASSOC)) {
                    $row['operations'][] = [
                        'operation' => $operationsRow['single_code'],
                        'source_crs' => $operationsRow['source_crs'],
                        'target_crs' => $operationsRow['target_crs'],
                    ];
                }
            }

            $row['extent_code'] = array_unique(explode(',', $row['extent_code']));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
            unset($data[$row['urn']]['type']);
        }

        $this->updateFileData($this->sourceDir . '/CoordinateOperation/CoordinateOperations.php', $data);

        $paramData = [];
        foreach ($data as $operation => $operationData) {
            $params = [];
            $paramsSql = "
                    SELECT
                        'urn:ogc:def:coordinateOperation:EPSG::' || pv.coord_op_code AS operation_code,
                        p.parameter_code AS parameter_code,
                        p.parameter_name AS name,
                        pv.parameter_value AS value,
                        CASE WHEN pv.uom_code IS NULL THEN NULL ELSE 'urn:ogc:def:uom:EPSG::' || pv.uom_code END AS uom,
                        CASE WHEN pu.param_sign_reversal = 'Yes' THEN 1 ELSE 0 END AS reverses
                    FROM epsg_coordoperationparamvalue pv
                    JOIN epsg_coordoperationparamusage pu ON pv.coord_op_method_code = pu.coord_op_method_code AND pv.parameter_code = pu.parameter_code
                    JOIN epsg_coordoperationparam p ON pv.parameter_code = p.parameter_code
                    WHERE operation_code = '{$operation}'
                    GROUP BY pv.coord_op_code, p.parameter_code
                    ORDER BY pu.sort_order
                    ";

            $paramsResult = $sqlite->query($paramsSql);
            while ($paramsRow = $paramsResult->fetchArray(SQLITE3_ASSOC)) {
                unset($paramsRow['operation_code']);
                $paramsRow['reverses'] = (bool) $paramsRow['reverses'];
                if (in_array($paramsRow['parameter_code'], [8659, 8660, 1037, 1048, 8661, 8662], true)) {
                    $paramsRow['value'] = 'urn:ogc:def:crs:EPSG::' . $paramsRow['value'];
                }
                unset($paramsRow['parameter_code']);
                $params[$paramsRow['name']] = $paramsRow;
                unset($params[$paramsRow['name']]['name']);
            }
            $paramData[$operation] = $params;
        }

        $this->updateFileData($this->sourceDir . '/CoordinateOperation/CoordinateOperationParams.php', $paramData);
    }

    public function generateExtents(SQLite3 $sqlite): void
    {
        echo 'Updating extents...';
        $boundingBoxOnly = $this->sourceDir . '/Geometry/Extents/BoundingBoxOnly/';
        $builtInFull = $this->sourceDir . '/Geometry/Extents/';
        $africa = $this->sourceDir . '/../vendor/php-coord/php-coord-datapack-africa/src/Geometry/Extents/';
        $antarctic = $this->sourceDir . '/../vendor/php-coord/php-coord-datapack-antarctic/src/Geometry/Extents/';
        $arctic = $this->sourceDir . '/../vendor/php-coord/php-coord-datapack-arctic/src/Geometry/Extents/';
        $asia = $this->sourceDir . '/../vendor/php-coord/php-coord-datapack-asia/src/Geometry/Extents/';
        $europe = $this->sourceDir . '/../vendor/php-coord/php-coord-datapack-europe/src/Geometry/Extents/';
        $northAmerica = $this->sourceDir . '/../vendor/php-coord/php-coord-datapack-northamerica/src/Geometry/Extents/';
        $southAmerica = $this->sourceDir . '/../vendor/php-coord/php-coord-datapack-southamerica/src/Geometry/Extents/';
        $oceania = $this->sourceDir . '/../vendor/php-coord/php-coord-datapack-oceania/src/Geometry/Extents/';

        array_map('unlink', glob($boundingBoxOnly . '*.php'));
        array_map('unlink', glob($builtInFull . '*.php'));
        array_map('unlink', glob($africa . '*.php'));
        array_map('unlink', glob($antarctic . '*.php'));
        array_map('unlink', glob($arctic . '*.php'));
        array_map('unlink', glob($asia . '*.php'));
        array_map('unlink', glob($europe . '*.php'));
        array_map('unlink', glob($northAmerica . '*.php'));
        array_map('unlink', glob($southAmerica . '*.php'));
        array_map('unlink', glob($oceania . '*.php'));

        $sql = "
            SELECT e.extent_code
            FROM epsg_coordinatereferencesystem crs
            JOIN epsg_usage u ON u.object_code = crs.coord_ref_sys_code AND u.object_table_name = 'epsg_coordinatereferencesystem'
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2020-12-14'
            WHERE dep.deprecation_id IS NULL

            UNION

            SELECT e.extent_code FROM epsg_coordoperation o
            JOIN epsg_usage u ON u.object_code = o.coord_op_code AND u.object_table_name = 'epsg_coordoperation'
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code AND dep.deprecation_date <= '2020-12-14'
            WHERE dep.deprecation_id IS NULL

            GROUP BY e.extent_code
        ";

        $result = $sqlite->query($sql);
        $extents = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $extents[] = $row['extent_code'];
        }

        $shapeFile = new ShapefileReader(
            $this->resourceDir . '/epsg/EPSG_Polygons.shp',
            [
                Shapefile::OPTION_FORCE_MULTIPART_GEOMETRIES => true,
            ]
        );
        $shapeFile->setCharset('ISO-8859-1');

        // Read all the records
        while ($geometry = $shapeFile->fetchRecord()) {
            assert($geometry instanceof MultiPolygon);

            $extentCode = (int) $geometry->getData('AREA_CODE');
            $region = $geometry->getData('REGION');
            $name = $geometry->getData('AREA_NAME');
            if (!in_array($extentCode, $extents, true)) {
                continue;
            }

            $exportSimple = "<?php\ndeclare(strict_types=1);\n\nnamespace PHPCoord\Geometry\Extents\BoundingBoxOnly;\n/**\n * {$region}/{$name}.\n * @internal\n */\nclass Extent{$extentCode}\n{\n    public function __invoke(): array\n    {\n        return\n        [\n";
            $exportFull = "<?php\ndeclare(strict_types=1);\n\nnamespace PHPCoord\Geometry\Extents;\n/**\n * {$region}/{$name}.\n * @internal\n */\nclass Extent{$extentCode}\n{\n    public function __invoke(): array\n    {\n        return\n        [\n";

            foreach ($geometry->getPolygons() as $shapeFilePolygon) {
                $boundingBox = $shapeFilePolygon->getBoundingBox();
                $exportSimple .= "            [\n                [\n                    ";
                $exportSimple .= "[{$boundingBox['xmax']}, {$boundingBox['ymax']}], [{$boundingBox['xmin']}, {$boundingBox['ymax']}], [{$boundingBox['xmin']}, {$boundingBox['ymin']}], [{$boundingBox['xmax']}, {$boundingBox['ymin']}], [{$boundingBox['xmax']}, {$boundingBox['ymax']}],";
                $exportSimple .= "\n                ],\n            ],\n";

                $exportFull .= "            [\n";
                foreach ($shapeFilePolygon->getRings() as $shapeFileRing) {
                    $exportFull .= "                [\n                    ";
                    foreach ($shapeFileRing->getPoints() as $shapeFilePoint) {
                        $exportFull .= '[' . $shapeFilePoint->getX() . ', ' . $shapeFilePoint->getY() . '], ';
                    }
                    $exportFull .= "\n                ],\n";
                }
                $exportFull .= "            ],\n";
            }
            $exportSimple .= "        ];\n    }\n}\n";
            $exportFull .= "        ];\n    }\n}\n";

            switch ($region) {
                case 'Global':
                    file_put_contents($builtInFull . "Extent{$extentCode}.php", $exportFull);
                    $this->csFixFile($builtInFull . "Extent{$extentCode}.php");
                    break;
                case 'Africa':
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($africa . "Extent{$extentCode}.php", $exportFull);
                    $this->csFixFile($africa . "Extent{$extentCode}.php");
                    break;
                case 'Antarctic':
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($antarctic . "Extent{$extentCode}.php", $exportFull);
                    $this->csFixFile($antarctic . "Extent{$extentCode}.php");
                    break;
                case 'Arctic':
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($arctic . "Extent{$extentCode}.php", $exportFull);
                    $this->csFixFile($arctic . "Extent{$extentCode}.php");
                    break;
                case 'Asia-ExFSU':
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($asia . "Extent{$extentCode}.php", $exportFull);
                    $this->csFixFile($asia . "Extent{$extentCode}.php");
                    break;
                case 'Australasia and Oceania':
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($oceania . "Extent{$extentCode}.php", $exportFull);
                    $this->csFixFile($oceania . "Extent{$extentCode}.php");
                    break;
                case 'Europe-FSU':
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($europe . "Extent{$extentCode}.php", $exportFull);
                    $this->csFixFile($europe . "Extent{$extentCode}.php");
                    break;
                case 'North America':
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($northAmerica . "Extent{$extentCode}.php", $exportFull);
                    $this->csFixFile($northAmerica . "Extent{$extentCode}.php");
                    break;
                case 'South America':
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($southAmerica . "Extent{$extentCode}.php", $exportFull);
                    $this->csFixFile($southAmerica . "Extent{$extentCode}.php");
                    break;
                default:
                    throw new Exception("Unknown region: {$region}");
            }
        }
        unset($shapefile);

        echo 'done' . PHP_EOL;
    }

    private function updateFileConstants(string $fileName, array $data, string $visibility, array $aliases): void
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
        $traverser->addVisitor(new AddNewConstantsVisitor($data, $visibility, $aliases));
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
        if ($data) {
            $traverser = new NodeTraverser();
            $traverser->addVisitor(new AddNewDataVisitor($data));
            $traverser->addVisitor(new PrettyPrintDataVisitor());
            $newStmts = $traverser->traverse($newStmts);
        }

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

    private function updateDocs(string $class, array $data): void
    {
        echo "Updating docs for {$class}...";

        $file = fopen($this->sourceDir . '/../docs/reflection/' . str_replace('phpcoord/', '', str_replace('\\', '/', strtolower($class))) . '.txt', 'wb');
        $reflectionClass = new ReflectionClass($class);
        $constants = array_flip(array_reverse($reflectionClass->getConstants())); // make sure aliases are overridden with current

        foreach ($data as $urn => $row) {
            if ($urn === Angle::EPSG_DEGREE_SUPPLIER_TO_DEFINE_REPRESENTATION) {
                continue;
            }

            $name = ucfirst(trim($row['name']));
            $name = str_replace('_LOWERCASE', '', $name);
            fwrite($file, $name . "\n");
            fwrite($file, str_repeat('-', strlen($name)) . "\n\n");

            if (isset($row['type']) && $row['type']) {
                fwrite($file, '| Type: ' . ucfirst($row['type']) . "\n");
            }
            if (isset($row['extent']) && $row['extent']) {
                fwrite($file, "| Used: {$row['extent']}" . "\n");
            }

            fwrite($file, "\n.. code-block:: php\n\n");
            $invokeClass = $reflectionClass;
            do {
                if ($invokeClass->hasMethod('fromSRID')) {
                    fwrite($file, "    {$invokeClass->getShortName()}::fromSRID({$reflectionClass->getShortName()}::{$constants[$urn]})" . "\n");
                    fwrite($file, "    {$invokeClass->getShortName()}::fromSRID('{$urn}')" . "\n");
                } elseif ($invokeClass->hasMethod('makeUnit')) {
                    fwrite($file, "    {$invokeClass->getShortName()}::makeUnit(\$measurement, {$reflectionClass->getShortName()}::{$constants[$urn]})" . "\n");
                    fwrite($file, "    {$invokeClass->getShortName()}::makeUnit(\$measurement, '{$urn}')" . "\n");
                }
            } while ($invokeClass = $invokeClass->getParentClass());
            fwrite($file, "\n");

            if (trim($row['doc_help'])) {
                $help = str_replace("\n", "\n\n", trim($row['doc_help']));
                $help = str_replace('Convert to degrees using algorithm.', '', $help);
                $help = str_replace('Convert to deg using algorithm.', '', $help);
                fwrite($file, "{$help}" . "\n");
            }
            fwrite($file, "\n");
        }

        fclose($file);
        echo 'done' . PHP_EOL;
    }
}
