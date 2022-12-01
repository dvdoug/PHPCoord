<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

use PHPCoord\CoordinateOperation\CoordinateOperationMethods;
use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
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
use PHPCoord\Geometry\RegionMap;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Rate;
use PHPCoord\UnitOfMeasure\Scale\Scale;
use PHPCoord\UnitOfMeasure\Time\Time;
use SQLite3;

use function array_map;
use function array_unique;
use function array_values;
use function assert;
use function count;
use function dirname;
use function explode;
use function file_get_contents;
use function file_put_contents;
use function glob;
use function implode;
use function in_array;
use function lcfirst;
use function preg_match;
use function preg_replace;
use function str_replace;
use function ucwords;
use function unlink;
use function var_export;

use const SQLITE3_ASSOC;
use const SQLITE3_OPEN_READONLY;

class EPSGCodegenFromDataImport
{
    private string $sourceDir;

    private SQLite3 $sqlite;

    private Codegen $codeGen;

    public const BLACKLISTED_METHODS = [
        // not implemented yet
        1070, // Point motion by grid (Canada NTv2_Vel)
        1113, // Vertical Offset by velocity grid (NRCan byn)
        1114, // Geographic3D Offset by velocity grid (NRCan byn)

        // only distributed as .dll, can't use
        1036, // Cartesian Grid Offsets from Form Function
        1040, // GNTRANS

        // replaced with OSGM15
        1045, // Geographic3D to GravityRelatedHeight (OSGM02-Ire)

        // replaced by NTv2
        9614, // NTv1,

        // replaced by NADCON5
        9613, // NADCON,

        // replaced by AUSGeoidv2
        9662, // Geographic3D to GravityRelatedHeight (AUSGeoid98)

        // Replaced by IGN2009
        1094, // Geog3D to Geog2D+GravityRelatedHeight (IGN1997)
        9664, // Geographic3D to GravityRelatedHeight (IGN1997)

        // Replaced with a position vector transformation
        9620, // Norway Offshore Interpolation

        // Not available for download
        9634, // Maritime Provinces polynomial interpolation

        // free, but license does not permit redistribution
        1050, // Geographic3D to GravityRelatedHeight (CI)
        1091, // Geog3D to Geog2D+GravityRelatedHeight (CI)

        // EGM files are *very* large and not of general use
        1103, // Geog3D to Geog2D+GravityRelatedHeight (EGM)
        9661, // Geographic3D to GravityRelatedHeight (EGM)

        // Complex, very little accuracy improvement
        1079, // New Zealand Deformation Model
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

        // Have alternate transforms with better params
        1046,
        1050,
        1055,
        1056,
        1061,
        1067,
        1073,
        1075,
        1081,
        1083,
        1084,
        1085,
        1088,
        1089,
        1090,
        1091,
        1092,
        1093,
        1094,
        1109,
        1113,
        1124,
        1125,
        1127,
        1128,
        1131,
        1148,
        1150,
        1156,
        1163,
        1169,
        1189,
        1192,
        1195,
        1196,
        1197,
        1198,
        1199,
        1226,
        1242,
        1247,
        1248,
        1279,
        1227,
        1228,
        1230,
        1253,
        1255,
        1277,
        1315,
        1318,
        1319,
        1323,
        1326,
        1327,
        1333,
        1438,
        1446,
        1536,
        1537,
        1538,
        1556,
        1561,
        1562,
        1569,
        1586,
        1592,
        1597,
        1615,
        1622,
        1652,
        1682,
        1684,
        1685,
        1686,
        1687,
        1764,
        1776,
        1797,
        1801,
        1813,
        1814,
        1815,
        1816,
        1817,
        1818,
        1820,
        1821,
        1822,
        1823,
        1824,
        1825,
        1832,
        1833,
        1852,
        1859,
        1861,
        1863,
        1887,
        1903,
        1904,
        1909,
        1910,
        1913,
        1914,
        1916,
        1956,
        1968,
        1969,
        1970,
        1971,
        1972,
        1973,
        1974,
        1975,
        1976,
        1977,
        1978,
        1979,
        1980,
        1981,
        1982,
        1983,
        1984,
        1986,
        1990,
        2575,
        2780,
        4064,
        4065,
        4066,
        4068,
        4290,
        4477,
        4560,
        5024,
        5027,
        5033,
        5036,
        5078,
        5191,
        5194,
        5249,
        5376,
        5470,
        5485,
        5590,
        5622,
        5630,
        6142,
        6143,
        6192,
        6195,
        6196,
        6281,
        6283,
        6284,
        6285,
        6286,
        6287,
        6288,
        6289,
        6291,
        6292,
        6293,
        6294,
        6295,
        6296,
        6297,
        6298,
        6299,
        6300,
        6302,
        6304,
        6306,
        6389,
        6872,
        6889,
        6891,
        6898,
        6901,
        6902,
        6914,
        6938,
        6940,
        6942,
        6998,
        7002,
        7003,
        7004,
        7442,
        7443,
        7704,
        7814,
        7893,
        7898,
        7941,
        7942,
        7943,
        7944,
        7945,
        7946,
        7947,
        7948,
        7949,
        7950,
        7951,
        8405,
        8695,
        8696,
        8822,
        8828,
        8830,
        8832,
        8834,
        8842,
        8844,
        8846,
        8850,
        8852,
        8853,
        8869,
        8870,
        8871,
        8872,
        8873,
        8874,
        8875,
        8876,
        8877,
        8878,
        8879,
        8880,
        8883,
        8884,
        8887,
        9020,
        9021,
        9022,
        9023,
        9024,
        9025,
        9026,
        9027,
        9079,
        9080,
        9081,
        9082,
        9083,
        9263,
        9686,
        9688,
        9689,
        10086,
        10099,
        10085,
        15484,
        15493,
        15495,
        15705,
        15706,
        15714,
        15716,
        15718,
        15720,
        15722,
        15724,
        15726,
        15728,
        15741,
        15750,
        15751,
        15755,
        15798,
        15811,
        15814,
        15829,
        15830,
        15881,
        15848,
        15874,
        15877,
        15882,
        15883,
        15884,
        15885,
        15886,
        15901,
        15902,
        15903,
        15904,
        15927,
        15937,
        15938,
        15952,
        15970,

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

        // replaced by RAF20
        9786, // IGNF RAF18b.mnt
        9787, // IGNF RAF18b.mnt

        // replaced by RAF18b
        8885, // IGNF RAF18.mnt
        9638, // IGNF RAF18.mnt

        // replaced by RAF18
        8371, // IGNF RAF09.mnt
        9639, // IGNF RAF09.mnt

        // replaced by RASPM2018
        9137, // IGNF GGSPM06v1.mnt

        // approximation/emulation of official transforms
        1295, // NTv2 RGNC1991_NEA74Noumea.gsb
        6946, // NTv2 tm75_etrs89.gsb
        6947, // NTv2 tm75_etrs89.gsb
        9890, // NTv2 rgf93_ntf.gsb
        9891, // NTv2 rgf93_ntf.gsb
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

        // exclusively marine
        10130, // KMS ChartDatum_above_Ellipsoid_EUREF89_v2021b.bin
        10133, // KMS ChartDatum_above_Ellipsoid_EUREF89_v2021b.bin

        // Very large, only really of scientific use
        3858, // EGM2008 Und_min2.5x2.5_egm2008_isw=82_WGS84_TideFree.gz
        3859, // EGM2008 Und_min1x1_egm2008_isw=82_WGS84_TideFree.gz
        7891, // EGM2008 Und_min2.5x2.5_egm2008_isw=82_WGS84_TideFree.gz
        8037, // EGM2008 Und_min1x1_egm2008_isw=82_WGS84_TideFree.gz
        9617, // EGM2008 Und_min2.5x2.5_egm2008_isw=82_WGS84_TideFree.gz
        9618, // EGM2008 Und_min1x1_egm2008_isw=82_WGS84_TideFree.gz
        9704, // EGM2008 Und_min2.5x2.5_egm2008_isw=82_WGS84_TideFree.gz
        9706, // EGM2008 Und_min1x1_egm2008_isw=82_WGS84_TideFree.gz

        // Not available for public download
        9305, // GTX INAGEOID20.gtx
        9375, // INADEFORM v3_dm_grd01_xyz.dat
        9629, // GTX INAGEOID20.gtx
        10144, // GTX INAGEOID2020v2.gtx
        10145, // GTX INAGEOID2020v2.gtx
        5626, // KMS fehmarn_geoid10.gri
        9619, // KMS fehmarn_geoid10.gri
        9598, // KMS gr2000g.gri
        9355, // KMS KSA-GEOID17.gra
        9620, // KMS KSA-GEOID17.gra
        9940, // NTv2 HeTa2010.gsb
        9979, // NTv2 SIRGAS1995-to-SIRGAS2000.gsb
        9980, // NTv2 SIRGAS2000-to-SIRGAS-CONSIR17P01.gsb
        10106, // BIN arcgp-2006-sk.bin
        10107, // BIN arcgp-2006-sk.bin

        // Construction/engineering/scientific projects not of general use
        9302, // NTv2 HS2TN15_NTv2.gsb
        9365, // NTv2 TN15-ETRS89-to-TPEN11-IRF.gsb
        9369, // NTv2 TN15-ETRS89-to-MML07-IRF.gsb
        9386, // NTv2 TN15-ETRS89-to-AbInvA96_2020-IRF.gsb
        9454, // NTv2 TN15-ETRS89-to-GBK19-IRF.gsb
        9740, // NTv2 TN15-ETRS89-to-EOS21-IRF.gsb
        9759, // NTv2 TN15-ETRS89-to-ECML14_NB-IRF.gsb
        9764, // NTv2 TN15-ETRS89-to-EWR2-IRF.gsb
        9867, // NTv2 TN15-ETRS89-to-MRH21-IRF.gsb
        9878, // NTv2 TN15-ETRS89-to-MOLDOR11-IRF.gsb
        9941, // NTv2 TN15-ETRS89-to-EBBWV14-IRF.gsb
        9965, // NTv2 TN15-ETRS89-to-HULLEE13-IRF.gsb
        9970, // NTv2 TN15-ETRS89-to-SCM22-IRF.gsb
        9975, // NTv2 TN15-ETRS89-to-FNL22-IRF.gsb
        10108, // NTv2 TN15-ETRS89-to-MWC18-IRF.gsb
        9363, // IGNF ARAMCO_AAA-KSAGRF_6.tac

        // free, but license does not permit redistribution
        9112, // NTv2 BC_27_98.GSB
        9114, // NTv2 NVI27_05.GSB
        9116, // NTv2 BC_93_98.GSB
        9120, // NTv2 CRD98_00.GSB
        9121, // NTv2 NVI98_05.GSB
        9122, // NTv2 BC_98_05.GSB
        9496, // NTv2 MGI1901_TO_SRBETRS89_NTv2.gsb
        8269, // KMS ggeoid16.gri
        9599, // KMS ggeoid16.gri
        9553, // ASC pt_2019z.asc
        9554, // ASC pt_2019m.asc
        9555, // ASC de_2019z.asc
        9556, // ASC de_2019m.asc
        9557, // ASC at_2019z.asc
        9558, // ASC at_2019m.asc
        9559, // ASC ch_2019z.asc
        9560, // ASC ch_2019m.asc
        9561, // ASC gb_2019z.asc
        9563, // ASC be_2019z.asc
        9564, // ASC be_2019m.asc
        9565, // ASC si_2019z.asc
        9566, // ASC si_2019m.asc
        9567, // ASC mk_2019z.asc
        9568, // ASC mk_2019m.asc
        9569, // ASC ba_2019z.asc
        9570, // ASC ba_2019m.asc
        9571, // ASC bgalt_2019z.asc
        9572, // ASC bgalt_2019m.asc
        9573, // ASC fi_2019z.asc
        9574, // ASC fi_2019m.asc
        9575, // ASC fr_2019z.asc
        9576, // ASC fr_2019m.asc
        9577, // ASC hu_2019z.asc
        9578, // ASC hu_2019m.asc
        9579, // ASC lv_2019z.asc
        9580, // ASC lv_2019m.asc
        9581, // ASC nl_2019z.asc
        9582, // ASC nl_2019m.asc
        9583, // ASC ro_2019z.asc
        9645, // ASC ro_2019m.asc
        9646, // ASC es_2019z.asc
        9647, // ASC es_2019m.asc
        9648, // ASC se_2019z.asc
        9649, // ASC se_2019m.asc
        9652, // ASC pl86_2019z.asc
        9653, // ASC pl86_2019m.asc
        9654, // ASC pl07_2019z.asc
        9655, // ASC pl07_2019m.asc
        9664, // ASC ee_2019z.asc
        9665, // ASC ee_2019m.asc
        9667, // ASC lt_2019z.asc
        9668, // ASC lt_2019m.asc
        9670, // ASC bgneu_2019z.asc
        9671, // ASC bgneu_2019m.asc
        9902, // ASC ua_2019z.asc
        9903, // ASC ua_2019m.asc
        9900, // ASC it_2019z.asc
        9921, // ASC it_2019m.asc
        7655, // PNG08.DAT

        // license requires money :((
        9732, // NTv2 35160622_47161840_R40_E50.gsb
        9733, // NTv2 35160622_47161840_R40_F89.gsb
        9734, // NTv2 35160622_47161840_R40_F00.gsb
        9735, // NTv2 35160622_47161840_E50_F89.gsb
        9736, // NTv2 35160622_47161840_E50_F00.gsb
        9737, // NTv2 35160622_47161840_F89_F00.gsb
        9727, // GRD geo_igm_mar06.grd
        9728, // GRD geo_igm_mar06.grd
        9729, // GRD geo_igm_mar06.grd
        9730, // GRD geo_igm_mar06.grd
        9925, // TXT GCG2016.txt
        9926, // TXT GCG2016.txt
        10152, // TXT VORF-UK08_ETRF_to_MSL.vrf
        10153, // TXT VORF-UK08_ETRF_to_CD.vrf
        10154, // TXT VORF-UK08_ETRF_to_MSL.vrf
        10155, // TXT VORF-UK08_ETRF_to_CD.vrf
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
                m.remarks AS constant_help,
                m.remarks AS doc_help,
                m.deprecated
            FROM epsg_unitofmeasure m
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_unitofmeasure' AND dep.object_code = m.uom_code AND dep.deprecation_date <= '2021-09-10'
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
            ]
        );
        $this->codeGen->updateDocs(Angle::class, $data);

        $sql = "
            SELECT
                'urn:ogc:def:uom:EPSG::' || m.uom_code AS urn,
                m.unit_of_meas_name AS name,
                m.remarks AS constant_help,
                m.remarks AS doc_help,
                m.deprecated
            FROM epsg_unitofmeasure m
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_unitofmeasure' AND dep.object_code = m.uom_code AND dep.deprecation_date <= '2021-09-10'
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
                m.remarks AS constant_help,
                m.remarks AS doc_help,
                m.deprecated
            FROM epsg_unitofmeasure m
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_unitofmeasure' AND dep.object_code = m.uom_code AND dep.deprecation_date <= '2021-09-10'
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
                m.remarks AS constant_help,
                m.remarks AS doc_help,
                m.deprecated
            FROM epsg_unitofmeasure m
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_unitofmeasure' AND dep.object_code = m.uom_code AND dep.deprecation_date <= '2021-09-10'
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
                m.remarks AS constant_help,
                m.remarks AS doc_help,
                m.deprecated
            FROM epsg_unitofmeasure m
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_unitofmeasure' AND dep.object_code = m.uom_code AND dep.deprecation_date <= '2021-09-10'
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
                m.remarks AS constant_help,
                m.deprecated
            FROM epsg_unitofmeasure m
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_unitofmeasure' AND dep.object_code = m.uom_code AND dep.deprecation_date <= '2021-09-10'
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
                p.remarks AS constant_help,
                p.greenwich_longitude,
                'urn:ogc:def:uom:EPSG::' || p.uom_code AS uom,
                p.remarks AS doc_help,
                p.deprecated
            FROM epsg_primemeridian p
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_primemeridian' AND dep.object_code = p.prime_meridian_code AND dep.deprecation_date <= '2021-09-10'
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
                e.remarks AS constant_help,
                e.remarks AS doc_help,
                e.deprecated
            FROM epsg_ellipsoid e
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_ellipsoid' AND dep.object_code = e.ellipsoid_code AND dep.deprecation_date <= '2021-09-10'
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
                d.origin_description || '\n' || d.remarks AS constant_help,
                d.datum_type AS type,
                REPLACE(GROUP_CONCAT(DISTINCT e.extent_description), '.,', ', ') AS extent_description,
                d.origin_description || '\n' || d.remarks AS doc_help,
                d.deprecated
            FROM epsg_datum d
            JOIN epsg_usage u ON u.object_table_name = 'epsg_datum' AND u.object_code = d.datum_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_datum' AND dep.object_code = d.datum_code AND dep.deprecation_date <= '2021-09-10'
            WHERE dep.deprecation_id IS NULL AND d.datum_type != 'engineering' AND d.datum_name NOT LIKE '%example%'
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
                Datum::EPSG_LUXEMBOURG_REFERENCE_FRAME => ['Luxembourg 1930'],
                Datum::EPSG_NIVELLEMENT_GENERAL_DU_LUXEMBOURG_1995 => ['Nivellement General du Luxembourg'],
                Datum::EPSG_CANADIAN_GEODETIC_VERTICAL_DATUM_OF_2013_CGG2013A_EPOCH_2010 => ['Canadian Geodetic Vertical Datum of 2013 (CGG2013a)'],
                Datum::EPSG_INDONESIAN_GEOID_2020_VERSION_1 => ['Indonesian Geoid 2020'],
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
                cs.remarks AS constant_help,
                cs.remarks AS doc_help,
                cs.deprecated
            FROM epsg_coordinatesystem cs
            JOIN epsg_coordinatereferencesystem crs ON crs.coord_sys_code = cs.coord_sys_code AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%'
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatesystem' AND dep.object_code = cs.coord_sys_code AND dep.deprecation_date <= '2021-09-10'
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
                cs.remarks AS constant_help,
                cs.remarks AS doc_help,
                cs.deprecated
            FROM epsg_coordinatesystem cs
            JOIN epsg_coordinatereferencesystem crs ON crs.coord_sys_code = cs.coord_sys_code AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%'
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatesystem' AND dep.object_code = cs.coord_sys_code AND dep.deprecation_date <= '2021-09-10'
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
                cs.remarks AS constant_help,
                cs.remarks AS doc_help,
                cs.deprecated
            FROM epsg_coordinatesystem cs
            JOIN epsg_coordinatereferencesystem crs ON crs.coord_sys_code = cs.coord_sys_code AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%'
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatesystem' AND dep.object_code = cs.coord_sys_code AND dep.deprecation_date <= '2021-09-10'
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
                cs.coord_sys_name || '\n' || cs.remarks AS constant_help,
                cs.deprecated
            FROM epsg_coordinatesystem cs
            JOIN epsg_coordinatereferencesystem crs ON crs.coord_sys_code = cs.coord_sys_code AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%'
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatesystem' AND dep.object_code = cs.coord_sys_code AND dep.deprecation_date <= '2021-09-10'
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
                crs.remarks AS constant_help,
                GROUP_CONCAT(DISTINCT e.extent_code) AS extent,
                REPLACE(GROUP_CONCAT(DISTINCT e.extent_description), '.,', ', ') AS extent_description,
                crs.remarks AS doc_help,
                crs.deprecated
            FROM epsg_coordinatereferencesystem crs
            JOIN epsg_usage u ON u.object_table_name = 'epsg_coordinatereferencesystem' AND u.object_code = crs.coord_ref_sys_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            JOIN epsg_coordinatereferencesystem horizontal ON horizontal.coord_ref_sys_code = crs.cmpd_horizcrs_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2021-09-10'
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
            $row['extent'] = array_values(array_unique(explode(',', $row['extent'])));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/CompoundSRIDData.php', $data);
        $this->codeGen->updateFileConstants(
            $this->sourceDir . '/CoordinateReferenceSystem/Compound.php',
            $data,
            'public',
            [
                Compound::EPSG_NAD83_CSRS_PLUS_CGVD2013_CGG2013_HEIGHT => ['NAD83(CSRS) + CGVD2013 height'],
                Compound::EPSG_NAD83_CSRS_UTM_ZONE_15N_PLUS_CGVD2013A_2010_HEIGHT => ['NAD83(CSRS) / UTM zone 15N + CGVD2013a height'],
                Compound::EPSG_NAD83_CSRS_V6_PLUS_CGVD2013A_2010_HEIGHT => ['NAD83(CSRS)v6 + CGVD2013(CGG2013a) height'],
                Compound::EPSG_SRGI2013_PLUS_INAGEOID2020_V1_HEIGHT => ['SRGI2013 + INAGeoid2020 height'],
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
                crs.remarks AS constant_help,
                GROUP_CONCAT(DISTINCT e.extent_code) AS extent,
                REPLACE(GROUP_CONCAT(DISTINCT e.extent_description), '.,', ', ') AS extent_description,
                crs.remarks AS doc_help,
                crs.deprecated
            FROM epsg_coordinatereferencesystem crs
            JOIN epsg_usage u ON u.object_table_name = 'epsg_coordinatereferencesystem' AND u.object_code = crs.coord_ref_sys_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_coordinatereferencesystem crs_base ON crs_base.coord_ref_sys_code = crs.base_crs_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2021-09-10'
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
            $row['extent'] = array_values(array_unique(explode(',', $row['extent'])));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/GeocentricSRIDData.php', $data);
        $this->codeGen->updateFileConstants(
            $this->sourceDir . '/CoordinateReferenceSystem/Geocentric.php',
            $data,
            'public',
            [
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
                crs.remarks AS constant_help,
                GROUP_CONCAT(DISTINCT e.extent_code) AS extent,
                REPLACE(GROUP_CONCAT(DISTINCT e.extent_description), '.,', ', ') AS extent_description,
                crs.remarks AS doc_help,
                crs.deprecated
            FROM epsg_coordinatereferencesystem crs
            JOIN epsg_usage u ON u.object_table_name = 'epsg_coordinatereferencesystem' AND u.object_code = crs.coord_ref_sys_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_coordinatereferencesystem crs_base ON crs_base.coord_ref_sys_code = crs.base_crs_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2021-09-10'
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
            $row['extent'] = array_values(array_unique(explode(',', $row['extent'])));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/Geographic2DSRIDData.php', $data);
        $this->codeGen->updateFileConstants(
            $this->sourceDir . '/CoordinateReferenceSystem/Geographic2D.php',
            $data,
            'public',
            [
                Geographic2D::EPSG_LUREF => ['Luxembourg 1930'],
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
                crs.remarks AS constant_help,
                GROUP_CONCAT(DISTINCT e.extent_code) AS extent,
                REPLACE(GROUP_CONCAT(DISTINCT e.extent_description), '.,', ', ') AS extent_description,
                crs.remarks AS doc_help,
                crs.deprecated
            FROM epsg_coordinatereferencesystem crs
            JOIN epsg_usage u ON u.object_table_name = 'epsg_coordinatereferencesystem' AND u.object_code = crs.coord_ref_sys_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_coordinatereferencesystem crs_base ON crs_base.coord_ref_sys_code = crs.base_crs_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2021-09-10'
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
            $row['extent'] = array_values(array_unique(explode(',', $row['extent'])));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/Geographic3DSRIDData.php', $data);
        $this->codeGen->updateFileConstants(
            $this->sourceDir . '/CoordinateReferenceSystem/Geographic3D.php',
            $data,
            'public',
            [
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
                'urn:ogc:def:crs:EPSG::' || crs.base_crs_code AS base_crs,
                'urn:ogc:def:coordinateOperation:EPSG::' || crs.projection_conv_code AS deriving_conversion,
                crs.remarks AS constant_help,
                GROUP_CONCAT(DISTINCT e.extent_code) AS extent,
                REPLACE(GROUP_CONCAT(DISTINCT e.extent_description), '.,', ', ') AS extent_description,
                crs.remarks AS doc_help,
                crs.deprecated
            FROM epsg_coordinatereferencesystem crs
            JOIN epsg_usage u ON u.object_table_name = 'epsg_coordinatereferencesystem' AND u.object_code = crs.coord_ref_sys_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_coordinatereferencesystem crs_base ON crs_base.coord_ref_sys_code = crs.base_crs_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2021-09-10'
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
            $row['extent'] = array_values(array_unique(explode(',', $row['extent'])));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/ProjectedSRIDData.php', $data);
        $this->codeGen->updateFileConstants(
            $this->sourceDir . '/CoordinateReferenceSystem/Projected.php',
            $data,
            'public',
            [
                Projected::EPSG_LUREF_LUXEMBOURG_TM => ['Luxembourg 1930 / Gauss'],
                Projected::EPSG_NAD83_CSRS_V6_MTM_NS_2010_ZONE_4 => ['NAD83(CSRS)v6 / MTM Nova Scotia zone 4'],
                Projected::EPSG_NAD83_CSRS_V6_MTM_NS_2010_ZONE_5 => ['NAD83(CSRS)v6 / MTM Nova Scotia zone 5'],
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
                crs.remarks AS constant_help,
                GROUP_CONCAT(DISTINCT e.extent_code) AS extent,
                REPLACE(GROUP_CONCAT(DISTINCT e.extent_description), '.,', ', ') AS extent_description,
                crs.remarks AS doc_help,
                crs.deprecated
            FROM epsg_coordinatereferencesystem crs
            JOIN epsg_usage u ON u.object_table_name = 'epsg_coordinatereferencesystem' AND u.object_code = crs.coord_ref_sys_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_coordinatereferencesystem crs_base ON crs_base.coord_ref_sys_code = crs.base_crs_code
            LEFT JOIN epsg_coordinatereferencesystem crs_base2 ON crs_base2.coord_ref_sys_code = crs_base.base_crs_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2021-09-10'
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
            $row['extent'] = array_values(array_unique(explode(',', $row['extent'])));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/VerticalSRIDData.php', $data);
        $this->codeGen->updateFileConstants(
            $this->sourceDir . '/CoordinateReferenceSystem/Vertical.php',
            $data,
            'public',
            [
                Vertical::EPSG_NG95_HEIGHT => ['NG-L height'],
                Vertical::EPSG_CGVD2013A_2010_HEIGHT => ['CGVD2013(CGG2013a) height'],
                Vertical::EPSG_INAGEOID2020_V1_HEIGHT => ['INAGeoid2020 height'],
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
                crs.remarks AS constant_help,
                REPLACE(GROUP_CONCAT(DISTINCT e.extent_description), '.,', ', ') AS extent_description,
                crs.deprecated
            FROM epsg_coordinatereferencesystem crs
            JOIN epsg_usage u ON u.object_table_name = 'epsg_coordinatereferencesystem' AND u.object_code = crs.coord_ref_sys_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_coordinatereferencesystem crs_base ON crs_base.coord_ref_sys_code = crs.base_crs_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2021-09-10'
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

        $crsCount = count(CoordinateReferenceSystem::getSupportedSRIDs());
        file_put_contents($this->sourceDir . '/../docs/reflection/numOfCRS.txt', implode("\n", ['.. |numOfCRS| replace:: ' . $crsCount]));
        file_put_contents($this->sourceDir . '/../README.md', preg_replace('/<!-- numOfCRS -->\d+/', '<!-- numOfCRS -->' . $crsCount, file_get_contents($this->sourceDir . '/../README.md')));
    }

    public function generateDataCoordinateOperationMethods(): void
    {
        $sql = "
            SELECT
                'urn:ogc:def:method:EPSG::' || m.coord_op_method_code AS urn,
                m.coord_op_method_code AS method_code,
                m.coord_op_method_name AS name,
                m.reverse_op AS reversible,
                '' AS constant_help,
                '' AS doc_help,
                m.deprecated
            FROM epsg_coordoperationmethod m
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperationmethod' AND dep.object_code = m.coord_op_method_code AND dep.deprecation_date <= '2021-09-10'
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
            $row['reversible'] = (bool) $row['reversible'];
            $data[$row['urn']] = $row;
            $data[$row['urn']]['paramData'] = [];
            unset($data[$row['urn']]['urn'], $data[$row['urn']]['method_code']);

            $sql = "
            SELECT
                p.parameter_name,
                CASE WHEN u.param_sign_reversal = 'Yes' THEN 1 ELSE 0 END AS reverses
            FROM epsg_coordoperationparamusage u
            JOIN epsg_coordoperationparam p ON u.parameter_code = p.parameter_code
            WHERE u.coord_op_method_code = {$row['method_code']}
            ORDER BY u.sort_order ASC
        ";

            $paramResult = $this->sqlite->query($sql);
            while ($paramRow = $paramResult->fetchArray(SQLITE3_ASSOC)) {
                $paramName = self::makeParamName($paramRow['parameter_name']);
                $data[$row['urn']]['paramData'][$paramName] = [
                    'reverses' => (bool) $paramRow['reverses'],
                ];
            }
        }

        $this->codeGen->updateFileConstants(
            $this->sourceDir . '/CoordinateOperation/CoordinateOperationMethods.php',
            $data,
            'public',
            []
        );
        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateOperation/CoordinateOperationMethods.php', $data);
        $this->codeGen->updateDocs(CoordinateOperationMethods::class, $data);
    }

    public function generateDataCoordinateOperations(): void
    {
        $filenameToProviderMap = require 'FilenameToProviderMap.php';
        $regionMap = (new RegionMap())();

        $blackListedOperations = $this->getBlacklistedOperations();

        $sql = "
            SELECT
                'urn:ogc:def:coordinateOperation:EPSG::' || o.coord_op_code AS operation,
                o.coord_op_name AS name,
                'urn:ogc:def:crs:EPSG::' || o.source_crs_code AS source_crs,
                'urn:ogc:def:crs:EPSG::' || o.target_crs_code AS target_crs,
                COALESCE(o.coord_op_accuracy, 0) AS accuracy,
                GROUP_CONCAT(DISTINCT e.extent_code) AS extent,
                '' AS doc_help
            FROM epsg_coordoperation o
            JOIN epsg_coordoperationmethod m ON m.coord_op_method_code = o.coord_op_method_code
            JOIN epsg_coordinatereferencesystem sourcecrs ON sourcecrs.coord_ref_sys_code = o.source_crs_code AND sourcecrs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND sourcecrs.deprecated = 0
            JOIN epsg_coordinatereferencesystem targetcrs ON targetcrs.coord_ref_sys_code = o.target_crs_code AND targetcrs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND targetcrs.deprecated = 0
            JOIN epsg_usage u ON u.object_table_name = 'epsg_coordoperation' AND u.object_code = o.coord_op_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code AND dep.deprecation_date <= '2021-09-10'
            LEFT JOIN epsg_supersession s ON s.object_table_name = 'epsg_coordoperation' AND s.object_code = o.coord_op_code
            WHERE o.coord_op_type != 'conversion' AND o.coord_op_type != 'concatenated operation' AND o.coord_op_name NOT LIKE '%example%' AND o.coord_op_name NOT LIKE '%mining%'
            AND dep.deprecation_id IS NULL AND o.deprecated = 0 AND s.supersession_id IS NULL
            GROUP BY source_crs, target_crs, o.coord_op_code
            HAVING (SUM(CASE WHEN m.coord_op_method_code IN (" . implode(',', self::BLACKLISTED_METHODS) . ') THEN 1 ELSE 0 END) = 0)
               AND (SUM(CASE WHEN o.coord_op_code IN (' . implode(',', $blackListedOperations) . ") THEN 1 ELSE 0 END) = 0)

            UNION

            SELECT
                'urn:ogc:def:coordinateOperation:EPSG::' || o.coord_op_code AS operation,
                o.coord_op_name AS name,
                'urn:ogc:def:crs:EPSG::' || projcrs.base_crs_code AS source_crs,
                'urn:ogc:def:crs:EPSG::' || projcrs.coord_ref_sys_code AS target_crs,
                COALESCE(o.coord_op_accuracy, 0) AS accuracy,
                GROUP_CONCAT(DISTINCT e.extent_code) AS extent,
                '' AS doc_help
            FROM epsg_coordoperation o
            JOIN epsg_coordinatereferencesystem projcrs ON projcrs.projection_conv_code = o.coord_op_code AND projcrs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND projcrs.deprecated = 0
            JOIN epsg_coordoperationmethod m ON m.coord_op_method_code = o.coord_op_method_code
            JOIN epsg_usage u ON u.object_table_name = 'epsg_coordoperation' AND u.object_code = o.coord_op_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = projcrs.coord_ref_sys_code AND dep.deprecation_date <= '2021-09-10'
            WHERE o.coord_op_type = 'conversion' AND o.coord_op_type != 'concatenated operation' AND o.coord_op_name NOT LIKE '%example%' AND o.coord_op_name NOT LIKE '%mining%'
            AND dep.deprecation_id IS NULL AND o.deprecated = 0
            GROUP BY source_crs, target_crs, o.coord_op_code
            HAVING (SUM(CASE WHEN m.coord_op_method_code IN (" . implode(',', self::BLACKLISTED_METHODS) . ') THEN 1 ELSE 0 END) = 0)
            AND (SUM(CASE WHEN o.coord_op_code IN (' . implode(',', $blackListedOperations) . ') THEN 1 ELSE 0 END) = 0)

            ORDER BY source_crs, target_crs, operation
            ';

        $result = $this->sqlite->query($sql);
        $byRegion = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $extents = explode(',', $row['extent']);
            $regions = array_unique(array_map(static fn ($extent) => $regionMap[$extent], $extents));
            assert(count($regions) === 1);
            unset($row['extent']);
            $byRegion[$regions[0]][] = $row;
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateOperation/CRSTransformationsGlobal.php', $byRegion[RegionMap::REGION_GLOBAL]);
        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateOperation/CRSTransformationsAfrica.php', $byRegion[RegionMap::REGION_AFRICA]);
        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateOperation/CRSTransformationsAntarctic.php', $byRegion[RegionMap::REGION_ANTARCTIC]);
        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateOperation/CRSTransformationsArctic.php', $byRegion[RegionMap::REGION_ARCTIC]);
        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateOperation/CRSTransformationsAsia.php', $byRegion[RegionMap::REGION_ASIA]);
        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateOperation/CRSTransformationsEurope.php', $byRegion[RegionMap::REGION_EUROPE]);
        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateOperation/CRSTransformationsNorthAmerica.php', $byRegion[RegionMap::REGION_NORTHAMERICA]);
        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateOperation/CRSTransformationsOceania.php', $byRegion[RegionMap::REGION_OCEANIA]);
        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateOperation/CRSTransformationsSouthAmerica.php', $byRegion[RegionMap::REGION_SOUTHAMERICA]);

        $sql = "
            SELECT
                'urn:ogc:def:coordinateOperation:EPSG::' || o.coord_op_code AS urn,
                o.coord_op_name AS name,
                o.coord_op_type AS type,
                'urn:ogc:def:method:EPSG::' || o.coord_op_method_code AS method,
                m.coord_op_method_name AS method_name,
                GROUP_CONCAT(DISTINCT e.extent_code) AS extent,
                REPLACE(GROUP_CONCAT(DISTINCT e.extent_description), '.,', ', ') AS extent_description,
                o.remarks AS doc_help
            FROM epsg_coordoperation o
            JOIN epsg_coordoperationmethod m ON m.coord_op_method_code = o.coord_op_method_code
            JOIN epsg_coordinatereferencesystem sourcecrs ON sourcecrs.coord_ref_sys_code = o.source_crs_code AND sourcecrs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND sourcecrs.deprecated = 0
            JOIN epsg_coordinatereferencesystem targetcrs ON targetcrs.coord_ref_sys_code = o.target_crs_code AND targetcrs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND targetcrs.deprecated = 0
            JOIN epsg_usage u ON u.object_table_name = 'epsg_coordoperation' AND u.object_code = o.coord_op_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code AND dep.deprecation_date <= '2021-09-10'
            LEFT JOIN epsg_supersession s ON s.object_table_name = 'epsg_coordoperation' AND s.object_code = o.coord_op_code
            WHERE o.coord_op_type != 'conversion' AND o.coord_op_type != 'concatenated operation' AND o.coord_op_name NOT LIKE '%example%'
            AND dep.deprecation_id IS NULL AND o.deprecated = 0 AND s.supersession_id IS NULL
            GROUP BY o.coord_op_code
            HAVING (SUM(CASE WHEN m.coord_op_method_code IN (" . implode(',', self::BLACKLISTED_METHODS) . ') THEN 1 ELSE 0 END) = 0)
            AND (SUM(CASE WHEN o.coord_op_code IN (' . implode(',', $blackListedOperations) . ") THEN 1 ELSE 0 END) = 0)

            UNION

            SELECT
                'urn:ogc:def:coordinateOperation:EPSG::' || o.coord_op_code AS urn,
                o.coord_op_name AS name,
                o.coord_op_type AS type,
                'urn:ogc:def:method:EPSG::' || o.coord_op_method_code AS method,
                m.coord_op_method_name AS method_name,
                GROUP_CONCAT(DISTINCT e.extent_code) AS extent,
                REPLACE(GROUP_CONCAT(DISTINCT e.extent_description), '.,', ', ') AS extent_description,
                o.remarks AS doc_help
            FROM epsg_coordoperation o
            JOIN epsg_coordinatereferencesystem projcrs ON projcrs.projection_conv_code = o.coord_op_code AND projcrs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND projcrs.deprecated = 0
            JOIN epsg_coordoperationmethod m ON m.coord_op_method_code = o.coord_op_method_code
            JOIN epsg_usage u ON u.object_table_name = 'epsg_coordoperation' AND u.object_code = o.coord_op_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = projcrs.coord_ref_sys_code AND dep.deprecation_date <= '2021-09-10'
            WHERE o.coord_op_type = 'conversion' AND o.coord_op_type != 'concatenated operation' AND o.coord_op_name NOT LIKE '%example%'
            AND dep.deprecation_id IS NULL AND o.deprecated = 0
            GROUP BY o.coord_op_code
            HAVING (SUM(CASE WHEN m.coord_op_method_code IN (" . implode(',', self::BLACKLISTED_METHODS) . ') THEN 1 ELSE 0 END) = 0)
            AND (SUM(CASE WHEN o.coord_op_code IN (' . implode(',', $blackListedOperations) . ') THEN 1 ELSE 0 END) = 0)

            ORDER BY urn
            ';

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['extent'] = array_values(array_unique(explode(',', $row['extent'])));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
            unset($data[$row['urn']]['type']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateOperation/CoordinateOperations.php', $data);

        $paramsSeen = [];
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
                    JOIN epsg_coordoperationparam p ON pv.parameter_code = p.parameter_code AND p.parameter_code NOT IN (1048, 1062)
                    WHERE operation_code = '{$operation}'
                    GROUP BY pv.coord_op_code, p.parameter_code
                    ORDER BY pu.sort_order
                    ";

            $paramsResult = $this->sqlite->query($paramsSql);
            while ($paramsRow = $paramsResult->fetchArray(SQLITE3_ASSOC)) {
                unset($paramsRow['operation_code']);
                $paramsRow['name'] = self::makeParamName($paramsRow['name']);
                $paramsRow['reverses'] = (bool) $paramsRow['reverses'];
                if (in_array($paramsRow['parameter_code'], [8659, 8660, 1037, 1048, 8661, 8662], true)) {
                    $paramsRow['value'] = 'urn:ogc:def:crs:EPSG::' . $paramsRow['value'];
                } elseif (in_array($paramsRow['parameter_code'], [1062], true)) {
                    $paramsRow['value'] = 'urn:ogc:def:coordinateOperation:EPSG::' . $paramsRow['value'];
                }
                if (
                    isset($filenameToProviderMap[(string) $paramsRow['value']]) &&
                    in_array(
                        $paramsRow['name'],
                        [
                            'eastingAndNorthingDifferenceFile',
                            'geoidHeightCorrectionModelFile',
                            'latitudeDifferenceFile',
                            'longitudeDifferenceFile',
                            'ellipsoidalHeightDifferenceFile',
                            'offsetsFile',
                        ],
                        true
                    )
                ) {
                    $paramsRow['value'] = $filenameToProviderMap[$paramsRow['value']];
                    unset($paramsRow['uom']);
                }
                unset($paramsRow['parameter_code']);
                $params[$paramsRow['name']] = $paramsRow;
                unset($params[$paramsRow['name']]['name']);
            }
            if (isset($operationData['method']) && $operationData['method'] === CoordinateOperationMethods::EPSG_NADCON5_2D) {
                $params['ellipsoidalHeightDifferenceFile'] = ['value' => null];
            }

            $output = "<?php use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;\n/** @internal */ return [\n";
            foreach ($params as $paramName => $paramData) {
                $output .= "  '{$paramName}' => ";
                if (isset($paramData['uom']) && $paramData['uom']) {
                    $output .= 'UnitOfMeasureFactory::makeUnit(' . var_export($paramData['value'], true) . ', ' . var_export($paramData['uom'], true) . "),\n";
                } else {
                    $output .= var_export($paramData['value'], true) . ",\n";
                }
            }
            $output .= '];';

            $paramFilename = $this->sourceDir . '/CoordinateOperation/Params/' . str_replace(':', '', str_replace('urn:ogc:def:coordinateOperation:', '', $operation)) . '.php';
            file_put_contents($paramFilename, $output);
            $this->codeGen->csFixFile($paramFilename);
            $paramsSeen[$paramFilename] = $paramFilename;
        }

        // Remove unused param files
        foreach (glob($this->sourceDir . '/CoordinateOperation/Params/EPSG*.php') as $filename) {
            if (!isset($paramsSeen[$filename])) {
                unlink($filename);
            }
        }
        $this->codeGen->generateSupportedOperations();
    }

    protected static function makeParamName(string $string): string
    {
        $string = str_replace([' ', '-', '(', ')', '"'], '', ucwords($string, ' -()"'));
        if (!preg_match('/^(EPSG|[ABC][uv\d])/', $string)) {
            $string = lcfirst($string);
        }

        if (in_array($string, ['latitudeAndLongitudeDifferenceFile', 'geocentricTranslationFile', 'verticalOffsetFile'], true)) {
            $string = 'offsetsFile';
        }

        return $string;
    }

    public function getBlacklistedOperations(): array
    {
        $wgs84CopiesFromETRS89 = $this->determineOperationsToWGS84CopiedFromETRS89();
        $etrs89CopiesFromWGS84 = $this->determineOperationsToETRS89CopiedFromWGS84();
        $wgs84CopiesFromGDA94 = $this->determineOperationsToWGS84CopiedFromGDA94();
        $wgs84CopiesFromSIRGAS = $this->determineOperationsToWGS84CopiedFromSIRGAS();
        $wgs84CopiesFromNZGD = $this->determineOperationsToWGS84CopiedFromNZGD2000();
        $projectedToProjected = $this->determineOperationsProjectedToProjected();

        return [
            ...self::BLACKLISTED_OPERATIONS,
            ...$wgs84CopiesFromETRS89,
            ...$etrs89CopiesFromWGS84,
            ...$wgs84CopiesFromGDA94,
            ...$wgs84CopiesFromSIRGAS,
            ...$wgs84CopiesFromNZGD,
            ...$projectedToProjected,
        ];
    }

    private function determineOperationsToWGS84CopiedFromETRS89(): array
    {
        $sql = "
            SELECT DISTINCT wgs84.coord_op_code
            FROM epsg_coordoperation wgs84
            JOIN epsg_coordoperation etrs89 ON etrs89.source_crs_code = wgs84.source_crs_code AND etrs89.target_crs_code IN (4936, 4258, 4937)
            JOIN epsg_usage u ON wgs84.coord_op_code = u.object_code AND u.object_table_name = 'epsg_coordoperation' AND u.scope_code = 1252
            WHERE wgs84.target_crs_code IN (4978,4326,4979)
            ";

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[] = $row['coord_op_code'];
        }

        return $data;
    }

    private function determineOperationsToETRS89CopiedFromWGS84(): array
    {
        $sql = "
            SELECT DISTINCT etrs89.coord_op_code
            FROM epsg_coordoperation etrs89
            JOIN epsg_coordoperation wgs84 ON wgs84.source_crs_code = etrs89.source_crs_code AND wgs84.target_crs_code IN (4978,4326,4979)
            JOIN epsg_usage u ON etrs89.coord_op_code = u.object_code AND u.object_table_name = 'epsg_coordoperation' AND u.scope_code = 1252
            WHERE etrs89.target_crs_code IN (4936, 4258, 4937)
            ";

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[] = $row['coord_op_code'];
        }

        return $data;
    }

    private function determineOperationsToWGS84CopiedFromGDA94(): array
    {
        $sql = "
            SELECT DISTINCT wgs84.coord_op_code
            FROM epsg_coordoperation wgs84
            JOIN epsg_coordoperation gda94 ON gda94.source_crs_code = wgs84.source_crs_code AND gda94.target_crs_code IN (4283, 4938, 4939)
            JOIN epsg_usage u ON wgs84.coord_op_code = u.object_code AND u.object_table_name = 'epsg_coordoperation' AND u.scope_code = 1252
            WHERE wgs84.target_crs_code IN (4978,4326,4979)
            ";

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[] = $row['coord_op_code'];
        }

        return $data;
    }

    private function determineOperationsToWGS84CopiedFromSIRGAS(): array
    {
        $sql = "
            SELECT DISTINCT wgs84.coord_op_code
            FROM epsg_coordoperation wgs84
            JOIN epsg_coordoperation sirgas ON sirgas.source_crs_code = wgs84.source_crs_code AND sirgas.target_crs_code IN (4674, 4988, 4989, 4686, 4996, 4997)
            JOIN epsg_usage u ON wgs84.coord_op_code = u.object_code AND u.object_table_name = 'epsg_coordoperation' AND u.scope_code = 1252
            WHERE wgs84.target_crs_code IN (4978,4326,4979)
            ";

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[] = $row['coord_op_code'];
        }

        return $data;
    }

    private function determineOperationsToWGS84CopiedFromNZGD2000(): array
    {
        $sql = "
            SELECT DISTINCT wgs84.coord_op_code
            FROM epsg_coordoperation wgs84
            JOIN epsg_coordoperation nzgd ON nzgd.source_crs_code = wgs84.source_crs_code AND nzgd.target_crs_code IN (4167, 4958, 4959)
            JOIN epsg_usage u ON wgs84.coord_op_code = u.object_code AND u.object_table_name = 'epsg_coordoperation' AND u.scope_code = 1252
            WHERE wgs84.target_crs_code IN (4978,4326,4979)
            ";

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[] = $row['coord_op_code'];
        }

        return $data;
    }

    private function determineOperationsProjectedToProjected(): array
    {
        $sql = "
            SELECT o.coord_op_code
            FROM epsg_coordoperation o
            JOIN epsg_coordinatereferencesystem s ON o.source_crs_code = s.coord_ref_sys_code AND s.coord_ref_sys_kind = 'projected'
            JOIN epsg_coordinatereferencesystem t ON o.target_crs_code = t.coord_ref_sys_code AND t.coord_ref_sys_kind = 'projected'
            ";

        $result = $this->sqlite->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[] = $row['coord_op_code'];
        }

        return $data;
    }
}
