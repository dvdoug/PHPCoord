<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\EPSG\Import;

use function array_column;
use function array_flip;
use function array_reverse;
use function array_unique;
use function class_exists;
use function dirname;
use Exception;
use function explode;
use function fclose;
use function file_exists;
use function file_get_contents;
use function file_put_contents;
use function fopen;
use function fwrite;
use function implode;
use function in_array;
use function json_decode;
use const JSON_THROW_ON_ERROR;
use function max;
use function min;
use const PHP_EOL;
use PHPCoord\CoordinateOperation;
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
use function sleep;
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
    public const REGION_GLOBAL = 'Global';
    public const REGION_AFRICA = 'Africa';
    public const REGION_ARCTIC = 'Arctic';
    public const REGION_ANTARCTIC = 'Antarctic';
    public const REGION_ASIA = 'Asia-ExFSU';
    public const REGION_EUROPE = 'Europe-FSU';
    public const REGION_NORTHAMERICA = 'North America';
    public const REGION_SOUTHAMERICA = 'South America';
    public const REGION_OCEANIA = 'Australasia and Oceania';

    private string $resourceDir;

    private string $sourceDir;

    private const BOM = "\xEF\xBB\xBF";

    private const BLACKLISTED_METHODS = [
        // not implemented yet
        1072, // Geographic3D to GravityRelatedHeight (OSGM15-Ire)
        1096, // Geog3D to Geog2D+GravityRelatedHeight (OSGM15-Ire)
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
    ];

    private const BLACKLISTED_OPERATIONS = [
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
        7000, // rdtrans2008.gsb

        // replaced by PENR2009.gsb
        15932, // SPED2ETV2.gsb
        15933, // SPED2ETV2.gsb

        // replaced by all-Australia combination files
        1234, // vic_0799.gsb
        1464, // vic_0799.gsb
        1506, // tas_1098.gsb
        1507, // nt_0599.gsb
        1593, // wa_0700.gsb
        1596, // SEAust_21_06_00.gsb

        // approximation/emulation of official transforms
        1295, // NTv2 RGNC1991_NEA74Noumea.gsb
        6946, // NTv2 tm75_etrs89.gsb
        6947, // NTv2 tm75_etrs89.gsb
        15958, // NTv2 rgf93_ntf.gsb
        15959, // NTv2 rgf93_ntf.gsb
        15960, // NTv2 rgf93_ntf.gsb
        15962, // NTv2 RGNC1991_IGN72GrandeTerre.gsb

        // Just the result of doing Helmert transform
        8446, // NTv2 GDA94_GDA2020_conformal.gsb

        // It's just for 1 German state and is almost 400Mb!!
        9338, // NTv2 BWTA2017.gsb

        // Construction/engineering projects, not of general use
        9302, // NTv2 HS2TN15_NTv2.gsb
        9365, // NTv2 TN15-ETRS89-to-TPEN11-IRF.gsb
        9369, // NTv2 TN15-ETRS89-to-MML07-IRF.gsb
        9386, // NTv2 TN15-ETRS89-to-AbInvA96_2020-IRF.gsb
        9454, // NTv2 TN15-ETRS89-to-GBK19-IRF.gsb
        9740, // NTv2 TN15-ETRS89-to-EOS21-IRF.gsb

        // free, but license does not permit redistribution
        9112, // NTv2 BC_27_98.GSB
        9114, // NTv2 NVI27_05.GSB
        9116, // NTv2 BC_93_98.GSB
        9120, // NTv2 CRD98_00.GSB
        9121, // NTv2 NVI98_05.GSB
        9122, // NTv2 BC_98_05.GSB
        9496, // NTv2 MGI1901_TO_SRBETRS89_NTv2.gsb

        // license requires money :((
        9732, // NTv2 35160622_47161840_R40_E50.gsb
        9733, // NTv2 35160622_47161840_R40_F89.gsb
        9734, // NTv2 35160622_47161840_R40_F00.gsb
        9735, // NTv2 35160622_47161840_E50_F89.gsb
        9736, // NTv2 35160622_47161840_E50_F00.gsb
        9737, // NTv2 35160622_47161840_F89_F00.gsb
    ];

    private const FILE_CLASS_MAP = [
        'OSTN15_OSGM15_GB.txt' => CoordinateOperation\OSTN15OSGM15Provider::class,
        'OSGM15_Belfast.gri' => CoordinateOperation\OSGM15BelfastProvider::class,
        'OSGM15_Malin.gri' => CoordinateOperation\OSGM15MalinProvider::class,
        'nadcon5.as62.nad83_1993.as.lat.trn.20160901.b' => CoordinateOperation\NADCON5AS62NAD831993ASLatitudeProvider::class,
        'nadcon5.as62.nad83_1993.as.lon.trn.20160901.b' => CoordinateOperation\NADCON5AS62NAD831993ASLongitudeProvider::class,
        'nadcon5.gu63.nad83_1993.guamcnmi.lat.trn.20160901.b' => CoordinateOperation\NADCON5GU63NAD831993GuamCnMILatitudeProvider::class,
        'nadcon5.gu63.nad83_1993.guamcnmi.lon.trn.20160901.b' => CoordinateOperation\NADCON5GU63NAD831993GuamCnMILongitudeProvider::class,
        'nadcon5.nad27.nad83_1986.alaska.lat.trn.20160901.b' => CoordinateOperation\NADCON5NAD27NAD831986AlaskaLatitudeProvider::class,
        'nadcon5.nad27.nad83_1986.alaska.lon.trn.20160901.b' => CoordinateOperation\NADCON5NAD27NAD831986AlaskaLongitudeProvider::class,
        'nadcon5.nad27.nad83_1986.conus.lat.trn.20160901.b' => CoordinateOperation\NADCON5NAD27NAD831986CONUSLatitudeProvider::class,
        'nadcon5.nad27.nad83_1986.conus.lon.trn.20160901.b' => CoordinateOperation\NADCON5NAD27NAD831986CONUSLongitudeProvider::class,
        'nadcon5.nad83_1986.nad83_1992.alaska.lat.trn.20160901.b' => CoordinateOperation\NADCON5NAD831986NAD831992AlaskaLatitudeProvider::class,
        'nadcon5.nad83_1986.nad83_1992.alaska.lon.trn.20160901.b' => CoordinateOperation\NADCON5NAD831986NAD831992AlaskaLongitudeProvider::class,
        'nadcon5.nad83_1986.nad83_1993.hawaii.lat.trn.20160901.b' => CoordinateOperation\NADCON5NAD831986NAD831993HawaiiLatitudeProvider::class,
        'nadcon5.nad83_1986.nad83_1993.hawaii.lon.trn.20160901.b' => CoordinateOperation\NADCON5NAD831986NAD831993HawaiiLongitudeProvider::class,
        'nadcon5.nad83_1986.nad83_1993.prvi.lat.trn.20160901.b' => CoordinateOperation\NADCON5NAD831986NAD831993PRVILatitudeProvider::class,
        'nadcon5.nad83_1986.nad83_1993.prvi.lon.trn.20160901.b' => CoordinateOperation\NADCON5NAD831986NAD831993PRVILongitudeProvider::class,
        'nadcon5.nad83_1986.nad83_harn.conus.lat.trn.20160901.b' => CoordinateOperation\NADCON5NAD831986NAD83HARNCONUSLatitudeProvider::class,
        'nadcon5.nad83_1986.nad83_harn.conus.lon.trn.20160901.b' => CoordinateOperation\NADCON5NAD831986NAD83HARNCONUSLongitudeProvider::class,
        'nadcon5.nad83_1992.nad83_2007.alaska.eht.trn.20160901.b' => CoordinateOperation\NADCON5NAD831992NAD832007AlaskaHeightProvider::class,
        'nadcon5.nad83_1992.nad83_2007.alaska.lat.trn.20160901.b' => CoordinateOperation\NADCON5NAD831992NAD832007AlaskaLatitudeProvider::class,
        'nadcon5.nad83_1992.nad83_2007.alaska.lon.trn.20160901.b' => CoordinateOperation\NADCON5NAD831992NAD832007AlaskaLongitudeProvider::class,
        'nadcon5.nad83_1993.nad83_1997.prvi.eht.trn.20160901.b' => CoordinateOperation\NADCON5NAD831993NAD831997PRVIHeightProvider::class,
        'nadcon5.nad83_1993.nad83_1997.prvi.lat.trn.20160901.b' => CoordinateOperation\NADCON5NAD831993NAD831997PRVILatitudeProvider::class,
        'nadcon5.nad83_1993.nad83_1997.prvi.lon.trn.20160901.b' => CoordinateOperation\NADCON5NAD831993NAD831997PRVILongitudeProvider::class,
        'nadcon5.nad83_1993.nad83_2002.as.eht.trn.20160901.b' => CoordinateOperation\NADCON5NAD831993NAD832002ASHeightProvider::class,
        'nadcon5.nad83_1993.nad83_2002.as.lat.trn.20160901.b' => CoordinateOperation\NADCON5NAD831993NAD832002ASLatitudeProvider::class,
        'nadcon5.nad83_1993.nad83_2002.as.lon.trn.20160901.b' => CoordinateOperation\NADCON5NAD831993NAD832002ASLongitudeProvider::class,
        'nadcon5.nad83_1993.nad83_2002.guamcnmi.eht.trn.20160901.b' => CoordinateOperation\NADCON5NAD831993NAD832002GuamCnMIHeightProvider::class,
        'nadcon5.nad83_1993.nad83_2002.guamcnmi.lat.trn.20160901.b' => CoordinateOperation\NADCON5NAD831993NAD832002GuamCnMILatitudeProvider::class,
        'nadcon5.nad83_1993.nad83_2002.guamcnmi.lon.trn.20160901.b' => CoordinateOperation\NADCON5NAD831993NAD832002GuamCnMILongitudeProvider::class,
        'nadcon5.nad83_1993.nad83_pa11.hawaii.eht.trn.20160901.b' => CoordinateOperation\NADCON5NAD831993NAD83PA11HawaiiHeightProvider::class,
        'nadcon5.nad83_1993.nad83_pa11.hawaii.lat.trn.20160901.b' => CoordinateOperation\NADCON5NAD831993NAD83PA11HawaiiLatitudeProvider::class,
        'nadcon5.nad83_1993.nad83_pa11.hawaii.lon.trn.20160901.b' => CoordinateOperation\NADCON5NAD831993NAD83PA11HawaiiLongitudeProvider::class,
        'nadcon5.nad83_1997.nad83_2002.prvi.eht.trn.20160901.b' => CoordinateOperation\NADCON5NAD831997NAD832002PRVIHeightProvider::class,
        'nadcon5.nad83_1997.nad83_2002.prvi.lat.trn.20160901.b' => CoordinateOperation\NADCON5NAD831997NAD832002PRVILatitudeProvider::class,
        'nadcon5.nad83_1997.nad83_2002.prvi.lon.trn.20160901.b' => CoordinateOperation\NADCON5NAD831997NAD832002PRVILongitudeProvider::class,
        'nadcon5.nad83_2002.nad83_2007.prvi.eht.trn.20160901.b' => CoordinateOperation\NADCON5NAD832002NAD832007PRVIHeightProvider::class,
        'nadcon5.nad83_2002.nad83_2007.prvi.lat.trn.20160901.b' => CoordinateOperation\NADCON5NAD832002NAD832007PRVILatitudeProvider::class,
        'nadcon5.nad83_2002.nad83_2007.prvi.lon.trn.20160901.b' => CoordinateOperation\NADCON5NAD832002NAD832007PRVILongitudeProvider::class,
        'nadcon5.nad83_2002.nad83_ma11.guamcnmi.eht.trn.20160901.b' => CoordinateOperation\NADCON5NAD832002NAD83MA11GuamCnMIHeightProvider::class,
        'nadcon5.nad83_2002.nad83_ma11.guamcnmi.lat.trn.20160901.b' => CoordinateOperation\NADCON5NAD832002NAD83MA11GuamCnMILatitudeProvider::class,
        'nadcon5.nad83_2002.nad83_ma11.guamcnmi.lon.trn.20160901.b' => CoordinateOperation\NADCON5NAD832002NAD83MA11GuamCnMILongitudeProvider::class,
        'nadcon5.nad83_2002.nad83_pa11.as.eht.trn.20160901.b' => CoordinateOperation\NADCON5NAD832002NAD83PA11ASHeightProvider::class,
        'nadcon5.nad83_2002.nad83_pa11.as.lat.trn.20160901.b' => CoordinateOperation\NADCON5NAD832002NAD83PA11ASLatitudeProvider::class,
        'nadcon5.nad83_2002.nad83_pa11.as.lon.trn.20160901.b' => CoordinateOperation\NADCON5NAD832002NAD83PA11ASLongitudeProvider::class,
        'nadcon5.nad83_2007.nad83_2011.alaska.eht.trn.20160901.b' => CoordinateOperation\NADCON5NAD832007NAD832011AlaskaHeightProvider::class,
        'nadcon5.nad83_2007.nad83_2011.alaska.lat.trn.20160901.b' => CoordinateOperation\NADCON5NAD832007NAD832011AlaskaLatitudeProvider::class,
        'nadcon5.nad83_2007.nad83_2011.alaska.lon.trn.20160901.b' => CoordinateOperation\NADCON5NAD832007NAD832011AlaskaLongitudeProvider::class,
        'nadcon5.nad83_2007.nad83_2011.conus.eht.trn.20160901.b' => CoordinateOperation\NADCON5NAD832007NAD832011CONUSHeightProvider::class,
        'nadcon5.nad83_2007.nad83_2011.conus.lat.trn.20160901.b' => CoordinateOperation\NADCON5NAD832007NAD832011CONUSLatitudeProvider::class,
        'nadcon5.nad83_2007.nad83_2011.conus.lon.trn.20160901.b' => CoordinateOperation\NADCON5NAD832007NAD832011CONUSLongitudeProvider::class,
        'nadcon5.nad83_2007.nad83_2011.prvi.eht.trn.20160901.b' => CoordinateOperation\NADCON5NAD832007NAD832011PRVIHeightProvider::class,
        'nadcon5.nad83_2007.nad83_2011.prvi.lat.trn.20160901.b' => CoordinateOperation\NADCON5NAD832007NAD832011PRVILatitudeProvider::class,
        'nadcon5.nad83_2007.nad83_2011.prvi.lon.trn.20160901.b' => CoordinateOperation\NADCON5NAD832007NAD832011PRVILongitudeProvider::class,
        'nadcon5.nad83_fbn.nad83_2007.conus.eht.trn.20160901.b' => CoordinateOperation\NADCON5NAD83FBNNAD832007CONUSHeightProvider::class,
        'nadcon5.nad83_fbn.nad83_2007.conus.lat.trn.20160901.b' => CoordinateOperation\NADCON5NAD83FBNNAD832007CONUSLatitudeProvider::class,
        'nadcon5.nad83_fbn.nad83_2007.conus.lon.trn.20160901.b' => CoordinateOperation\NADCON5NAD83FBNNAD832007CONUSLongitudeProvider::class,
        'nadcon5.nad83_harn.nad83_fbn.conus.eht.trn.20160901.b' => CoordinateOperation\NADCON5NAD83HARNNAD83FBNCONUSHeightProvider::class,
        'nadcon5.nad83_harn.nad83_fbn.conus.lat.trn.20160901.b' => CoordinateOperation\NADCON5NAD83HARNNAD83FBNCONUSLatitudeProvider::class,
        'nadcon5.nad83_harn.nad83_fbn.conus.lon.trn.20160901.b' => CoordinateOperation\NADCON5NAD83HARNNAD83FBNCONUSLongitudeProvider::class,
        'nadcon5.ohd.nad83_1986.hawaii.lat.trn.20160901.b' => CoordinateOperation\NADCON5OHDNAD831986HawaiiLatitudeProvider::class,
        'nadcon5.ohd.nad83_1986.hawaii.lon.trn.20160901.b' => CoordinateOperation\NADCON5OHDNAD831986HawaiiLongitudeProvider::class,
        'nadcon5.pr40.nad83_1986.prvi.lat.trn.20160901.b' => CoordinateOperation\NADCON5PR40NAD831986PRVILatitudeProvider::class,
        'nadcon5.pr40.nad83_1986.prvi.lon.trn.20160901.b' => CoordinateOperation\NADCON5PR40NAD831986PRVILongitudeProvider::class,
        'nadcon5.sg1897.sg1952.stgeorge.lat.trn.20160901.b' => CoordinateOperation\NADCON5SG1897SG1952StGeorgeLatitudeProvider::class,
        'nadcon5.sg1897.sg1952.stgeorge.lon.trn.20160901.b' => CoordinateOperation\NADCON5SG1897SG1952StGeorgeLongitudeProvider::class,
        'nadcon5.sg1952.nad83_1986.stgeorge.lat.trn.20160901.b' => CoordinateOperation\NADCON5SG1952NAD831986StGeorgeLatitudeProvider::class,
        'nadcon5.sg1952.nad83_1986.stgeorge.lon.trn.20160901.b' => CoordinateOperation\NADCON5SG1952NAD831986StGeorgeLongitudeProvider::class,
        'nadcon5.sl1952.nad83_1986.stlawrence.lat.trn.20160901.b' => CoordinateOperation\NADCON5SL1952NAD831986StLawrenceLatitudeProvider::class,
        'nadcon5.sl1952.nad83_1986.stlawrence.lon.trn.20160901.b' => CoordinateOperation\NADCON5SL1952NAD831986StLawrenceLongitudeProvider::class,
        'nadcon5.sp1897.sp1952.stpaul.lat.trn.20160901.b' => CoordinateOperation\NADCON5SP1897SP1952StPaulLatitudeProvider::class,
        'nadcon5.sp1897.sp1952.stpaul.lon.trn.20160901.b' => CoordinateOperation\NADCON5SP1897SP1952StPaulLongitudeProvider::class,
        'nadcon5.sp1952.nad83_1986.stpaul.lat.trn.20160901.b' => CoordinateOperation\NADCON5SP1952NAD831986StPaulLatitudeProvider::class,
        'nadcon5.sp1952.nad83_1986.stpaul.lon.trn.20160901.b' => CoordinateOperation\NADCON5SP1952NAD831986StPaulLongitudeProvider::class,
        'nadcon5.ussd.nad27.conus.lat.trn.20160901.b' => CoordinateOperation\NADCON5USSDNAD27CONUSLatitudeProvider::class,
        'nadcon5.ussd.nad27.conus.lon.trn.20160901.b' => CoordinateOperation\NADCON5USSDNAD27CONUSLongitudeProvider::class,
        'NTv2_0.gsb' => CoordinateOperation\NTv2NAD27NAD83CanadaProvider::class,
        'AB_CSRS.DAC' => CoordinateOperation\NTv2NAD831986NAD83CSRS2002AlbertaProvider::class,
        'BC_27_05.GSB' => CoordinateOperation\NTv2NAD27NAD83CSRS2002BritishColumbiaCRDProvider::class,
        'BC_93_05.GSB' => CoordinateOperation\NTv2NAD831986NAD83CSRS2002BritishColumbiaCRDProvider::class,
        'CQ77NA83.GSB' => CoordinateOperation\NTv2NAD27CGQ77NAD831986QuebecProvider::class,
        'CQ77SCRS.GSB' => CoordinateOperation\NTv2NAD27CGQ77NAD83CSRS1997QuebecProvider::class,
        'CGQ77-98.gsb' => CoordinateOperation\NTv2NAD27CGQ77NAD83CSRS1997QuebecProvider::class,
        'CRD27_00.GSB' => CoordinateOperation\NTv2NAD27NAD83CSRS1997BritishColumbiaCRDProvider::class,
        'CRD93_00.GSB' => CoordinateOperation\NTv2NAD831986NAD83CSRS1997BritishColumbiaCRDProvider::class,
        'GS7783.GSB' => CoordinateOperation\NTv2ATS77NAD831986NovaScotiaProvider::class,
        'May76v20.gsb' => CoordinateOperation\NTv2NAD27MAY76NAD831986OntarioProvider::class,
        'NA27NA83.GSB' => CoordinateOperation\NTv2NAD27NAD831986QuebecProvider::class,
        'NA27SCRS.GSB' => CoordinateOperation\NTv2NAD27NAD83CSRS1997QuebecProvider::class,
        'QUE27-98.gsb' => CoordinateOperation\NTv2NAD27NAD83CSRS1997QuebecProvider::class,
        'NA83SCRS.GSB' => CoordinateOperation\NTv2NAD831986NAD83CSRS1997QuebecProvider::class,
        'NAD83-98.gsb' => CoordinateOperation\NTv2NAD831986NAD83CSRS1997QuebecProvider::class,
        'NB2783v2.gsb' => CoordinateOperation\NTv2NAD27NAD83CSRS1997NewBrunswickProvider::class,
        'NB7783v2.gsb' => CoordinateOperation\NTv2ATS77NAD83CSRS1997NewBrunswickProvider::class,
        'NLCSRSV4A.GSB' => CoordinateOperation\NTv2NAD831986NAD83CSRS2010NewfoundlandProvider::class,
        'NS778302.gsb' => CoordinateOperation\NTv2ATS77NAD83CSRS2010NovaScotiaProvider::class,
        'NVI93_05.GSB' => CoordinateOperation\NTv2NAD831986NAD83CSRS1997BritishColumbiaVancouverIslandProvider::class,
        'ON27CSv1.GSB' => CoordinateOperation\NTv2NAD27NAD83CSRS1997OntarioProvider::class,
        'ON76CSv1.GSB' => CoordinateOperation\NTv2NAD27MAY76NAD83CSRS1997OntarioProvider::class,
        'ON83CSv1.GSB' => CoordinateOperation\NTv2NAD831986NAD83CSRS1997OntarioProvider::class,
        'PE7783V2.gsb' => CoordinateOperation\NTv2ATS777NAD83CSRS1997PrinceEdwardProvider::class,
        'SK27-83.gsb' => CoordinateOperation\NTv2NAD27NAD831986SaskatchewanProvider::class,
        'SK27-98.gsb' => CoordinateOperation\NTv2NAD27NAD83CSRS1997SaskatchewanProvider::class,
        'SK83-98.gsb' => CoordinateOperation\NTv2NAD831986NAD83CSRS1997SaskatchewanProvider::class,
        'TOR27CSv1.GSB' => CoordinateOperation\NTv2NAD27NAD83CSRS1997OTorontoProvider::class,
        'A66 National (13.09.01).gsb' => CoordinateOperation\NTv2AGD66GDA94AustraliaProvider::class,
        'GDA94_GDA2020_conformal_and_distortion.gsb' => CoordinateOperation\NTv2GDA94GDA2020AustraliaProvider::class,
        'GDA94_GDA2020_conformal_christmas_island.gsb' => CoordinateOperation\NTv2GDA94GDA2020ChristmasIslandProvider::class,
        'GDA94_GDA2020_conformal_cocos_island.gsb' => CoordinateOperation\NTv2GDA94GDA2020CocosIslandsProvider::class,
        'National 84 (02.07.01).gsb' => CoordinateOperation\NTv2AGD84GDA94AustraliaProvider::class,
        'nzgd2kgrid0005.gsb' => CoordinateOperation\NTv2NZGD1949NZGD2000NewZealandProvider::class,
        'BETA2007.gsb' => CoordinateOperation\NTv2DHDNETRS89GermanyProvider::class,
        'BALR2009.gsb' => CoordinateOperation\NTv2ED50ETRS89BalearicIslandsProvider::class,
        'PENR2009.gsb' => CoordinateOperation\NTv2ED50ETRS89SpainProvider::class,
        'CHENyx06a.gsb' => CoordinateOperation\NTv2LV03LV95SwitzerlandProvider::class,
        'CHENyx06_ETRS.gsb' => CoordinateOperation\NTv2LV03ETRS89SwitzerlandProvider::class,
        'CA61_003.gsb' => CoordinateOperation\NTv2CA61SIRGAS2000BrazilProvider::class,
        'CA7072_003.gsb' => CoordinateOperation\NTv2CA7072SIRGAS2000BrazilProvider::class,
        'SAD69_003.gsb' => CoordinateOperation\NTv2SAD69SIRGAS2000BrazilProvider::class,
        'SAD96_003.gsb' => CoordinateOperation\NTv2SAD6996SIRGAS2000BrazilProvider::class,
        '100800401.gsb' => CoordinateOperation\NTv2ED50ETRS89CataloniaProvider::class,
        'AT_GIS_GRID.gsb' => CoordinateOperation\NTv2MGIETRS89AustriaProvider::class,
        'D73_ETRS89_geo.gsb' => CoordinateOperation\NTv273ETRS89PortugalProvider::class,
        'DLx_ETRS89_geo.gsb' => CoordinateOperation\NTv2LisbonETRS89PortugalProvider::class,
        'NTv2_SN.gsb' => CoordinateOperation\NTv2RD83ETRS89SaxonyProvider::class,
        'bd72lb72_etrs89lb08.gsb' => CoordinateOperation\NTv2BD79ETRS89BelgiumProvider::class,
        'ISN93_ISN2016.gsb' => CoordinateOperation\NTv2ISN93ISN2016IcelandProvider::class,
        'ISN2004_ISN2016.gsb' => CoordinateOperation\NTv2ISN2004ISN2016IcelandProvider::class,
        'rdtrans2018.gsb' => CoordinateOperation\NTv2RDETRS89NetherlandsProvider::class,
        'SeTa2016.gsb' => CoordinateOperation\NTv2DHDNETRS89SaarlandProvider::class,
        'tky2jgd.gsb' => CoordinateOperation\NTv2TokyoJGD2000JapanProvider::class,
        'touhokutaiheiyouoki2011.gsb' => CoordinateOperation\NTv2JGD2000JGD2011JapanProvider::class,
    ];

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
        $sqlite->exec("UPDATE epsg_coordoperationparamvalue SET param_value_file_ref = NULL WHERE param_value_file_ref = ''");
        $sqlite->exec('UPDATE epsg_coordinatereferencesystem SET base_crs_code = 8817 WHERE coord_ref_sys_code = 8818');
        $sqlite->exec('UPDATE epsg_coordinatereferencesystem SET base_crs_code = 9695 WHERE coord_ref_sys_code = 9696');
        $sqlite->exec('UPDATE epsg_coordinatereferencesystem SET projection_conv_code = 15593 WHERE coord_ref_sys_code = 9057');
        $sqlite->exec('UPDATE epsg_coordinatereferencesystem SET projection_conv_code = 15593 WHERE coord_ref_sys_code = 9066');
        $sqlite->exec('UPDATE epsg_coordinatereferencesystem SET projection_conv_code = NULL WHERE coord_ref_sys_code = 4203');
        $sqlite->exec('UPDATE epsg_coordinatereferencesystem SET projection_conv_code = NULL WHERE coord_ref_sys_code = 4277');
        $sqlite->exec('UPDATE epsg_coordinatereferencesystem SET projection_conv_code = NULL WHERE coord_ref_sys_code = 4728');
        $sqlite->exec('UPDATE epsg_extent SET deprecated = 1 WHERE extent_code IN (1263, 4205, 4393)');
        $sqlite->exec("UPDATE epsg_coordoperationparamvalue SET param_value_file_ref = 'nadcon5.nad83_2007.nad83_2011.prvi.eht.trn.20160901.b' WHERE param_value_file_ref = 'nadcon5.nad83_2007.nad83_2011.prvi.eht.trn.20160901.b01.b'");
        $sqlite->exec("UPDATE epsg_coordoperationparamvalue SET param_value_file_ref = 'NLCSRSV4A.GSB' WHERE param_value_file_ref = 'NLCSRSV4A.GSB '");
        $sqlite->exec('UPDATE epsg_coordoperation SET deprecated = 1 WHERE coord_op_code IN (1851, 9235, 15933)');

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
                Datum::EPSG_GENOA_1942 => ['Genoa'],
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
                Compound::EPSG_BD72_BELGIAN_LAMBERT_72_PLUS_OSTEND_HEIGHT => ['Belge 1972 / Belgian Lambert 72 + Ostend height'],
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
                Geographic2D::EPSG_BD50 => ['Belge 1950'],
                Geographic2D::EPSG_BD50_BRUSSELS => ['Belge 1950 (Brussels)'],
                Geographic2D::EPSG_BD72 => ['Belge 1972'],
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
                Projected::EPSG_BD50_BRUSSELS_BELGE_LAMBERT_50 => ['Belge 1950 (Brussels) / Belge Lambert 50'],
                Projected::EPSG_BD72_BELGE_LAMBERT_72 => ['Belge 1972 / Belge Lambert 72'],
                Projected::EPSG_BD72_BELGIAN_LAMBERT_72 => ['Belge 1972 / Belgian Lambert 72'],
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
            [
                Vertical::EPSG_GENOA_1942_HEIGHT => ['Genoa Height'],
            ]
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
            AND m.coord_op_method_code NOT IN (" . implode(',', self::BLACKLISTED_METHODS) . ')
            GROUP BY m.coord_op_method_code
            ORDER BY name
        ';

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
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code
            WHERE o.coord_op_type != 'conversion' AND o.coord_op_name NOT LIKE '%example%' AND o.coord_op_name NOT LIKE '%mining%'
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
            LEFT JOIN epsg_coordoperationparamvalue p ON p.coord_op_code = o.coord_op_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code
            WHERE o.coord_op_type = 'conversion' AND o.coord_op_name NOT LIKE '%example%' AND o.coord_op_name NOT LIKE '%mining%'
            AND dep.deprecation_id IS NULL AND o.deprecated = 0
            GROUP BY source_crs, target_crs, o.coord_op_code
            HAVING (SUM(CASE WHEN m.coord_op_method_code IN (" . implode(',', self::BLACKLISTED_METHODS) . ') THEN 1 ELSE 0 END) = 0)
            AND (SUM(CASE WHEN o.coord_op_code IN (' . implode(',', self::BLACKLISTED_OPERATIONS) . ") THEN 1 ELSE 0 END) = 0)

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
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code
            WHERE o.coord_op_type = 'concatenated operation' AND o.coord_op_name NOT LIKE '%example%' AND o.coord_op_name NOT LIKE '%mining%'
            AND dep.deprecation_id IS NULL AND o.deprecated = 0
            GROUP BY source_crs, target_crs, o.coord_op_code
            HAVING (SUM(CASE WHEN cm.coord_op_method_code IN (" . implode(',', self::BLACKLISTED_METHODS) . ') THEN 1 ELSE 0 END) = 0)
            AND (SUM(CASE WHEN co.coord_op_code IN (' . implode(',', self::BLACKLISTED_OPERATIONS) . ') THEN 1 ELSE 0 END) = 0)

            ORDER BY source_crs, target_crs, operation
            ';

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
            LEFT JOIN epsg_coordoperationparamvalue p ON p.coord_op_code = o.coord_op_code
            LEFT JOIN epsg_deprecation dep ON dep.object_table_name = 'epsg_coordoperation' AND dep.object_code = o.coord_op_code AND dep.deprecation_date <= '2020-12-14'
            WHERE o.coord_op_type = 'conversion' AND o.coord_op_name NOT LIKE '%example%'
            AND dep.deprecation_id IS NULL AND o.deprecated = 0
            GROUP BY o.coord_op_code
            HAVING (SUM(CASE WHEN m.coord_op_method_code IN (" . implode(',', self::BLACKLISTED_METHODS) . ') THEN 1 ELSE 0 END) = 0)
            AND (SUM(CASE WHEN o.coord_op_code IN (' . implode(',', self::BLACKLISTED_OPERATIONS) . ") THEN 1 ELSE 0 END) = 0)

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
            AND dep.deprecation_id IS NULL AND o.deprecated = 0
            GROUP BY o.coord_op_code
            HAVING (SUM(CASE WHEN cm.coord_op_method_code IN (" . implode(',', self::BLACKLISTED_METHODS) . ') THEN 1 ELSE 0 END) = 0)
            AND (SUM(CASE WHEN co.coord_op_code IN (' . implode(',', self::BLACKLISTED_OPERATIONS) . ") THEN 1 ELSE 0 END) = 0)

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
            AND dep.deprecation_id IS NULL AND o.deprecated = 0
            GROUP BY o.coord_op_code
            HAVING (SUM(CASE WHEN o.coord_op_method_code IN (" . implode(',', self::BLACKLISTED_METHODS) . ') THEN 1 ELSE 0 END) = 0)
            AND (SUM(CASE WHEN o.coord_op_code IN (' . implode(',', self::BLACKLISTED_OPERATIONS) . ') THEN 1 ELSE 0 END) = 0)

            ORDER BY urn
            ';

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

            $paramsResult = $sqlite->query($paramsSql);
            while ($paramsRow = $paramsResult->fetchArray(SQLITE3_ASSOC)) {
                unset($paramsRow['operation_code']);
                $paramsRow['reverses'] = (bool) $paramsRow['reverses'];
                if (in_array($paramsRow['parameter_code'], [8659, 8660, 1037, 1048, 8661, 8662], true)) {
                    $paramsRow['value'] = 'urn:ogc:def:crs:EPSG::' . $paramsRow['value'];
                }
                if (
                    isset(self::FILE_CLASS_MAP[$paramsRow['value']]) &&
                    in_array(
                        $paramsRow['name'],
                        [
                            'Easting and northing difference file',
                            'Geoid (height correction) model file',
                            'Latitude difference file',
                            'Longitude difference file',
                            'Ellipsoidal height difference file',
                            'Latitude and longitude difference file',
                        ]
                    )
                ) {
                    $paramsRow['fileProvider'] = self::FILE_CLASS_MAP[$paramsRow['value']];
                    unset($paramsRow['value'], $paramsRow['uom']);
                }
                unset($paramsRow['parameter_code']);
                $params[$paramsRow['name']] = $paramsRow;
                unset($params[$paramsRow['name']]['name']);
            }
            if (isset($operationData['method']) && $operationData['method'] === CoordinateOperationMethods::EPSG_NADCON5_2D) { // for PHP7.4 w/out named params
                $params['Ellipsoidal height difference file'] = ['value' => null, 'uom' => null, 'reverses' => false];
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
        $result = $sqlite->query($sql);

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

            sleep(5);

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
                    $this->csFixFile($builtInFull . "Extent{$extentCode}.php");
                    break;
                case self::REGION_AFRICA:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($africa . "Extent{$extentCode}.php", $exportFull);
                    $this->csFixFile($africa . "Extent{$extentCode}.php");
                    break;
                case self::REGION_ANTARCTIC:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($antarctic . "Extent{$extentCode}.php", $exportFull);
                    $this->csFixFile($antarctic . "Extent{$extentCode}.php");
                    break;
                case self::REGION_ARCTIC:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($arctic . "Extent{$extentCode}.php", $exportFull);
                    $this->csFixFile($arctic . "Extent{$extentCode}.php");
                    break;
                case self::REGION_ASIA:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($asia . "Extent{$extentCode}.php", $exportFull);
                    $this->csFixFile($asia . "Extent{$extentCode}.php");
                    break;
                case self::REGION_OCEANIA:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($oceania . "Extent{$extentCode}.php", $exportFull);
                    $this->csFixFile($oceania . "Extent{$extentCode}.php");
                    break;
                case self::REGION_EUROPE:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($europe . "Extent{$extentCode}.php", $exportFull);
                    $this->csFixFile($europe . "Extent{$extentCode}.php");
                    break;
                case self::REGION_NORTHAMERICA:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($northAmerica . "Extent{$extentCode}.php", $exportFull);
                    $this->csFixFile($northAmerica . "Extent{$extentCode}.php");
                    break;
                case self::REGION_SOUTHAMERICA:
                    file_put_contents($boundingBoxOnly . "Extent{$extentCode}.php", $exportSimple);
                    $this->csFixFile($boundingBoxOnly . "Extent{$extentCode}.php");
                    file_put_contents($southAmerica . "Extent{$extentCode}.php", $exportFull);
                    $this->csFixFile($southAmerica . "Extent{$extentCode}.php");
                    break;
                default:
                    throw new Exception("Unknown region: {$region}");
            }
        }

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
        $config = require __DIR__ . '/../../../.php-cs-fixer.dist.php';

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
