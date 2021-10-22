<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

use function array_column;
use function array_unique;
use function array_values;
use function class_exists;
use function dirname;
use Exception;
use function explode;
use function file_get_contents;
use function file_put_contents;
use function implode;
use function in_array;
use function json_decode;
use const JSON_THROW_ON_ERROR;
use function lcfirst;
use function max;
use function min;
use const PHP_EOL;
use PHPCoord\CoordinateOperation\CoordinateOperationMethods;
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
use function preg_match;
use function sleep;
use SQLite3;
use const SQLITE3_ASSOC;
use const SQLITE3_OPEN_READONLY;
use function str_replace;
use function ucwords;

class EPSGCodegenFromDataImport
{
    private string $sourceDir;

    private SQLite3 $sqlite;

    private Codegen $codeGen;

    public const BLACKLISTED_METHODS = [
        // not implemented yet
        1072, // Geographic3D to GravityRelatedHeight (OSGM15Ire)
        1096, // Geog3D to Geog2D+GravityRelatedHeight (OSGM15Ire)
        1025, // Geographic3D to GravityRelatedHeight (EGM2008)
        1030, // Geographic3D to GravityRelatedHeight (NZgeoid)
        1047, // Geographic3D to GravityRelatedHeight (Gravsoft)
        1048, // Geographic3D to GravityRelatedHeight (AUSGeoid v2)
        1050, // Geographic3D to GravityRelatedHeight (CI)
        1059, // Geographic3D to GravityRelatedHeight (PNG)
        1060, // Geographic3D to GravityRelatedHeight (CGG2013)
        1070, // Point motion by grid (Canada NTv2_Vel)
        1071, // Vertical Offset by Grid Interpolation (NZLVD)
        1073, // Geographic3D to GravityRelatedHeight (IGN2009)
        1079, // New Zealand Deformation Model
        1080, // Vertical Offset by Grid Interpolation (BEV AT)
        1081, // Geographic3D to GravityRelatedHeight (BEV AT)
        1082, // Geographic3D to GravityRelatedHeight (SA 2010)
        1083, // Geog3D to Geog2D+GravityRelatedHeight (AUSGeoidv2)
        1084, // Vertical Offset by Grid Interpolation (gtx)
        1085, // Vertical Offset by Grid Interpolation (asc)
        1086, // Point motion (geocen) by grid (INADEFORM)
        1087, // Geocentric translation by Grid Interpolation (IGN)
        1088, // Geog3D to Geog2D+GravityRelatedHeight (gtx)
        1089, // Geog3D to Geog2D+GravityRelatedHeight (BEV AT)
        1090, // Geog3D to Geog2D+GravityRelatedHeight (CGG 2013)
        1091, // Geog3D to Geog2D+GravityRelatedHeight (CI)
        1092, // Geog3D to Geog2D+GravityRelatedHeight (EGM2008)
        1093, // Geog3D to Geog2D+GravityRelatedHeight (Gravsoft)
        1094, // Geog3D to Geog2D+GravityRelatedHeight (IGN1997)
        1095, // Geog3D to Geog2D+GravityRelatedHeight (IGN2009)
        1098, // Geog3D to Geog2D+GravityRelatedHeight (SA 2010)
        1099, // Geographic3D to GravityRelatedHeight (PL txt)
        1100, // Geog3D to Geog2D+GravityRelatedHeight (PL txt)
        1101, // Vertical Offset by Grid Interpolation (PL txt)
        1103, // Geog3D to Geog2D+GravityRelatedHeight (EGM)
        1105, // Geog3D to Geog2D+GravityRelatedHeight (ITAL2005)
        1106, // Geographic3D to GravityRelatedHeight (ITAL2005)
        9620, // Norway Offshore Interpolation
        9634, // Maritime Provinces polynomial interpolation
        9658, // Vertical Offset by Grid Interpolation (VERTCON)
        9661, // Geographic3D to GravityRelatedHeight (EGM)
        9662, // Geographic3D to GravityRelatedHeight (AUSGeoid98)
        9664, // Geographic3D to GravityRelatedHeight (IGN1997)
        9665, // Geographic3D to GravityRelatedHeight (gtx)

        // only distributed as .dll, can't use
        1036, // Cartesian Grid Offsets from Form Function
        1040, // GNTRANS

        //replaced with OSGM15
        1045, // Geographic3D to GravityRelatedHeight (OSGM02-Ire)

        // replaced by NTv2
        9614, // NTv1,

        // replaced by NADCON5
        9613, // NADCON,

        // replaced by AUSGeoidv2
        9662, // Geographic3D to GravityRelatedHeight (AUSGeoid98)
    ];

    public const BLACKLISTED_OPERATIONS = [
        // replaced by OSTN15
        7913, // OSTN97
        7952, // OSTN02
        5338, // OSTN02 (NTv2)
        5339, // OSTN02 (NTv2)
        7709, // OSTN15 (NTv2)
        7710, // OSTN15 (NTv2)

        // replaced by OSGM15
        1039, // OSGM02
        1040, // OSGM02
        7952, // OSGM02
        10021, // OSGM02
        10022, // OSGM02
        10023, // OSGM02
        10024, // OSGM02
        10025, // OSGM02
        10026, // OSGM02
        10027, // OSGM02
        10028, // OSGM02
        10029, // OSGM02
        10030, // OSGM02
        10031, // OSGM02
        10032, // OSGM02
        10033, // OSGM02
        10034, // OSGM02
        15956, // OSGM02

        // replaced by RDNAPTRANS2018
        7000, // NTv2 rdtrans2008.gsb

        // replaced by PENR2009.gsb
        15932, // NTv2 SPED2ETV2.gsb
        15933, // NTv2 SPED2ETV2.gsb

        // replaced by all-Australia combination files
        1234, // NTv2 vic_0799.gsb
        1464, // NTv2 vic_0799.gsb
        1506, // NTv2 tas_1098.gsb
        1507, // NTv2 nt_0599.gsb
        1593, // NTv2 wa_0700.gsb
        1596, // NTv2 SEAust_21_06_00.gsb

        // replaced by GEOID18
        6326, // gtx g2012bu0.bin
        7646, // gtx g2012bp0.bin
        7647, // gtx g2012bp0.bin
        9173, // gtx geoid09_conus.bin
        9168, // gtx geoid03_conus.bin
        9175, // gtx g2009p01.bin
        9176, // gtx g2009p01.bin
        9160, // gtx g1999u01.bin
        9161, // gtx g1999u02.bin
        9162, // gtx g1999u03.bin
        9163, // gtx g1999u04.bin
        9164, // gtx g1999u05.bin
        9165, // gtx g1999u06.bin
        9166, // gtx g1999u07.bin
        9167, // gtx g1999u08.bin

        // replaced by GEOID12B
        9170, // gtx g2009s01.bin
        9171, // gtx g2009g01.bin
        9172, // gtx g2009g01.bin
        9174, // gtx geoid09_ak.bin
        9169, // gtx geoid06_ak.bin

        // approximation/emulation of official transforms
        1295, // NTv2 RGNC1991_NEA74Noumea.gsb
        6946, // NTv2 tm75_etrs89.gsb
        6947, // NTv2 tm75_etrs89.gsb
        15958, // NTv2 rgf93_ntf.gsb
        15959, // NTv2 rgf93_ntf.gsb
        15960, // NTv2 rgf93_ntf.gsb
        15962, // NTv2 RGNC1991_IGN72GrandeTerre.gsb

        // ASCII, also available as official gtx with smaller file size
        4459, // NZ nzgeoid09.sid
        7840, // NZ New_Zealand_Quasigeoid_2016.csv
        7860, // NZ auckland-1946-to-nzvd2016-conversion.csv
        7861, // NZ bluff-1955-to-nzvd2016-conversion.csv
        7862, // NZ dunedin-1958-to-nzvd2016-conversion.csv
        7863, // NZ dunedin-bluff-1960-to-nzvd2016-conversion.csv
        7864, // NZ gisborne-1926-to-nzvd2016-conversion.csv
        7865, // NZ lyttelton-1937-to-nzvd2016-conversion.csv
        7866, // NZ moturiki-1953-to-nzvd2016-conversion.csv
        7867, // NZ napier-1962-to-nzvd2016-conversion.csv
        7868, // NZ nelson-1955-to-nzvd2016-conversion.csv
        7869, // NZ onetreepoint-1964-to-nzvd2016-conversion.csv
        7870, // NZ stewartisland-1977-to-nzvd2016-conversion.csv
        7871, // NZ taranaki-1970-to-nzvd2016-conversion.csv
        7872, // NZ wellington-1953-to-nzvd2016-conversion.csv

        // Just the result of doing Helmert transform
        8444, // NTv2 GDA94_GDA2020_conformal_christmas_island.gsb
        8445, // NTv2 GDA94_GDA2020_conformal_cocos_island.gsb
        8446, // NTv2 GDA94_GDA2020_conformal.gsb

        // It's just for 1 German state and is almost 400Mb!!
        9338, // NTv2 BWTA2017.gsb

        // Not available for public download, mostly construction/engineering projects not of general use
        9302, // NTv2 HS2TN15_NTv2.gsb
        9365, // NTv2 TN15-ETRS89-to-TPEN11-IRF.gsb
        9369, // NTv2 TN15-ETRS89-to-MML07-IRF.gsb
        9386, // NTv2 TN15-ETRS89-to-AbInvA96_2020-IRF.gsb
        9454, // NTv2 TN15-ETRS89-to-GBK19-IRF.gsb
        9740, // NTv2 TN15-ETRS89-to-EOS21-IRF.gsb
        9759, // NTv2 TN15-ETRS89-to-ECML14_NB-IRF.gsb
        9764, // NTv2 TN15-ETRS89-to-EWR2-IRF.gsb
        9363, // IGNF ARAMCO_AAA-KSAGRF_6.tac
        9305, // GTX INAGEOID20.gtx
        9629, // GTX INAGEOID20.gtx

        // free, but license does not permit redistribution
        9112, // NTv2 BC_27_98.GSB
        9114, // NTv2 NVI27_05.GSB
        9116, // NTv2 BC_93_98.GSB
        9120, // NTv2 CRD98_00.GSB
        9121, // NTv2 NVI98_05.GSB
        9122, // NTv2 BC_98_05.GSB
        9496, // NTv2 MGI1901_TO_SRBETRS89_NTv2.gsb
        9328, // IGNF gr3dnc03a.mnt
        9329, // IGNF gr3dnc01b.mnt
        9330, // IGNF gr3dnc02b.mnt

        // license requires money :((
        9732, // NTv2 35160622_47161840_R40_E50.gsb
        9733, // NTv2 35160622_47161840_R40_F89.gsb
        9734, // NTv2 35160622_47161840_R40_F00.gsb
        9735, // NTv2 35160622_47161840_E50_F89.gsb
        9736, // NTv2 35160622_47161840_E50_F00.gsb
        9737, // NTv2 35160622_47161840_F89_F00.gsb
    ];

    public function __construct()
    {
        $this->sourceDir = dirname(__DIR__, 2);
        $this->codeGen = new Codegen();

        $this->sqlite = new SQLite3(
            __DIR__ . '/../../../resources/epsg/epsg.sqlite',
            SQLITE3_OPEN_READONLY
        );
        $this->sqlite->enableExceptions(true);
    }

    public function generateDataUnitsOfMeasure(): void
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

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/UnitOfMeasure/Angle/Angle.php', $data);
        $this->codeGen->updateFileConstants(
            $this->sourceDir . '/UnitOfMeasure/Angle/Angle.php',
            $data,
            'public',
            [
                Angle::EPSG_DEGREE => ['Degree (supplier to define representation)'],
            ]
        );
        $this->codeGen->updateDocs(Angle::class, $data);

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

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/UnitOfMeasure/Length/Length.php', $data);
        $this->codeGen->updateFileConstants($this->sourceDir . '/UnitOfMeasure/Length/Length.php', $data, 'public', []);
        $this->codeGen->updateDocs(Length::class, $data);

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

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/UnitOfMeasure/Scale/Scale.php', $data);
        $this->codeGen->updateFileConstants($this->sourceDir . '/UnitOfMeasure/Scale/Scale.php', $data, 'public', []);
        $this->codeGen->updateDocs(Scale::class, $data);

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

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/UnitOfMeasure/Time/Time.php', $data);
        $this->codeGen->updateFileConstants($this->sourceDir . '/UnitOfMeasure/Time/Time.php', $data, 'public', []);
        $this->codeGen->updateDocs(Time::class, $data);

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

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/UnitOfMeasure/Rate.php', $data);
        $this->codeGen->updateFileConstants($this->sourceDir . '/UnitOfMeasure/Rate.php', $data, 'public', []);
        $this->codeGen->updateDocs(Rate::class, $data);

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

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/UnitOfMeasure/UnitOfMeasure.php', $data);
        $this->codeGen->updateFileConstants($this->sourceDir . '/UnitOfMeasure/UnitOfMeasure.php', $data, 'public', []);
    }

    public function generateDataPrimeMeridians(): void
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

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/Datum/PrimeMeridian.php', $data);
        $this->codeGen->updateFileConstants($this->sourceDir . '/Datum/PrimeMeridian.php', $data, 'public', []);
        $this->codeGen->updateDocs(PrimeMeridian::class, $data);
    }

    public function generateDataEllipsoids(): void
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

        $result = $this->sqlite->query($sql);
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

        $this->codeGen->updateFileData($this->sourceDir . '/Datum/Ellipsoid.php', $data);
        $this->codeGen->updateFileConstants($this->sourceDir . '/Datum/Ellipsoid.php', $data, 'public', []);
        $this->codeGen->updateDocs(Ellipsoid::class, $data);
    }

    public function generateDataDatums(): void
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

        $result = $this->sqlite->query($sql);
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

                $ensembleResult = $this->sqlite->query($ensembleSql);
                while ($ensembleRow = $ensembleResult->fetchArray(SQLITE3_ASSOC)) {
                    $row['ensemble'][] = $ensembleRow['datum'];
                }
            }
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/Datum/Datum.php', $data);
        $this->codeGen->updateFileConstants(
            $this->sourceDir . '/Datum/Datum.php',
            $data,
            'public',
            [
                Datum::EPSG_ORDNANCE_SURVEY_OF_GREAT_BRITAIN_1936 => ['OSGB 1936'],
                Datum::EPSG_GENOA_1942 => ['Genoa'],
                Datum::EPSG_SWISS_TERRESTRIAL_REFERENCE_SYSTEM_1995 => ['Swiss Terrestrial Reference Frame 1995'],
                Datum::EPSG_RESEAU_GEODESIQUE_FRANCAIS_1993_V1 => ['Reseau Geodesique Francais 1993'],
            ]
        );
        $this->codeGen->updateDocs(Datum::class, $data);
    }

    public function generateDataCoordinateSystems(): void
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

        $result = $this->sqlite->query($sql);
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

            $axisResult = $this->sqlite->query($axisSql);
            while ($axisRow = $axisResult->fetchArray(SQLITE3_ASSOC)) {
                unset($axisRow['coord_sys']);
                $row['axes'][] = $axisRow;
            }
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateSystem/Cartesian.php', $data);
        $this->codeGen->updateFileConstants($this->sourceDir . '/CoordinateSystem/Cartesian.php', $data, 'public', []);
        $this->codeGen->updateDocs(Cartesian::class, $data);

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

        $result = $this->sqlite->query($sql);
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

            $axisResult = $this->sqlite->query($axisSql);
            while ($axisRow = $axisResult->fetchArray(SQLITE3_ASSOC)) {
                unset($axisRow['coord_sys']);
                $row['axes'][] = $axisRow;
            }
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateSystem/Ellipsoidal.php', $data);
        $this->codeGen->updateFileConstants($this->sourceDir . '/CoordinateSystem/Ellipsoidal.php', $data, 'public', []);
        $this->codeGen->updateDocs(Ellipsoidal::class, $data);

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

        $result = $this->sqlite->query($sql);
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

            $axisResult = $this->sqlite->query($axisSql);
            while ($axisRow = $axisResult->fetchArray(SQLITE3_ASSOC)) {
                unset($axisRow['coord_sys']);
                $row['axes'][] = $axisRow;
            }
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateSystem/Vertical.php', $data);
        $this->codeGen->updateFileConstants($this->sourceDir . '/CoordinateSystem/Vertical.php', $data, 'public', []);
        $this->codeGen->updateDocs(VerticalCS::class, $data);

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

        $result = $this->sqlite->query($sql);
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

            $axisResult = $this->sqlite->query($axisSql);
            while ($axisRow = $axisResult->fetchArray(SQLITE3_ASSOC)) {
                unset($axisRow['coord_sys']);
                $row['axes'][] = $axisRow;
            }
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateSystem/CoordinateSystem.php', $data);
        $this->codeGen->updateFileConstants($this->sourceDir . '/CoordinateSystem/CoordinateSystem.php', $data, 'public', []);
    }

    public function generateDataCoordinateReferenceSystems(): void
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

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['extent_code'] = array_values(array_unique(explode(',', $row['extent_code'])));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/CompoundSRIDData.php', $data);
        $this->codeGen->updateFileConstants(
            $this->sourceDir . '/CoordinateReferenceSystem/Compound.php',
            $data,
            'public',
            [
                Compound::EPSG_OSGB36_BRITISH_NATIONAL_GRID_PLUS_ODN_HEIGHT => ['OSGB 1936 / British National Grid + ODN height'],
                Compound::EPSG_BD72_BELGIAN_LAMBERT_72_PLUS_OSTEND_HEIGHT => ['Belge 1972 / Belgian Lambert 72 + Ostend height'],
                Compound::EPSG_RGF93_V1_LAMBERT_93_PLUS_NGF_IGN69_HEIGHT => ['RGF93 / Lambert-93 + NGF-IGN69 height'],
                Compound::EPSG_RGF93_V1_LAMBERT_93_PLUS_NGF_IGN78_HEIGHT => ['RGF93 / Lambert-93 + NGF-IGN78 height'],
                Compound::EPSG_RGF93_V2_PLUS_NGF_IGN69_HEIGHT => ['RGF93 + NGF-IGN69 height'],
                Compound::EPSG_RGF93_V2_PLUS_NGF_IGN78_HEIGHT => ['RGF93 + NGF-IGN78 height'],
            ]
        );
        $this->codeGen->updateDocs(Compound::class, $data);

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

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['extent_code'] = array_values(array_unique(explode(',', $row['extent_code'])));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/GeocentricSRIDData.php', $data);
        $this->codeGen->updateFileConstants(
            $this->sourceDir . '/CoordinateReferenceSystem/Geocentric.php',
            $data,
            'public',
            [
                Geocentric::EPSG_CHTRS95 => ['CHTRF95'],
                Geocentric::EPSG_RGF93_V1 => ['RGF93'],
            ]
        );
        $this->codeGen->updateDocs(Geocentric::class, $data);

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

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['extent_code'] = array_values(array_unique(explode(',', $row['extent_code'])));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/Geographic2DSRIDData.php', $data);
        $this->codeGen->updateFileConstants(
            $this->sourceDir . '/CoordinateReferenceSystem/Geographic2D.php',
            $data,
            'public',
            [
                Geographic2D::EPSG_OSGB36 => ['OSGB 1936'],
                Geographic2D::EPSG_BD50 => ['Belge 1950'],
                Geographic2D::EPSG_BD50_BRUSSELS => ['Belge 1950 (Brussels)'],
                Geographic2D::EPSG_BD72 => ['Belge 1972'],
                Geographic2D::EPSG_CHTRS95 => ['CHTRF95'],
                Geographic2D::EPSG_RGF93_V1 => ['RGF93'],
                Geographic2D::EPSG_RGF93_V1_LON_LAT => ['RGF93 (lon-lat)'],
            ]
        );
        $this->codeGen->updateDocs(Geographic2D::class, $data);

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

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['extent_code'] = array_values(array_unique(explode(',', $row['extent_code'])));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/Geographic3DSRIDData.php', $data);
        $this->codeGen->updateFileConstants(
            $this->sourceDir . '/CoordinateReferenceSystem/Geographic3D.php',
            $data,
            'public',
            [
                Geographic3D::EPSG_CHTRS95 => ['CHTRF95'],
                Geographic3D::EPSG_RGF93_V1 => ['RGF93'],
                Geographic3D::EPSG_RGF93_V1_LON_LAT => ['RGF93 (lon-lat)'],
            ]
        );
        $this->codeGen->updateDocs(Geographic3D::class, $data);

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

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['extent_code'] = array_values(array_unique(explode(',', $row['extent_code'])));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/ProjectedSRIDData.php', $data);
        $this->codeGen->updateFileConstants(
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
                Projected::EPSG_BD50_BRUSSELS_BELGE_LAMBERT_50 => ['Belge 1950 (Brussels) / Belge Lambert 50'],
                Projected::EPSG_BD72_BELGE_LAMBERT_72 => ['Belge 1972 / Belge Lambert 72'],
                Projected::EPSG_BD72_BELGIAN_LAMBERT_72 => ['Belge 1972 / Belgian Lambert 72'],
                Projected::EPSG_RGF93_V1_CC42 => ['RGF93 / CC42'],
                Projected::EPSG_RGF93_V1_CC43 => ['RGF93 / CC43'],
                Projected::EPSG_RGF93_V1_CC44 => ['RGF93 / CC44'],
                Projected::EPSG_RGF93_V1_CC45 => ['RGF93 / CC45'],
                Projected::EPSG_RGF93_V1_CC46 => ['RGF93 / CC46'],
                Projected::EPSG_RGF93_V1_CC47 => ['RGF93 / CC47'],
                Projected::EPSG_RGF93_V1_CC48 => ['RGF93 / CC48'],
                Projected::EPSG_RGF93_V1_CC49 => ['RGF93 / CC49'],
                Projected::EPSG_RGF93_V1_CC50 => ['RGF93 / CC50'],
                Projected::EPSG_RGF93_V1_LAMBERT_93 => ['RGF93 / Lambert-93'],
            ]
        );
        $this->codeGen->updateDocs(Projected::class, $data);

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

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['extent_code'] = array_values(array_unique(explode(',', $row['extent_code'])));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/VerticalSRIDData.php', $data);
        $this->codeGen->updateFileConstants(
            $this->sourceDir . '/CoordinateReferenceSystem/Vertical.php',
            $data,
            'public',
            [
                Vertical::EPSG_GENOA_1942_HEIGHT => ['Genoa Height'],
            ]
        );
        $this->codeGen->updateDocs(Vertical::class, $data);

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

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/CoordinateReferenceSystem.php', $data);
        $this->codeGen->updateFileConstants(
            $this->sourceDir . '/CoordinateReferenceSystem/CoordinateReferenceSystem.php',
            $data,
            'public',
            []
        );
    }

    public function generateDataCoordinateOperationMethods(): void
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
            AND m.coord_op_method_code NOT IN (" . implode(',', self::BLACKLISTED_METHODS) . ')
            GROUP BY m.coord_op_method_code
            ORDER BY name
        ';

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileConstants(
            $this->sourceDir . '/CoordinateOperation/CoordinateOperationMethods.php',
            $data,
            'public',
            []
        );
    }

    public function generateDataCoordinateOperations(): void
    {
        $filenameToProviderMap = require 'FilenameToProviderMap.php';

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
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code
            WHERE o.coord_op_type != 'conversion' AND o.coord_op_type != 'concatenated operation' AND o.coord_op_name NOT LIKE '%example%' AND o.coord_op_name NOT LIKE '%mining%'
            AND dep.deprecation_id IS NULL AND o.deprecated = 0
            GROUP BY source_crs, target_crs, o.coord_op_code
            HAVING (SUM(CASE WHEN m.coord_op_method_code IN (" . implode(',', self::BLACKLISTED_METHODS) . ') THEN 1 ELSE 0 END) = 0)
               AND (SUM(CASE WHEN o.coord_op_code IN (' . implode(',', self::BLACKLISTED_OPERATIONS) . ") THEN 1 ELSE 0 END) = 0)

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
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code
            WHERE o.coord_op_type = 'conversion' AND o.coord_op_type != 'concatenated operation' AND o.coord_op_name NOT LIKE '%example%' AND o.coord_op_name NOT LIKE '%mining%'
            AND dep.deprecation_id IS NULL AND o.deprecated = 0
            GROUP BY source_crs, target_crs, o.coord_op_code
            HAVING (SUM(CASE WHEN m.coord_op_method_code IN (" . implode(',', self::BLACKLISTED_METHODS) . ') THEN 1 ELSE 0 END) = 0)
            AND (SUM(CASE WHEN o.coord_op_code IN (' . implode(',', self::BLACKLISTED_OPERATIONS) . ') THEN 1 ELSE 0 END) = 0)

            ORDER BY source_crs, target_crs, operation
            ';

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['reversible'] = (bool) $row['reversible'];
            $data[] = $row;
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateOperation/CRSTransformations.php', $data);

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
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code AND dep.deprecation_date <= '2020-12-14'
            WHERE o.coord_op_type != 'conversion' AND o.coord_op_type != 'concatenated operation' AND o.coord_op_name NOT LIKE '%example%'
            AND dep.deprecation_id IS NULL AND o.deprecated = 0
            GROUP BY o.coord_op_code
            HAVING (SUM(CASE WHEN m.coord_op_method_code IN (" . implode(',', self::BLACKLISTED_METHODS) . ') THEN 1 ELSE 0 END) = 0)
            AND (SUM(CASE WHEN o.coord_op_code IN (' . implode(',', self::BLACKLISTED_OPERATIONS) . ") THEN 1 ELSE 0 END) = 0)

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
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code AND dep.deprecation_date <= '2020-12-14'
            WHERE o.coord_op_type = 'conversion' AND o.coord_op_type != 'concatenated operation' AND o.coord_op_name NOT LIKE '%example%'
            AND dep.deprecation_id IS NULL AND o.deprecated = 0
            GROUP BY o.coord_op_code
            HAVING (SUM(CASE WHEN m.coord_op_method_code IN (" . implode(',', self::BLACKLISTED_METHODS) . ') THEN 1 ELSE 0 END) = 0)
            AND (SUM(CASE WHEN o.coord_op_code IN (' . implode(',', self::BLACKLISTED_OPERATIONS) . ') THEN 1 ELSE 0 END) = 0)

            ORDER BY urn
            ';

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['extent_code'] = array_values(array_unique(explode(',', $row['extent_code'])));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
            unset($data[$row['urn']]['type']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateOperation/CoordinateOperations.php', $data);

        $paramData = [];
        foreach ($data as $operation => $operationData) {
            $params = [];
            $paramsSql = "
                    SELECT
                        'urn:ogc:def:coordinateOperation:EPSG::' || pv.coord_op_code AS operation_code,
                        p.parameter_code AS parameter_code,
                        p.parameter_name AS name,
                        COALESCE(pv.param_value_file_ref, pv.parameter_value) AS value,
                        CASE WHEN pv.uom_code IS NULL THEN NULL ELSE 'urn:ogc:def:uom:EPSG::' || pv.uom_code END AS uom,
                        CASE WHEN pu.param_sign_reversal = 'Yes' THEN 1 ELSE 0 END AS reverses
                    FROM epsg_coordoperationparamvalue pv
                    JOIN epsg_coordoperationparamusage pu ON pv.coord_op_method_code = pu.coord_op_method_code AND pv.parameter_code = pu.parameter_code
                    JOIN epsg_coordoperationparam p ON pv.parameter_code = p.parameter_code
                    WHERE operation_code = '{$operation}'
                    GROUP BY pv.coord_op_code, p.parameter_code
                    ORDER BY pu.sort_order
                    ";

            $paramsResult = $this->sqlite->query($paramsSql);
            while ($paramsRow = $paramsResult->fetchArray(SQLITE3_ASSOC)) {
                unset($paramsRow['operation_code']);
                $paramsRow['name'] = self::camelCase($paramsRow['name']);
                $paramsRow['reverses'] = (bool) $paramsRow['reverses'];
                if (in_array($paramsRow['parameter_code'], [8659, 8660, 1037, 1048, 8661, 8662], true)) {
                    $paramsRow['value'] = 'urn:ogc:def:crs:EPSG::' . $paramsRow['value'];
                }
                if (
                    isset($filenameToProviderMap[$paramsRow['value']]) &&
                    in_array(
                        $paramsRow['name'],
                        [
                            'eastingAndNorthingDifferenceFile',
                            'geoidHeightCorrectionModelFile',
                            'latitudeDifferenceFile',
                            'longitudeDifferenceFile',
                            'ellipsoidalHeightDifferenceFile',
                            'latitudeAndLongitudeDifferenceFile',
                            'geocentricTranslationFile',
                            'verticalOffsetFile',
                        ],
                        true
                    )
                ) {
                    $paramsRow['fileProvider'] = $filenameToProviderMap[$paramsRow['value']];
                    unset($paramsRow['value'], $paramsRow['uom']);
                }
                unset($paramsRow['parameter_code']);
                $params[$paramsRow['name']] = $paramsRow;
                unset($params[$paramsRow['name']]['name']);
            }
            if (isset($operationData['method']) && $operationData['method'] === CoordinateOperationMethods::EPSG_NADCON5_2D) {
                $params['ellipsoidalHeightDifferenceFile'] = ['value' => null, 'uom' => null, 'reverses' => false];
            }
            $paramData[$operation] = $params;
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateOperation/CoordinateOperationParams.php', $paramData);
    }

    public function generateExtents(): void
    {
        echo 'Updating extents...';

        $boundingBoxOnly = $this->sourceDir . '/Geometry/Extents/BoundingBoxOnly/';
        $builtInFull = $this->sourceDir . '/Geometry/Extents/';
        $africa = $this->sourceDir . '/../vendor/php-coord/datapack-africa/src/Geometry/Extents/';
        $antarctic = $this->sourceDir . '/../vendor/php-coord/datapack-antarctic/src/Geometry/Extents/';
        $arctic = $this->sourceDir . '/../vendor/php-coord/datapack-arctic/src/Geometry/Extents/';
        $asia = $this->sourceDir . '/../vendor/php-coord/datapack-asia/src/Geometry/Extents/';
        $europe = $this->sourceDir . '/../vendor/php-coord/datapack-europe/src/Geometry/Extents/';
        $northAmerica = $this->sourceDir . '/../vendor/php-coord/datapack-northamerica/src/Geometry/Extents/';
        $southAmerica = $this->sourceDir . '/../vendor/php-coord/datapack-southamerica/src/Geometry/Extents/';
        $oceania = $this->sourceDir . '/../vendor/php-coord/datapack-oceania/src/Geometry/Extents/';

        $regionMap = require 'ExtentMap.php';

        $sql = "
            SELECT e.extent_code, e.extent_name
            FROM epsg_coordinatereferencesystem crs
            JOIN epsg_usage u ON u.object_code = crs.coord_ref_sys_code AND u.object_table_name = 'epsg_coordinatereferencesystem'
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2020-12-14'
            WHERE dep.deprecation_id IS NULL AND e.deprecated = 0

            UNION

            SELECT e.extent_code, e.extent_name
            FROM epsg_coordoperation o
            JOIN epsg_usage u ON u.object_code = o.coord_op_code AND u.object_table_name = 'epsg_coordoperation'
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code AND dep.deprecation_date <= '2020-12-14'
            WHERE dep.deprecation_id IS NULL AND e.deprecated = 0

            GROUP BY e.extent_code
        ";
        $result = $this->sqlite->query($sql);

        $extents = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $extents[$row['extent_code']] = $row['extent_name'];

            if (!isset($regionMap[$row['extent_code']])) {
                throw new Exception("Unknown region for {$row['extent_code']}:{$row['extent_name']}");
            }
        }

        foreach ($extents as $extentCode => $extentName) {
            if (class_exists("PHPCoord\\Geometry\\Extents\\Extent{$extentCode}")) {
                continue;
            }

            sleep(2);

            $region = $regionMap[$extentCode];
            $name = $extents[$extentCode];
            $geoJson = file_get_contents("https://apps.epsg.org/api/v1/Extent/{$extentCode}/polygon/");
            $polygons = json_decode($geoJson, true, 512, JSON_THROW_ON_ERROR);

            $exportSimple = "<?php\ndeclare(strict_types=1);\n\nnamespace PHPCoord\Geometry\Extents\BoundingBoxOnly;\n/**\n * {$region}/{$name}.\n * @internal\n */\nclass Extent{$extentCode}\n{\n    public function __invoke(): array\n    {\n        return\n        [\n";
            $exportFull = "<?php\ndeclare(strict_types=1);\n\nnamespace PHPCoord\Geometry\Extents;\n/**\n * {$region}/{$name}.\n * @internal\n */\nclass Extent{$extentCode}\n{\n    public function __invoke(): array\n    {\n        return\n        [\n";

            if ($polygons['type'] === 'Polygon') {
                $polygons['coordinates'] = [$polygons['coordinates']];
            }

            foreach ($polygons['coordinates'] as $polygon) {
                $outerRingPoints = $polygon[0];
                $xmin = min(array_column($outerRingPoints, 0));
                $xmax = max(array_column($outerRingPoints, 0));
                $ymin = min(array_column($outerRingPoints, 1));
                $ymax = max(array_column($outerRingPoints, 1));
                $exportSimple .= "            [\n                [\n                    ";
                $exportSimple .= "[{$xmax}, {$ymax}], [{$xmin}, {$ymax}], [{$xmin}, {$ymin}], [{$xmax}, {$ymin}], [{$xmax}, {$ymax}],";
                $exportSimple .= "\n                ],\n            ],\n";

                $exportFull .= "            [\n";
                foreach ($polygon as $ring) {
                    $exportFull .= "                [\n                    ";
                    foreach ($ring as $point) {
                        $exportFull .= '[' . $point[0] . ', ' . $point[1] . '], ';
                    }
                    $exportFull .= "\n                ],\n";
                }
                $exportFull .= "            ],\n";
            }
            $exportSimple .= "        ];\n    }\n}\n";
            $exportFull .= "        ];\n    }\n}\n";

            switch ($region) {
                case self::REGION_GLOBAL:
                    file_put_contents($builtInFull . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($builtInFull . "Extent{$extentCode}.php");
                    break;
                case self::REGION_AFRICA:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($africa . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($africa . "Extent{$extentCode}.php");
                    break;
                case self::REGION_ANTARCTIC:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($antarctic . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($antarctic . "Extent{$extentCode}.php");
                    break;
                case self::REGION_ARCTIC:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($arctic . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($arctic . "Extent{$extentCode}.php");
                    break;
                case self::REGION_ASIA:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($asia . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($asia . "Extent{$extentCode}.php");
                    break;
                case self::REGION_OCEANIA:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($oceania . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($oceania . "Extent{$extentCode}.php");
                    break;
                case self::REGION_EUROPE:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($europe . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($europe . "Extent{$extentCode}.php");
                    break;
                case self::REGION_NORTHAMERICA:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($northAmerica . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($northAmerica . "Extent{$extentCode}.php");
                    break;
                case self::REGION_SOUTHAMERICA:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->codeGen->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($southAmerica . "Extent{$extentCode}.php", $exportFull);
                    $this->codeGen->csFixFile($southAmerica . "Extent{$extentCode}.php");
                    break;
                default:
                    throw new Exception("Unknown region: {$region}");
            }
        }

        echo 'done' . PHP_EOL;
    }

    protected static function camelCase(string $string): string
    {
        $string = str_replace([' ', '-', '(', ')'], '', ucwords($string, ' -()'));
        if (!preg_match('/^(EPSG|[ABC][uv\d])/', $string)) {
            $string = lcfirst($string);
        }

        return $string;
    }
}
