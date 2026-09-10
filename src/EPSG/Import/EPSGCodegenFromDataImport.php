<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

use Composer\InstalledVersions;
use Composer\Pcre\Preg;
use Exception;
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
use PHPCoord\Geometry\GeoJSON\GeoJSON;
use PHPCoord\Geometry\RegionMap;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Rate;
use PHPCoord\UnitOfMeasure\Scale\Scale;
use PHPCoord\UnitOfMeasure\Time\Time;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\CloningVisitor;
use PhpParser\ParserFactory;
use ReflectionClassConstant;
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
use function is_dir;
use function lcfirst;
use function str_contains;
use function str_ends_with;
use function str_replace;
use function strlen;
use function strtolower;
use function substr;
use function ucwords;
use function unlink;
use function var_export;
use function basename;
use function addcslashes;
use function preg_replace;
use function array_keys;
use function microtime;
use function printf;
use function array_intersect_key;
use function array_filter;
use function array_intersect;
use function is_string;
use function preg_match;
use function preg_match_all;

use const SQLITE3_ASSOC;
use const SQLITE3_OPEN_READONLY;
use const PHP_EOL;

class EPSGCodegenFromDataImport
{
    private string $sourceDir;

    private SQLite3 $dataDB;

    private SQLite3 $extentDB;

    private Codegen $codeGen;

    private ?array $blacklistedOperationsCache = null;

    private const BLACKLISTED_METHODS = [
        // only distributed as .dll, can't use
        1036, // Cartesian Grid Offsets from Form Function
        1040, // GNTRANS

        // replaced by NADCON5
        9613, // NADCON,

        // Exclusively marine
        9620, // Norway Offshore Interpolation
        9634, // Maritime Provinces polynomial interpolation

        // Complex, very little accuracy improvement
        1079, // New Zealand Deformation Model
    ];

    /**
     * Pipelines that reverse by running their steps backwards. Each step reverses itself, so the
     * registry's sign-flip must not be applied as well or that step is reversed twice.
     * A method belongs here when it delegates to a step that reverses by formula while the registry
     * marks that step's parameters as sign-reversing.
     */
    private const METHODS_WHOSE_STEPS_REVERSE_THEMSELVES = [
        1143 => true, // Position Vector (geocen) & Geocen translations NEU velocities (gtg)
    ];

    private const BLACKLISTED_OPERATIONS = [
        // replaced by OSTN15
        7710, // OSTN15 (NTv2)
        11509, // OSTN15 (NTv2)

        // Complex, only used for converting a couple of ancient Finland/Norway systems
        10703, // YKJ to ETRS-TM35FIN TIN
        10704, // N43 height to N60 height TIN
        10705, // N60 height to N2000 height TIN
        10854, // ETRS89 to NGO 1948 TIN
        11555, // ETRS89-NOR to NGO 1948 TIN

        // replaced by IGN2009
        10000, // RGF93 v1 to NGF-IGN69 (ggf97a) → 8371 RAF
        10002, // RGF93 v1 to NGF-IGN78 (ggf97a_corse) → 8372 RAC09

        // replaced by all-Australia combination files
        1234, // NTv2 vic_0799.gsb

        // replaced by RAF20
        9787, // IGNF RAF18b.mnt

        // replaced by RAF18b
        8885, // IGNF RAF18.mnt
        9638, // IGNF RAF18.mnt

        // replaced by RAF18
        8371, // IGNF RAF09.mnt
        9639, // IGNF RAF09.mnt

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

        // Grids are updated weekly, not sustainable to distribute
        10929, // SOPAC deformation model for California v1

        // Very large, only really of scientific use
        3858, // EGM2008 Und_min2.5x2.5_egm2008_isw=82_WGS84_TideFree.gz
        3859, // EGM2008 Und_min1x1_egm2008_isw=82_WGS84_TideFree.gz
        7891, // EGM2008 Und_min2.5x2.5_egm2008_isw=82_WGS84_TideFree.gz
        8037, // EGM2008 Und_min1x1_egm2008_isw=82_WGS84_TideFree.gz
        9617, // EGM2008 Und_min2.5x2.5_egm2008_isw=82_WGS84_TideFree.gz
        9618, // EGM2008 Und_min1x1_egm2008_isw=82_WGS84_TideFree.gz
        9704, // EGM2008 Und_min2.5x2.5_egm2008_isw=82_WGS84_TideFree.gz
        9706, // EGM2008 Und_min1x1_egm2008_isw=82_WGS84_TideFree.gz
        10614, // EGM2008 Und_min2.5x2.5_egm2008_isw=82_WGS84_TideFree.gz

        // Not available for public download
        9305, // GTX INAGEOID2020v1.gtx
        9375, // INADEFORM v3_dm_grd01_xyz.dat
        11034, // INADEFORM v3_dm_grd01_xyz.dat
        9629, // GTX INAGEOID2020v1.gtx
        10144, // GTX INAGEOID2020v2.gtx
        10145, // GTX INAGEOID2020v2.gtx
        11273, // GTX INAGEOID2020v2.gtx
        11275, // GTX INAGEOID2020v2.gtx
        5626, // KMS fehmarn_geoid10.gri
        9619, // KMS fehmarn_geoid10.gri
        9355, // KMS KSA-GEOID17.gra
        9620, // KMS KSA-GEOID17.gra
        10775, // KMS KSA-GEOID21.gra
        10776, // KMS KSA-GEOID21.gra
        9979, // NTv2 SIRGAS1995-to-SIRGAS2000.gsb
        9980, // NTv2 SIRGAS2000-to-SIRGAS-CONSIR17P01.gsb
        10368, // KNGeoid18.gri
        10369, // KNGeoid18.gri
        10663, // NTv2 hu_sgo_hd72corr.gsb
        11538, // NTv2 hu_sgo_hd72corr.gsb
        10661, // GTG hu_sgo_vitel2014.tif
        10662, // GTG hu_sgo_vitel2014.tif
        11534, // GTG hu_sgo_vitel2014.tif
        11535, // GTG hu_sgo_vitel2014.tif
        10964, // NTv2 qazgrid_kz.gsb
        11433, // NTv2 gr3dpf25.gsb
        10866, // TXT SEPARATION.TXT
        10867, // TXT SEPARATION.TXT
        4566, // TXT ggg00_ld.txt
        5507, // TXT gg10_ld.txt

        // Construction/engineering/scientific projects not of general use
        9304, // OSNet v2009 to HS2-VRF height (HS2GM15W.grd)
        9363, // IGNF ARAMCO_AAA-KSAGRF_6.tac
        10990, // OSNet v2009 to London Survey Grid height (LSGGM2025.grd)
        10998, // OSNet v2009 to OSNet v2009 + LSG height (LSGGM2025.grd)
        11467, // NTv2 TN15-ETRS89-to-SZCTW-IRF.gsb

        // free to download, no license to permit redistribution
        6138, // Cayman GCGM0811.TXT
        6139, // Cayman LCGM0811.TXT
        6140, // Cayman CBGM0811.TXT
        9602, // Cayman CBGM0811.TXT compound
        9603, // Cayman GCGM0811.TXT compound
        9604, // Cayman LCGM0811.TXT compound
        9112, // NTv2 BC_27_98.GSB
        9114, // NTv2 NVI27_05.GSB
        9116, // NTv2 BC_93_98.GSB
        9120, // NTv2 CRD98_00.GSB
        9121, // NTv2 NVI98_05.GSB
        9122, // NTv2 BC_98_05.GSB
        9496, // NTv2 MGI1901_TO_SRBETRS89_NTv2.gsb
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
        10615, // NTv2 BC_98_05.GSB
        10822, // ASC ch_2019z.asc
        10823, // ASC ch_2019m.asc
        12207, // dE_2km_V1.0.grd, dN_2km_V1.0.grd
        11337, // NTv2 d03tod23.gsb
        11339, // GTX drukgeoid2022.gtx
        11384, // GTX drukgeoid2022.gtx
        11203, // NTv2 R16_to_R25.gsb

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
        12246, // GRD geo_igm_mar06.grd
        12247, // GRD geo_igm_mar06.grd
        12249, // GRD geo_igm_mar06.grd
        12250, // GRD geo_igm_mar06.grd
        10152, // TXT VORF-UK08_ETRF_to_MSL.vrf
        10153, // TXT VORF-UK08_ETRF_to_CD.vrf
        10154, // TXT VORF-UK08_ETRF_to_MSL.vrf
        10155, // TXT VORF-UK08_ETRF_to_CD.vrf
    ];

    private const BLACKLISTED_OPERATION_SCOPES = [
        1029, // Engineering survey
        1138, // Engineering survey, harbour hydrography.
        1139, // Engineering survey and construction for Fehmarnbelt tunnel.
        1140, // Engineering survey for onshore facilities for South Pars phase 11 and Pars LNG.
        1141, // Engineering survey and topographic mapping for railway applications.
        1145, // Engineering survey 2011 to 2015.
        1149, // Exploration and production operations in Brunei. Formerly also topographic mapping (large and medium scale) and engineering survey.
        1196, // Highway engineering.
        1206, // KOC survey control and facilities engineering.
        1229, // Engineering design concept visualisation.
        1260, // Engineering survey for HS2 project phases 1 and 2a.
        1265, // Hydrography, drilling, offshore engineering.
        1271, // Engineering survey and mapping for the Trans-Europe Lyon-Turin (TELT) railway project.
        1285, // Engineering survey and mapping for the Brenner base tunnel (BBT) railway project.
        1286, // Mapping and data analysis for Texas Water Development Board groundwater modeling.
        1291, // Reference surface for depths in BSHC offshore products for the Baltic Sea.
        1293, // Engineering survey and topographic mapping related to the Woodsmith mine project.
        1297, // Engineering survey and topographic mapping for transport applications.
    ];

    public function __construct()
    {
        $this->sourceDir = dirname(__DIR__, 2);
        $this->codeGen = new Codegen();

        $this->dataDB = new SQLite3(
            __DIR__ . '/../../../resources/epsg/epsg.sqlite',
            SQLITE3_OPEN_READONLY
        );
        $this->dataDB->enableExceptions(true);

        $this->extentDB = new SQLite3(
            __DIR__ . '/../../../resources/epsg/extents.sqlite',
            SQLITE3_OPEN_READONLY
        );
        $this->extentDB->enableExceptions(true);
    }

    public function getCodegen(): Codegen
    {
        return $this->codeGen;
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

        $result = $this->dataDB->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/UnitOfMeasure/Angle/Angle.php', $data);
        $constants = $this->codeGen->updateFileConstants($this->sourceDir . '/UnitOfMeasure/Angle/Angle.php', $data, 'public');
        $this->codeGen->updateDocs(Angle::class, $data, $constants);

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

        $result = $this->dataDB->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/UnitOfMeasure/Length/Length.php', $data);
        $constants = $this->codeGen->updateFileConstants($this->sourceDir . '/UnitOfMeasure/Length/Length.php', $data, 'public');
        $this->codeGen->updateDocs(Length::class, $data, $constants);

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

        $result = $this->dataDB->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/UnitOfMeasure/Scale/Scale.php', $data);
        $constants = $this->codeGen->updateFileConstants($this->sourceDir . '/UnitOfMeasure/Scale/Scale.php', $data, 'public');
        $this->codeGen->updateDocs(Scale::class, $data, $constants);

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

        $result = $this->dataDB->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/UnitOfMeasure/Time/Time.php', $data);
        $constants = $this->codeGen->updateFileConstants($this->sourceDir . '/UnitOfMeasure/Time/Time.php', $data, 'public');
        $this->codeGen->updateDocs(Time::class, $data, $constants);

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

        $result = $this->dataDB->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/UnitOfMeasure/Rate.php', $data);
        $constants = $this->codeGen->updateFileConstants($this->sourceDir . '/UnitOfMeasure/Rate.php', $data, 'public');
        $this->codeGen->updateDocs(Rate::class, $data, $constants);

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

        $result = $this->dataDB->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/UnitOfMeasure/UnitOfMeasure.php', $data);
        $this->codeGen->updateFileConstants($this->sourceDir . '/UnitOfMeasure/UnitOfMeasure.php', $data, 'public');
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

        $result = $this->dataDB->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/Datum/PrimeMeridian.php', $data);
        $constants = $this->codeGen->updateFileConstants($this->sourceDir . '/Datum/PrimeMeridian.php', $data, 'public');
        $this->codeGen->updateDocs(PrimeMeridian::class, $data, $constants);
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

        $result = $this->dataDB->query($sql);
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
        $constants = $this->codeGen->updateFileConstants($this->sourceDir . '/Datum/Ellipsoid.php', $data, 'public');
        $this->codeGen->updateDocs(Ellipsoid::class, $data, $constants);
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
                d.anchor_epoch,
                d.origin_description || '\n' || d.remarks AS constant_help,
                GROUP_CONCAT(e.extent_name, '|') AS extent_name,
                GROUP_CONCAT(e.extent_description, '|') AS extent_description,
                d.origin_description || '\n' || d.remarks AS doc_help,
                d.deprecated,
                de.ensemble_accuracy
            FROM epsg_datum d
            JOIN epsg_usage u ON u.object_table_name = 'epsg_datum' AND u.object_code = d.datum_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_datum' AND dep.object_code = d.datum_code AND dep.deprecation_date <= '2021-09-10'
            LEFT JOIN epsg_datumensemble de ON de.datum_ensemble_code = d.datum_code
            WHERE dep.deprecation_id IS NULL AND d.datum_type != 'engineering' AND d.datum_name NOT LIKE '%example%'
            GROUP BY d.datum_code
            ORDER BY name
        ";

        $result = $this->dataDB->query($sql);
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

                $ensembleResult = $this->dataDB->query($ensembleSql);
                while ($ensembleRow = $ensembleResult->fetchArray(SQLITE3_ASSOC)) {
                    $row['ensemble'][] = $ensembleRow['datum'];
                }
                $row['datum_accuracy'] = $row['ensemble_accuracy'] ?? null;
                unset($row['ensemble_accuracy']);
            }
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/Datum/Datum.php', $data);
        $constants = $this->codeGen->updateFileConstants($this->sourceDir . '/Datum/Datum.php', $data, 'public');
        $this->codeGen->updateDocs(Datum::class, $data, $constants);
    }

    public function generateDataCoordinateSystems(): void
    {
        /*
         * cartesian
         */
        $sql = "
            SELECT
                'urn:ogc:def:cs:EPSG::' || cs.coord_sys_code AS urn,
                REPLACE(REPLACE(cs.coord_sys_name, 'Cartesian ', ''), 'CS. ', '') || CASE cs.coord_sys_code WHEN 4531 THEN '_LOWERCASE' WHEN 1054 THEN '_LOWERCASE' ELSE '' END AS name,
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

        $result = $this->dataDB->query($sql);
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

            $axisResult = $this->dataDB->query($axisSql);
            while ($axisRow = $axisResult->fetchArray(SQLITE3_ASSOC)) {
                unset($axisRow['coord_sys']);
                $row['axes'][] = $axisRow;
            }
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateSystem/Cartesian.php', $data);
        $constants = $this->codeGen->updateFileConstants($this->sourceDir . '/CoordinateSystem/Cartesian.php', $data, 'public');
        $this->codeGen->updateDocs(Cartesian::class, $data, $constants);

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

        $result = $this->dataDB->query($sql);
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

            $axisResult = $this->dataDB->query($axisSql);
            while ($axisRow = $axisResult->fetchArray(SQLITE3_ASSOC)) {
                unset($axisRow['coord_sys']);
                $row['axes'][] = $axisRow;
            }
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateSystem/Ellipsoidal.php', $data);
        $constants = $this->codeGen->updateFileConstants($this->sourceDir . '/CoordinateSystem/Ellipsoidal.php', $data, 'public');
        $this->codeGen->updateDocs(Ellipsoidal::class, $data, $constants);

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

        $result = $this->dataDB->query($sql);
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

            $axisResult = $this->dataDB->query($axisSql);
            while ($axisRow = $axisResult->fetchArray(SQLITE3_ASSOC)) {
                unset($axisRow['coord_sys']);
                $row['axes'][] = $axisRow;
            }
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateSystem/Vertical.php', $data);
        $constants = $this->codeGen->updateFileConstants($this->sourceDir . '/CoordinateSystem/Vertical.php', $data, 'public');
        $this->codeGen->updateDocs(VerticalCS::class, $data, $constants);

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

        $result = $this->dataDB->query($sql);
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

            $axisResult = $this->dataDB->query($axisSql);
            while ($axisRow = $axisResult->fetchArray(SQLITE3_ASSOC)) {
                unset($axisRow['coord_sys']);
                $row['axes'][] = $axisRow;
            }
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateSystem/CoordinateSystem.php', $data);
        $this->codeGen->updateFileConstants($this->sourceDir . '/CoordinateSystem/CoordinateSystem.php', $data, 'public');
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
                GROUP_CONCAT(DISTINCT 'urn:ogc:def:area:EPSG::' || e.extent_code) AS extent,
                GROUP_CONCAT(e.extent_name, '|') AS extent_name,
                GROUP_CONCAT(e.extent_description, '|') AS extent_description,
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

        $result = $this->dataDB->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['extent'] = array_values(array_unique(explode(',', $row['extent'])));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/CompoundSRIDData.php', $data);
        $constants = $this->codeGen->updateFileConstants($this->sourceDir . '/CoordinateReferenceSystem/Compound.php', $data, 'public');
        $this->codeGen->updateDocs(Compound::class, $data, $constants);

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
                GROUP_CONCAT(DISTINCT 'urn:ogc:def:area:EPSG::' || e.extent_code) AS extent,
                GROUP_CONCAT(e.extent_name, '|') AS extent_name,
                GROUP_CONCAT(e.extent_description, '|') AS extent_description,
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

        $result = $this->dataDB->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['extent'] = array_values(array_unique(explode(',', $row['extent'])));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/GeocentricSRIDData.php', $data);
        $constants = $this->codeGen->updateFileConstants($this->sourceDir . '/CoordinateReferenceSystem/Geocentric.php', $data, 'public');
        $this->codeGen->updateDocs(Geocentric::class, $data, $constants);

        /*
         * geographic 2D
         */
        $sql = "
            SELECT
                'urn:ogc:def:crs:EPSG::' || crs.coord_ref_sys_code AS urn,
                crs.coord_ref_sys_name AS name,
                'urn:ogc:def:cs:EPSG::' || crs.coord_sys_code AS coordinate_system,
                'urn:ogc:def:crs:EPSG::' || crs.base_crs_code AS base_crs,
                'urn:ogc:def:datum:EPSG::' || COALESCE(crs.datum_code, crs_base.datum_code) AS datum,
                crs.remarks AS constant_help,
                GROUP_CONCAT(DISTINCT 'urn:ogc:def:area:EPSG::' || e.extent_code) AS extent,
                GROUP_CONCAT(e.extent_name, '|') AS extent_name,
                GROUP_CONCAT(e.extent_description, '|') AS extent_description,
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

        $result = $this->dataDB->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['extent'] = array_values(array_unique(explode(',', $row['extent'])));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/Geographic2DSRIDData.php', $data);
        $constants = $this->codeGen->updateFileConstants($this->sourceDir . '/CoordinateReferenceSystem/Geographic2D.php', $data, 'public');
        $this->codeGen->updateDocs(Geographic2D::class, $data, $constants);

        /*
         * geographic 3D
         */
        $sql = "
            SELECT
                'urn:ogc:def:crs:EPSG::' || crs.coord_ref_sys_code AS urn,
                crs.coord_ref_sys_name AS name,
                'urn:ogc:def:cs:EPSG::' || crs.coord_sys_code AS coordinate_system,
                'urn:ogc:def:crs:EPSG::' || crs.base_crs_code AS base_crs,
                'urn:ogc:def:datum:EPSG::' || COALESCE(crs.datum_code, crs_base.datum_code) AS datum,
                crs.remarks AS constant_help,
                GROUP_CONCAT(DISTINCT 'urn:ogc:def:area:EPSG::' || e.extent_code) AS extent,
                GROUP_CONCAT(e.extent_name, '|') AS extent_name,
                GROUP_CONCAT(e.extent_description, '|') AS extent_description,
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

        $result = $this->dataDB->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['extent'] = array_values(array_unique(explode(',', $row['extent'])));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/Geographic3DSRIDData.php', $data);
        $constants = $this->codeGen->updateFileConstants($this->sourceDir . '/CoordinateReferenceSystem/Geographic3D.php', $data, 'public');
        $this->codeGen->updateDocs(Geographic3D::class, $data, $constants);

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
                GROUP_CONCAT(DISTINCT 'urn:ogc:def:area:EPSG::' || e.extent_code) AS extent,
                GROUP_CONCAT(e.extent_name, '|') AS extent_name,
                GROUP_CONCAT(e.extent_description, '|') AS extent_description,
                crs.remarks AS doc_help,
                crs.deprecated
            FROM epsg_coordinatereferencesystem crs
            JOIN epsg_usage u ON u.object_table_name = 'epsg_coordinatereferencesystem' AND u.object_code = crs.coord_ref_sys_code
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            JOIN epsg_coordoperation o ON crs.projection_conv_code = o.coord_op_code AND o.coord_op_code NOT IN (" . implode(',', self::BLACKLISTED_OPERATIONS) . ') AND o.coord_op_method_code NOT IN (' . implode(',', self::BLACKLISTED_METHODS) . ")
            LEFT JOIN epsg_coordinatereferencesystem crs_base ON crs_base.coord_ref_sys_code = crs.base_crs_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2021-09-10'
            WHERE dep.deprecation_id IS NULL AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%' AND crs.coord_ref_sys_name NOT LIKE '%mining%'
            AND (crs.cmpd_horizcrs_code IS NULL OR crs.cmpd_horizcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind = 'engineering'))
            AND (crs.cmpd_vertcrs_code IS NULL OR crs.cmpd_vertcrs_code NOT IN (SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem WHERE coord_ref_sys_kind = 'engineering'))
            AND crs.coord_ref_sys_kind = 'projected'
            GROUP BY crs.coord_ref_sys_code
            ORDER BY name
            ";

        $result = $this->dataDB->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['extent'] = array_values(array_unique(explode(',', $row['extent'])));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/ProjectedSRIDData.php', $data);

        $projectedPath = $this->sourceDir . '/CoordinateReferenceSystem/Projected.php';

        /*
         * Because Projected constants are artificially split across multiple trait files
         * (for PHPStorm autocompletion performance), we use a three-phase approach that
         * keeps all the special chunking knowledge isolated here:
         *
         * 1. Pre-step: Inline all EPSG_* constants from the chunk traits into Projected.php
         *    so it looks like a normal single-file class to the core logic.
         * 2. Core: Run the normal updateFileConstants (with full alias harvesting) against
         *    Projected.php exactly like we do for any other class (Datum, etc.).
         * 3. Post-step: Extract the (new + aliased) constants back out of Projected.php,
         *    repartition them, write the 4 chunk trait files, and restore Projected.php
         *    to its clean state containing only `use` statements.
         *
         * This means the core aliasing / constant generation logic never needs to know
         * that Projected is chunked.
         */

        // Phase 1: Inline constants from the current chunk files into Projected.php
        $parser = (new ParserFactory())->createForNewestSupportedVersion();
        $traverser = new NodeTraverser();
        $traverser->addVisitor(new CloningVisitor());
        $stmts = $traverser->traverse($parser->parse(file_get_contents($projectedPath)));

        $inlineVisitor = new InlineProjectedConstantsVisitor($this->sourceDir);
        $traverser = new NodeTraverser();
        $traverser->addVisitor($inlineVisitor);
        $stmts = $traverser->traverse($stmts);

        // Write the temporarily expanded version so updateFileConstants can work on it
        $prettyPrinter = new ASTPrettyPrinter();
        file_put_contents($projectedPath, $prettyPrinter->prettyPrintFile($stmts));

        // Phase 2: Normal single-file processing (all alias logic works as usual)
        $constants = $this->codeGen->updateFileConstants($projectedPath, $data, 'public');

        // Phase 3: Extract constants back out, chunk them, write the trait files,
        // and clean up Projected.php to contain only the trait uses again.
        $stmts = $parser->parse(file_get_contents($projectedPath));

        $extractVisitor = new ExtractAndChunkProjectedConstantsVisitor(
            $this->sourceDir,
            4
        );
        $traverser = new NodeTraverser();
        $traverser->addVisitor($extractVisitor);
        $stmts = $traverser->traverse($stmts);

        // Write the cleaned Projected.php (should now only have the use statements)
        file_put_contents($projectedPath, $prettyPrinter->prettyPrintFile($stmts));

        $this->codeGen->updateDocs(Projected::class, $data, $constants);

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
                GROUP_CONCAT(DISTINCT 'urn:ogc:def:area:EPSG::' || e.extent_code) AS extent,
                GROUP_CONCAT(e.extent_name, '|') AS extent_name,
                GROUP_CONCAT(e.extent_description, '|') AS extent_description,
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

        $result = $this->dataDB->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row['extent'] = array_values(array_unique(explode(',', $row['extent'])));
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/VerticalSRIDData.php', $data);
        $constants = $this->codeGen->updateFileConstants($this->sourceDir . '/CoordinateReferenceSystem/Vertical.php', $data, 'public');
        $this->codeGen->updateDocs(Vertical::class, $data, $constants);

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
                GROUP_CONCAT(e.extent_name, '|') AS extent_name,
                GROUP_CONCAT(e.extent_description, '|') AS extent_description,
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

        $result = $this->dataDB->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[$row['urn']] = $row;
            unset($data[$row['urn']]['urn']);
        }

        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateReferenceSystem/CoordinateReferenceSystem.php', $data);
        $this->codeGen->updateFileConstants($this->sourceDir . '/CoordinateReferenceSystem/CoordinateReferenceSystem.php', $data, 'public');

        $crsCount = count(CoordinateReferenceSystem::getSupportedSRIDs());
        file_put_contents($this->sourceDir . '/../docs/reflection/numOfCRS.txt', implode("\n", ['.. |numOfCRS| replace:: ' . $crsCount]));
        file_put_contents($this->sourceDir . '/../README.md', Preg::replace('/<!-- numOfCRS -->\d+/', '<!-- numOfCRS -->' . $crsCount, file_get_contents($this->sourceDir . '/../README.md')));
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

        $result = $this->dataDB->query($sql);
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

            $paramResult = $this->dataDB->query($sql);
            while ($paramRow = $paramResult->fetchArray(SQLITE3_ASSOC)) {
                $paramName = self::makeParamName($paramRow['parameter_name']);
                $reverses = isset(self::METHODS_WHOSE_STEPS_REVERSE_THEMSELVES[(int) $row['method_code']])
                    ? false
                    : (bool) $paramRow['reverses'];
                $data[$row['urn']]['paramData'][$paramName] = [
                    'reverses' => $reverses,
                ];
            }
        }

        $constants = $this->codeGen->updateFileConstants($this->sourceDir . '/CoordinateOperation/CoordinateOperationMethods.php', $data, 'public');
        $this->codeGen->updateFileData($this->sourceDir . '/CoordinateOperation/CoordinateOperationMethods.php', $data);
        $implemented = (new ReflectionClassConstant(CoordinateOperationMethods::class, 'METHOD_CODE_TO_IMPLEMENTATION_LOOKUP'))->getValue();
        $this->codeGen->updateDocs(CoordinateOperationMethods::class, array_intersect_key($data, $implemented), $constants);
    }

    public function generateDataCoordinateOperations(): void
    {
        $filenameToProviderMap = require 'FilenameToProviderMap.php';

        $blackListedOperations = $this->getBlacklistedOperations();

        $sql = "
            SELECT
                'urn:ogc:def:coordinateOperation:EPSG::' || o.coord_op_code AS operation,
                o.coord_op_name AS name,
                'urn:ogc:def:crs:EPSG::' || o.source_crs_code AS source_crs,
                'urn:ogc:def:crs:EPSG::' || o.target_crs_code AS target_crs,
                COALESCE(o.coord_op_accuracy, 0) AS accuracy,
                GROUP_CONCAT(DISTINCT 'urn:ogc:def:area:EPSG::' || e.extent_code) AS extent,
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
                GROUP_CONCAT(DISTINCT 'urn:ogc:def:area:EPSG::' || e.extent_code) AS extent,
                '' AS doc_help
            FROM epsg_coordoperation o
            JOIN epsg_coordinatereferencesystem projcrs ON projcrs.projection_conv_code = o.coord_op_code AND projcrs.coord_ref_sys_kind NOT IN ('engineering', 'derived')
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

        $result = $this->dataDB->query($sql);
        $byRegion = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $extents = explode(',', $row['extent']);
            $regions = array_unique(array_map(static fn ($extent) => RegionMap::EXTENTS[$extent], $extents));
            assert(count($regions) === 1);
            unset($row['extent']);
            $byRegion[$regions[0]][] = $row;
        }

        $byRegion[RegionMap::REGION_EUROPE] = [...($byRegion[RegionMap::REGION_EUROPE] ?? []), ...$this->etrs89EnsembleMemberAliasTransformations()];

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
                GROUP_CONCAT(DISTINCT 'urn:ogc:def:area:EPSG::' || e.extent_code) AS extent,
                GROUP_CONCAT(e.extent_name, '|') AS extent_name,
                GROUP_CONCAT(e.extent_description, '|') AS extent_description,
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
                GROUP_CONCAT(DISTINCT 'urn:ogc:def:area:EPSG::' || e.extent_code) AS extent,
                GROUP_CONCAT(e.extent_name, '|') AS extent_name,
                GROUP_CONCAT(e.extent_description, '|') AS extent_description,
                o.remarks AS doc_help
            FROM epsg_coordoperation o
            JOIN epsg_coordinatereferencesystem projcrs ON projcrs.projection_conv_code = o.coord_op_code AND projcrs.coord_ref_sys_kind NOT IN ('engineering', 'derived')
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

        $result = $this->dataDB->query($sql);
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
            // The point methods do not take these, so they are left out of the generated parameter files.
            // They name an interpolation CRS, or an operation a grid reverse could call instead of iterating.
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
                    JOIN epsg_coordoperationparam p ON pv.parameter_code = p.parameter_code AND p.parameter_code NOT IN (1048, 1062, 1070, 1071)
                    WHERE operation_code = '{$operation}'
                    GROUP BY pv.coord_op_code, p.parameter_code
                    ORDER BY pu.sort_order
                    ";

            $paramsResult = $this->dataDB->query($paramsSql);
            while ($paramsRow = $paramsResult->fetchArray(SQLITE3_ASSOC)) {
                unset($paramsRow['operation_code']);
                $paramsRow['name'] = self::makeParamName($paramsRow['name']);
                $paramsRow['reverses'] = (bool) $paramsRow['reverses'];
                if (in_array($paramsRow['parameter_code'], [8659, 8660, 1037, 1048, 8661, 8662], true)) {
                    $paramsRow['value'] = 'urn:ogc:def:crs:EPSG::' . $paramsRow['value'];
                } elseif (in_array($paramsRow['parameter_code'], [1062], true)) {
                    $paramsRow['value'] = 'urn:ogc:def:coordinateOperation:EPSG::' . $paramsRow['value'];
                }
                // A grid file parameter must name a provider. An unsourced file is blacklisted instead of exported as a filename.
                if (
                    in_array(
                        $paramsRow['name'],
                        [
                            'eastingAndNorthingDifferenceFile',
                            'eastingDifferenceFile',
                            'geoidHeightCorrectionModelFile',
                            'geoidModelDifferenceFile',
                            'latitudeDifferenceFile',
                            'longitudeDifferenceFile',
                            'ellipsoidalHeightDifferenceFile',
                            'maritimeProvinceResidualFile',
                            'northingDifferenceFile',
                            'offsetsFile',
                            'pointMotionDisplacementEastGridFile',
                            'pointMotionDisplacementNorthGridFile',
                            'pointMotionDisplacementUpGridFile',
                            'pointMotionVelocityGridFile',
                            'tINOffsetFile',
                        ],
                        true
                    )
                    && $paramsRow['value']
                ) {
                    $filename = (string) $paramsRow['value'];
                    if (!isset($filenameToProviderMap[$filename])) {
                        throw new Exception($filename . ' has no entry in FilenameToProviderMap (' . $operation . ')');
                    }
                    $paramsRow['value'] = $filenameToProviderMap[$filename];
                    unset($paramsRow['uom']);
                }
                unset($paramsRow['parameter_code']);
                $params[$paramsRow['name']] = $paramsRow;
                unset($params[$paramsRow['name']]['name']);
            }
            if (isset($operationData['method']) && $operationData['method'] === CoordinateOperationMethods::EPSG_NADCON5_2D) {
                $params['ellipsoidalHeightDifferenceFile'] = ['value' => null];
            }

            $needsUnitOfMeasureFactory = false;
            foreach ($params as $paramData) {
                if (!empty($paramData['uom'])) {
                    $needsUnitOfMeasureFactory = true;
                    break;
                }
            }

            $output = "<?php\n\n/**\n * PHPCoord.\n *\n * @author Doug Wright\n */\ndeclare(strict_types=1);\n";
            if ($needsUnitOfMeasureFactory) {
                $output .= "use PHPCoord\\UnitOfMeasure\\UnitOfMeasureFactory;\n\n";
            } else {
                $output .= "\n";
            }
            $output .= "/** @internal */ return [\n";
            foreach ($params as $paramName => $paramData) {
                $output .= "    '{$paramName}' => ";
                if (isset($paramData['uom']) && $paramData['uom']) {
                    $output .= 'UnitOfMeasureFactory::makeUnit(' . self::exportParamValue($paramData['value']) . ', ' . var_export($paramData['uom'], true) . "),\n";
                } else {
                    $output .= self::exportParamValue($paramData['value']) . ",\n";
                }
            }
            $output .= "];\n";

            $paramFilename = $this->sourceDir . '/CoordinateOperation/Params/' . str_replace(':', '', str_replace('urn:ogc:def:coordinateOperation:', '', $operation)) . '.php';
            file_put_contents($paramFilename, $output);
            $paramsSeen[$paramFilename] = $paramFilename;
        }

        // Remove unused param files
        foreach (glob($this->sourceDir . '/CoordinateOperation/Params/EPSG*.php') as $filename) {
            if (!isset($paramsSeen[$filename])) {
                unlink($filename);
            }
        }
        $this->codeGen->generateSupportedOperations();
        $this->removeUnusedDatapackFiles();
    }

    /**
     * A datapack resource stays when a provider class named by a generated operation,
     * by other library code, or by a test loads that file.
     */
    private function removeUnusedDatapackFiles(): void
    {
        echo 'Removing unused datapack files...';

        $usedProviders = $this->providerNamesInUse();
        $keptResources = [];
        $removedProviders = [];

        foreach (RegionMap::PACKAGES as $package) {
            if ($package === 'php-coord/php-coord') {
                continue;
            }
            $installPath = InstalledVersions::getInstallPath($package);
            if (!$installPath) {
                continue;
            }

            foreach (glob($installPath . '/src/CoordinateOperation/*Provider.php') ?: [] as $providerFile) {
                $class = basename($providerFile, '.php');
                $source = file_get_contents($providerFile);
                preg_match_all("/resources\\/([^'\"]+)/", $source, $matches);
                if (isset($usedProviders[$class])) {
                    foreach ($matches[1] as $resource) {
                        $keptResources[strtolower(str_replace('\\', '/', $resource))] = true;
                    }
                    continue;
                }
                unlink($providerFile);
                $removedProviders[$class] = true;
                echo PHP_EOL . '  ' . $package . ' ' . $class;
            }

            $resourceRoot = str_replace('\\', '/', $installPath . '/resources/');
            foreach ($this->filesUnder($installPath . '/resources') as $resourceFile) {
                $relative = substr(str_replace('\\', '/', $resourceFile), strlen($resourceRoot));
                if (isset($keptResources[strtolower($relative)])) {
                    continue;
                }
                unlink($resourceFile);
                echo PHP_EOL . '  ' . $package . ' ' . $relative;
            }
        }

        if ($removedProviders) {
            $this->removeProviderMapEntries(array_keys($removedProviders));
        }

        echo PHP_EOL . 'done' . PHP_EOL;
    }

    /**
     * @return array<string, true>
     */
    private function providerNamesInUse(): array
    {
        $names = [];
        $directories = [
            $this->sourceDir,
            dirname($this->sourceDir) . '/tests',
        ];
        foreach (RegionMap::PACKAGES as $package) {
            if ($package === 'php-coord/php-coord') {
                continue;
            }
            $tests = InstalledVersions::getInstallPath($package) . '/tests';
            if (is_dir($tests)) {
                $directories[] = $tests;
            }
        }

        foreach ($directories as $directory) {
            foreach ($this->filesUnder($directory) as $path) {
                if (!str_ends_with($path, '.php')) {
                    continue;
                }
                $normalised = str_replace('\\', '/', $path);
                if (str_contains($normalised, '/EPSG/Import/')) {
                    continue;
                }
                $source = file_get_contents($path);
                if (!preg_match_all('/([A-Za-z0-9]+Provider)/', $source, $matches)) {
                    continue;
                }
                foreach ($matches[1] as $name) {
                    $names[$name] = true;
                }
            }
        }

        return $names;
    }

    /**
     * @param list<string> $classNames
     */
    private function removeProviderMapEntries(array $classNames): void
    {
        $path = $this->sourceDir . '/EPSG/Import/FilenameToProviderMap.php';
        $contents = file_get_contents($path);
        foreach ($classNames as $className) {
            $contents = preg_replace(
                '/^.*CoordinateOperation\\\\' . $className . '::class.*\R/m',
                '',
                $contents
            );
        }
        file_put_contents($path, $contents);
    }

    /**
     * @return list<string>
     */
    private function filesUnder(string $directory): array
    {
        if (!is_dir($directory)) {
            return [];
        }

        $files = [];
        foreach (glob($directory . '/*') ?: [] as $path) {
            if (is_dir($path)) {
                foreach ($this->filesUnder($path) as $nested) {
                    $files[] = $nested;
                }
                continue;
            }
            $files[] = $path;
        }

        return $files;
    }

    public function generateExtents(): void
    {
        echo 'Updating extents...';

        $boundingBoxOnly = $this->sourceDir . '/Geometry/Extents/BoundingBoxOnly/';

        $sql = "
            SELECT e.extent_code, e.extent_name, e.revision_date, 'urn:ogc:def:area:EPSG::' || e.extent_code AS extent_urn
            FROM epsg_coordinatereferencesystem crs
            JOIN epsg_usage u ON u.object_code = crs.coord_ref_sys_code AND u.object_table_name = 'epsg_coordinatereferencesystem'
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordinatereferencesystem' AND dep.object_code = crs.coord_ref_sys_code AND dep.deprecation_date <= '2020-12-14'
            WHERE dep.deprecation_id IS NULL AND e.deprecated = 0
            AND crs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND crs.coord_ref_sys_name NOT LIKE '%example%' AND crs.coord_ref_sys_name NOT LIKE '%mining%'

            UNION

            SELECT e.extent_code, e.extent_name, e.revision_date, 'urn:ogc:def:area:EPSG::' || e.extent_code AS extent_urn
            FROM epsg_coordoperation o
            JOIN epsg_coordinatereferencesystem sourcecrs ON sourcecrs.coord_ref_sys_code = o.source_crs_code AND sourcecrs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND sourcecrs.deprecated = 0
            JOIN epsg_usage u ON u.object_code = o.coord_op_code AND u.object_table_name = 'epsg_coordoperation'
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code AND dep.deprecation_date <= '2020-12-14'
            LEFT JOIN epsg_supersession s ON s.object_table_name = 'epsg_coordoperation' AND s.object_code = o.coord_op_code
            WHERE dep.deprecation_id IS NULL AND e.deprecated = 0 AND s.supersession_id IS NULL
            AND o.coord_op_type != 'conversion' AND o.coord_op_type != 'concatenated operation' AND o.coord_op_name NOT LIKE '%example%' AND o.coord_op_name NOT LIKE '%mining%'
            AND o.coord_op_method_code NOT IN (" . implode(',', self::BLACKLISTED_METHODS) . ')
            AND o.coord_op_code NOT IN (' . implode(',', $this->getBlacklistedOperations()) . ")

            UNION

            SELECT e.extent_code, e.extent_name, e.revision_date, 'urn:ogc:def:area:EPSG::' || e.extent_code AS extent_urn
            FROM epsg_coordoperation o
            JOIN epsg_coordinatereferencesystem projcrs ON projcrs.projection_conv_code = o.coord_op_code AND projcrs.coord_ref_sys_kind NOT IN ('engineering', 'derived') AND projcrs.deprecated = 0
            JOIN epsg_usage u ON u.object_code = o.coord_op_code AND u.object_table_name = 'epsg_coordoperation'
            JOIN epsg_extent e ON u.extent_code = e.extent_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code AND dep.deprecation_date <= '2020-12-14'
            LEFT JOIN epsg_supersession s ON s.object_table_name = 'epsg_coordoperation' AND s.object_code = o.coord_op_code
            WHERE dep.deprecation_id IS NULL AND e.deprecated = 0 AND s.supersession_id IS NULL
            AND o.coord_op_type = 'conversion' AND o.coord_op_type != 'concatenated operation' AND o.coord_op_name NOT LIKE '%example%' AND o.coord_op_name NOT LIKE '%mining%'
            AND o.coord_op_method_code NOT IN (" . implode(',', self::BLACKLISTED_METHODS) . ')
            AND o.coord_op_code NOT IN (' . implode(',', $this->getBlacklistedOperations()) . ')

            GROUP BY e.extent_code
        ';
        $result = $this->dataDB->query($sql);

        $extents = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $extents[$row['extent_code']] = $row;

            if (!isset(RegionMap::EXTENTS[$row['extent_urn']])) {
                throw new Exception("Unknown region for {$row['extent_urn']}:{$row['extent_name']}");
            }
        }

        $sql = '
            SELECT extent_code, bbox, buffered
            FROM extent
            WHERE extent_code IN (' . implode(',', array_keys($extents)) . ')
        ';
        $result = $this->extentDB->query($sql);

        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $extentCode = (int) $row['extent_code'];
            $extent = $extents[$extentCode];

            $region = RegionMap::EXTENTS[$extent['extent_urn']];

            $bboxGeoJSON = $row['bbox'];
            $bboxGeoJSON = $this->addMetaDataToGeoJSON($bboxGeoJSON, $extent['extent_urn'], "{$region}/{$extent['extent_name']}");
            $bboxGeoJSON = GeoJSON::format($bboxGeoJSON);

            $bufferedGeoJSON = $row['buffered'];
            $bufferedGeoJSON = $this->addMetaDataToGeoJSON($bufferedGeoJSON, $extent['extent_urn'], "{$region}/{$extent['extent_name']}");
            $bufferedGeoJSON = GeoJSON::format($bufferedGeoJSON);

            $baseDir = InstalledVersions::getInstallPath(RegionMap::PACKAGES[$region]) . '/src/Geometry/Extents/';

            $bufferedFilename = $baseDir . "{$extentCode}.json";
            $bboxFilename = $boundingBoxOnly . "{$extentCode}.json";

            file_put_contents($bufferedFilename, $bufferedGeoJSON);

            if ($region !== RegionMap::REGION_GLOBAL) {
                file_put_contents($bboxFilename, $bboxGeoJSON);
            }
        }

        // Remove unused extents
        foreach (glob($boundingBoxOnly . '/[0-9]*.json') as $filename) {
            $code = basename($filename, '.json');
            if (!isset($extents[$code])) {
                unlink($filename);
            }
        }
        foreach (RegionMap::PACKAGES as $package) {
            $baseDir = InstalledVersions::getInstallPath($package) . '/src/Geometry/Extents/';
            foreach (glob($baseDir . '/[0-9]*.json') as $filename) {
                $code = basename($filename, '.json');
                if (!isset($extents[$code])) {
                    unlink($filename);
                }
            }
        }

        echo 'done' . PHP_EOL;
    }

    protected static function exportParamValue(mixed $value): string
    {
        return $value === null ? 'null' : var_export($value, true);
    }

    protected static function makeParamName(string $string): string
    {
        $string = str_replace([' ', '-', '(', ')', '"'], '', ucwords($string, ' -()"'));
        if (!Preg::match('/^(EPSG|[ABC][uv\d])/', $string)) {
            $string = lcfirst($string);
        }

        if (in_array($string, ['latitudeAndLongitudeDifferenceFile', 'geocentricTranslationFile', 'verticalOffsetFile', 'geoidModelDifferenceFile'], true)) {
            $string = 'offsetsFile';
        }

        return $string;
    }

    /**
     * One-way aliases from each ETRS89 ensemble-member CRS onto the equivalent ensemble CRS.
     *
     * @return array<int, array{operation: string, name: string, source_crs: string, target_crs: string, accuracy: float}>
     */
    private function etrs89EnsembleMemberAliasTransformations(): array
    {
        $accuracy = $this->dataDB->querySingle('SELECT ensemble_accuracy FROM epsg_datumensemble WHERE datum_ensemble_code = 6258');
        if ($accuracy === false || $accuracy === null) {
            return [];
        }
        $accuracy = (float) $accuracy;

        $memberCodes = [];
        $result = $this->dataDB->query('SELECT datum_code FROM epsg_datumensemblemember WHERE datum_ensemble_code = 6258');
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $memberCodes[] = (int) $row['datum_code'];
        }
        if ($memberCodes === []) {
            return [];
        }

        $in = implode(',', $memberCodes);
        $operation = 'urn:ogc:def:coordinateOperation:EPSG::32781';
        $name = 'ETRS89 ensemble member to ETRS89';
        $kindToEnsemble = [
            'geographic 2D' => 4258,
            'geographic 3D' => 4937,
            'geocentric' => 4936,
        ];
        $aliases = [];

        $sql = "
            SELECT coord_ref_sys_code, coord_ref_sys_kind
            FROM epsg_coordinatereferencesystem
            WHERE deprecated = 0
              AND datum_code IN ({$in})
              AND coord_ref_sys_kind IN ('geographic 2D', 'geographic 3D', 'geocentric')
              AND coord_ref_sys_code NOT IN (4258, 4937, 4936)
        ";
        $result = $this->dataDB->query($sql);
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $aliases[] = [
                'operation' => $operation,
                'name' => $name,
                'source_crs' => 'urn:ogc:def:crs:EPSG::' . $row['coord_ref_sys_code'],
                'target_crs' => 'urn:ogc:def:crs:EPSG::' . $kindToEnsemble[$row['coord_ref_sys_kind']],
                'accuracy' => $accuracy,
            ];
        }

        $sql = "
            SELECT c.coord_ref_sys_code AS member_compound, c.cmpd_vertcrs_code AS vertical
            FROM epsg_coordinatereferencesystem c
            JOIN epsg_coordinatereferencesystem h ON h.coord_ref_sys_code = c.cmpd_horizcrs_code
            WHERE c.deprecated = 0 AND c.coord_ref_sys_kind = 'compound'
              AND h.deprecated = 0 AND h.datum_code IN ({$in})
        ";
        $result = $this->dataDB->query($sql);
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $ensembleCompound = $this->dataDB->querySingle(
                'SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem
                 WHERE deprecated = 0 AND coord_ref_sys_kind = \'compound\'
                   AND cmpd_horizcrs_code = 4258 AND cmpd_vertcrs_code = ' . (int) $row['vertical']
            );
            if (!$ensembleCompound) {
                continue;
            }
            $aliases[] = [
                'operation' => $operation,
                'name' => $name,
                'source_crs' => 'urn:ogc:def:crs:EPSG::' . $row['member_compound'],
                'target_crs' => 'urn:ogc:def:crs:EPSG::' . $ensembleCompound,
                'accuracy' => $accuracy,
            ];
        }

        return $aliases;
    }

    public function getBlacklistedOperations(): array
    {
        if ($this->blacklistedOperationsCache === null) {
            $wgs84CopiesFromETRS89 = $this->determineOperationsToWGS84CopiedFromETRS89();
            $etrs89CopiesFromWGS84 = $this->determineOperationsToETRS89CopiedFromWGS84();
            $wgs84CopiesFromGDA94 = $this->determineOperationsToWGS84CopiedFromGDA94();
            $wgs84CopiesFromSIRGAS = $this->determineOperationsToWGS84CopiedFromSIRGAS();
            $wgs84CopiesFromNZGD = $this->determineOperationsToWGS84CopiedFromNZGD2000();
            $projectedToProjected = $this->determineOperationsProjectedToProjected();
            $blacklistedByScope = $this->determineOperationsInBlacklistedScopes();

            $this->blacklistedOperationsCache = [
                ...self::BLACKLISTED_OPERATIONS,
                ...$this->determineGridDepthOperations(),
                ...$this->determineNonGridOperationsWithBetterSameExtentAlternative(),
                ...$blacklistedByScope,
                ...$wgs84CopiesFromETRS89,
                ...$etrs89CopiesFromWGS84,
                ...$wgs84CopiesFromGDA94,
                ...$this->determineOperationsToWGS84FromReplacedRealization(),
                ...$wgs84CopiesFromSIRGAS,
                ...$wgs84CopiesFromNZGD,
                ...$projectedToProjected,
            ];
        }

        return $this->blacklistedOperationsCache;
    }

    private function determineOperationsToWGS84CopiedFromETRS89(): array
    {
        $sql = "
            SELECT DISTINCT wgs84.coord_op_code
            FROM epsg_coordoperation wgs84
            JOIN epsg_coordoperation etrs89 ON etrs89.source_crs_code = wgs84.source_crs_code AND etrs89.target_crs_code IN (4936, 4258, 4937) AND etrs89.data_source != 'PHPCoord' AND etrs89.deprecated = 0
            JOIN epsg_usage u ON wgs84.coord_op_code = u.object_code AND u.object_table_name = 'epsg_coordoperation' AND u.scope_code = 1252
            WHERE wgs84.target_crs_code IN (4978,4326,4979) AND wgs84.data_source != 'PHPCoord'
            ";

        $result = $this->dataDB->query($sql);
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
            JOIN epsg_coordoperation wgs84 ON wgs84.source_crs_code = etrs89.source_crs_code AND wgs84.target_crs_code IN (4978,4326,4979) AND wgs84.data_source != 'PHPCoord' AND wgs84.deprecated = 0
            JOIN epsg_usage u ON etrs89.coord_op_code = u.object_code AND u.object_table_name = 'epsg_coordoperation' AND u.scope_code = 1252
            WHERE etrs89.target_crs_code IN (4936, 4258, 4937) AND etrs89.data_source != 'PHPCoord'
            ";

        $result = $this->dataDB->query($sql);
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
            JOIN epsg_coordoperation gda94 ON gda94.source_crs_code = wgs84.source_crs_code AND gda94.target_crs_code IN (4283, 4938, 4939) AND gda94.deprecated = 0
            JOIN epsg_usage u ON wgs84.coord_op_code = u.object_code AND u.object_table_name = 'epsg_coordoperation' AND u.scope_code = 1252
            WHERE wgs84.target_crs_code IN (4978,4326,4979)
            UNION
            SELECT DISTINCT wgs84.coord_op_code
            FROM epsg_coordoperation wgs84
            JOIN epsg_coordoperation gda2020 ON gda2020.source_crs_code = wgs84.source_crs_code
              AND gda2020.target_crs_code IN (7844, 7843, 7842) AND gda2020.deprecated = 0
            WHERE wgs84.target_crs_code IN (4978,4326,4979)
              AND wgs84.source_crs_code IN (4283, 4938, 4939)
              AND wgs84.deprecated = 0
            ";

        $result = $this->dataDB->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[] = $row['coord_op_code'];
        }

        return $data;
    }

    /**
     * Drop A→WGS 84 when datum B replaces datum A, A→B and B→WGS 84 exist, and A→WGS 84 is no more accurate than B→WGS 84 on a shared extent.
     *
     * @return list<int>
     */
    private function determineOperationsToWGS84FromReplacedRealization(): array
    {
        $pairs = [];
        $result = $this->dataDB->query("SELECT datum_code, datum_name, remarks FROM epsg_datum WHERE remarks LIKE '%Replaces%'");
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            if (!preg_match_all('/\bReplaces\b[^.]*\(datum code (\d+)\)/i', $row['remarks'], $matches)) {
                continue;
            }
            if (preg_match('/International Terrestrial Reference Frame|European Terrestrial Reference Frame|World Geodetic System|SIRGAS Continuously Operating Network/i', $row['datum_name'])) {
                continue;
            }
            foreach ($matches[1] as $oldDatum) {
                $oldName = $this->dataDB->querySingle('SELECT datum_name FROM epsg_datum WHERE datum_code = ' . (int) $oldDatum);
                if (is_string($oldName) && preg_match('/International Terrestrial Reference Frame|European Terrestrial Reference Frame|World Geodetic System/i', $oldName)) {
                    continue;
                }
                $pairs[] = [(int) $oldDatum, (int) $row['datum_code']];
            }
        }

        $crsByDatum = [];
        $loadCrs = function (int $datum) use (&$crsByDatum): array {
            if (!isset($crsByDatum[$datum])) {
                $crsByDatum[$datum] = [];
                $result = $this->dataDB->query("
                    SELECT coord_ref_sys_code FROM epsg_coordinatereferencesystem
                    WHERE datum_code = {$datum} AND deprecated = 0
                      AND coord_ref_sys_kind IN ('geographic 2D', 'geographic 3D', 'geocentric')
                ");
                while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                    $crsByDatum[$datum][] = (int) $row['coord_ref_sys_code'];
                }
            }

            return $crsByDatum[$datum];
        };

        $accuracy = static function (float|int|string|null $value): ?float {
            if ($value === null || $value === '') {
                return null;
            }
            $value = (float) $value;

            return $value >= 900 ? null : $value;
        };

        $worse = [];
        foreach ($pairs as [$oldDatum, $newDatum]) {
            $oldCrs = $loadCrs($oldDatum);
            $newCrs = $loadCrs($newDatum);
            if ($oldCrs === [] || $newCrs === []) {
                continue;
            }
            $oldList = implode(',', $oldCrs);
            $newList = implode(',', $newCrs);

            $bridge = (int) $this->dataDB->querySingle("
                SELECT COUNT(*) FROM epsg_coordoperation o
                LEFT JOIN epsg_supersession sup ON sup.object_table_name = 'epsg_coordoperation' AND sup.object_code = o.coord_op_code
                LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code AND dep.deprecation_date <= '2021-09-10'
                WHERE o.source_crs_code IN ({$oldList}) AND o.target_crs_code IN ({$newList})
                  AND o.deprecated = 0 AND sup.supersession_id IS NULL AND dep.deprecation_id IS NULL
                  AND o.coord_op_type != 'concatenated operation'
            ");
            if ($bridge === 0) {
                continue;
            }

            $newToWgs = [];
            $result = $this->dataDB->query("
                SELECT o.coord_op_accuracy, GROUP_CONCAT(u.extent_code) AS extents
                FROM epsg_coordoperation o
                LEFT JOIN epsg_supersession sup ON sup.object_table_name = 'epsg_coordoperation' AND sup.object_code = o.coord_op_code
                LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code AND dep.deprecation_date <= '2021-09-10'
                LEFT JOIN epsg_usage u ON u.object_table_name = 'epsg_coordoperation' AND u.object_code = o.coord_op_code
                WHERE o.source_crs_code IN ({$newList}) AND o.target_crs_code IN (4326, 4978, 4979)
                  AND o.deprecated = 0 AND sup.supersession_id IS NULL AND dep.deprecation_id IS NULL
                  AND o.coord_op_type != 'concatenated operation'
                GROUP BY o.coord_op_code
            ");
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                $newAccuracy = $accuracy($row['coord_op_accuracy']);
                if ($newAccuracy === null) {
                    continue;
                }
                $newToWgs[] = ['accuracy' => $newAccuracy, 'extents' => array_filter(explode(',', (string) $row['extents']))];
            }
            if ($newToWgs === []) {
                continue;
            }

            $result = $this->dataDB->query("
                SELECT o.coord_op_code, o.coord_op_accuracy, GROUP_CONCAT(u.extent_code) AS extents
                FROM epsg_coordoperation o
                LEFT JOIN epsg_supersession sup ON sup.object_table_name = 'epsg_coordoperation' AND sup.object_code = o.coord_op_code
                LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code AND dep.deprecation_date <= '2021-09-10'
                LEFT JOIN epsg_usage u ON u.object_table_name = 'epsg_coordoperation' AND u.object_code = o.coord_op_code
                WHERE o.source_crs_code IN ({$oldList}) AND o.target_crs_code IN (4326, 4978, 4979)
                  AND o.deprecated = 0 AND sup.supersession_id IS NULL AND dep.deprecation_id IS NULL
                  AND o.coord_op_type != 'concatenated operation'
                GROUP BY o.coord_op_code
            ");
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                $oldAccuracy = $accuracy($row['coord_op_accuracy']);
                if ($oldAccuracy === null) {
                    continue;
                }
                $oldExtents = array_filter(explode(',', (string) $row['extents']));
                foreach ($newToWgs as $newOp) {
                    if ($oldAccuracy < $newOp['accuracy']) {
                        continue;
                    }
                    if (array_intersect($oldExtents, $newOp['extents']) === []) {
                        continue;
                    }
                    $worse[] = (int) $row['coord_op_code'];
                    break;
                }
            }
        }

        return array_values(array_unique($worse));
    }

    private function determineOperationsToWGS84CopiedFromSIRGAS(): array
    {
        $sql = "
            SELECT DISTINCT wgs84.coord_op_code
            FROM epsg_coordoperation wgs84
            JOIN epsg_coordoperation sirgas ON sirgas.source_crs_code = wgs84.source_crs_code AND sirgas.target_crs_code IN (4674, 4988, 4989, 4686, 4996, 4997) AND sirgas.deprecated = 0
            JOIN epsg_usage u ON wgs84.coord_op_code = u.object_code AND u.object_table_name = 'epsg_coordoperation' AND u.scope_code = 1252
            WHERE wgs84.target_crs_code IN (4978,4326,4979)
            ";

        $result = $this->dataDB->query($sql);
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
            JOIN epsg_coordoperation nzgd ON nzgd.source_crs_code = wgs84.source_crs_code AND nzgd.target_crs_code IN (4167, 4958, 4959) AND nzgd.deprecated = 0
            JOIN epsg_usage u ON wgs84.coord_op_code = u.object_code AND u.object_table_name = 'epsg_coordoperation' AND u.scope_code = 1252
            WHERE wgs84.target_crs_code IN (4978,4326,4979)
            ";

        $result = $this->dataDB->query($sql);
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

        $result = $this->dataDB->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[] = $row['coord_op_code'];
        }

        return $data;
    }

    /**
     * Non-grid ops that share source, target and extent with another non-grid op of strictly better accuracy.
     * Grid methods are ignored so a Helmert remains as a datapack-free fallback.
     *
     * @return list<int>
     */
    private function determineNonGridOperationsWithBetterSameExtentAlternative(): array
    {
        $fileParamMethods = [];
        $result = $this->dataDB->query("
            SELECT DISTINCT u.coord_op_method_code
            FROM epsg_coordoperationparamusage u
            JOIN epsg_coordoperationparam p ON p.parameter_code = u.parameter_code
            WHERE lower(p.parameter_name) LIKE '%file%' OR lower(p.parameter_name) LIKE '%grid%'
        ");
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $fileParamMethods[(int) $row['coord_op_method_code']] = true;
        }

        $result = $this->dataDB->query("
            SELECT o.coord_op_code, o.coord_op_method_code, o.source_crs_code, o.target_crs_code,
                   o.coord_op_accuracy, GROUP_CONCAT(u.extent_code) AS extents
            FROM epsg_coordoperation o
            LEFT JOIN epsg_supersession sup ON sup.object_table_name = 'epsg_coordoperation' AND sup.object_code = o.coord_op_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code AND dep.deprecation_date <= '2021-09-10'
            LEFT JOIN epsg_usage u ON u.object_table_name = 'epsg_coordoperation' AND u.object_code = o.coord_op_code
            WHERE o.deprecated = 0 AND sup.supersession_id IS NULL AND dep.deprecation_id IS NULL
              AND o.coord_op_type != 'concatenated operation'
            GROUP BY o.coord_op_code
        ");

        $ops = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            if (isset($fileParamMethods[(int) $row['coord_op_method_code']])) {
                continue;
            }
            $accuracy = $row['coord_op_accuracy'];
            if ($accuracy === null || $accuracy === '' || (float) $accuracy >= 900) {
                $accuracy = null;
            } else {
                $accuracy = (float) $accuracy;
            }
            $ops[] = [
                'code' => (int) $row['coord_op_code'],
                'source' => (int) $row['source_crs_code'],
                'target' => (int) $row['target_crs_code'],
                'accuracy' => $accuracy,
                'extents' => array_filter(explode(',', (string) $row['extents'])),
            ];
        }

        $byPair = [];
        foreach ($ops as $op) {
            $byPair[$op['source'] . '->' . $op['target']][] = $op;
        }

        $worse = [];
        foreach ($byPair as $group) {
            if (count($group) < 2) {
                continue;
            }
            foreach ($group as $op) {
                if ($op['accuracy'] === null) {
                    continue;
                }
                foreach ($group as $other) {
                    if ($other['code'] === $op['code'] || $other['accuracy'] === null || $other['accuracy'] >= $op['accuracy']) {
                        continue;
                    }
                    if (array_intersect($op['extents'], $other['extents']) !== []) {
                        $worse[] = $op['code'];
                        break;
                    }
                }
            }
        }

        return $worse;
    }

    /**
     * Grid operations whose method or operation name includes "depth". Algorithms are implemented; marine-only files are not shipped.
     *
     * @return list<int>
     */
    private function determineGridDepthOperations(): array
    {
        $sql = "
            SELECT DISTINCT o.coord_op_code
            FROM epsg_coordoperation o
            JOIN epsg_coordoperationmethod m ON m.coord_op_method_code = o.coord_op_method_code
            JOIN epsg_coordoperationparamusage u ON u.coord_op_method_code = m.coord_op_method_code
            JOIN epsg_coordoperationparam p ON p.parameter_code = u.parameter_code
            WHERE (lower(m.coord_op_method_name) LIKE '%depth%' OR lower(o.coord_op_name) LIKE '%depth%')
              AND (lower(p.parameter_name) LIKE '%file%' OR lower(p.parameter_name) LIKE '%grid%')
            ";

        $result = $this->dataDB->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[] = (int) $row['coord_op_code'];
        }

        return $data;
    }

    private function determineOperationsInBlacklistedScopes(): array
    {
        $sql = "
            SELECT o.coord_op_code
            FROM epsg_coordoperation o
            JOIN epsg_usage u ON u.object_code = o.coord_op_code AND u.object_table_name = 'epsg_coordoperation'
            LEFT JOIN epsg_coordinatereferencesystem crs ON crs.projection_conv_code = o.coord_op_code
            WHERE u.scope_code IN (" . implode(', ', self::BLACKLISTED_OPERATION_SCOPES) . ')
              AND crs.projection_conv_code IS NULL
            ';

        $result = $this->dataDB->query($sql);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[] = $row['coord_op_code'];
        }

        return $data;
    }

    private function addMetaDataToGeoJSON(string $geoJSONString, string $urn, string $title): string
    {
        $title = addcslashes($title, '"\\');

        // hack it in to get the sort ordering (up front), file will be pretty-printed later
        return preg_replace('/^{/', "{\"id\": \"{$urn}\", \"title\": \"{$title}\",", $geoJSONString);
    }

    public function time(string $label, callable $fn): mixed
    {
        $start = microtime(true);
        $result = $fn();
        printf("  %s: %.2fs\n", $label, microtime(true) - $start);

        return $result;
    }
}
