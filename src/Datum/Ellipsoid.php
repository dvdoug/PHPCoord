<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Datum;

use function array_map;
use PHPCoord\Exception\UnknownEllipsoidException;
use PHPCoord\UnitOfMeasure\Length\Length;
use function sqrt;

class Ellipsoid
{
    /**
     * Airy 1830
     * Original definition is a=20923713, b=20853810 feet of 1796. 1/f is given to 7 decimal places. For the 1936
     * retriangulation OSGB defines the relationship of 10 feet of 1796 to the International metre through
     * ([10^0.48401603]/10) exactly = 0.3048007491...
     */
    public const EPSG_AIRY_1830 = 'urn:ogc:def:ellipsoid:EPSG::7001';

    /**
     * Airy Modified 1849
     * OSGB Airy 1830 figure (ellipsoid code 7001) rescaled by 0.999965 to best fit the scale of the 19th century
     * primary triangulation of Ireland.
     */
    public const EPSG_AIRY_MODIFIED_1849 = 'urn:ogc:def:ellipsoid:EPSG::7002';

    /**
     * Australian National Spheroid
     * Based on the GRS 1967 figure but with 1/f taken to 2 decimal places exactly.  The dimensions are also used as
     * the GRS 1967 Modified ellipsoid (see code 7050).
     */
    public const EPSG_AUSTRALIAN_NATIONAL_SPHEROID = 'urn:ogc:def:ellipsoid:EPSG::7003';

    /**
     * Average Terrestrial System 1977.
     */
    public const EPSG_AVERAGE_TERRESTRIAL_SYSTEM_1977 = 'urn:ogc:def:ellipsoid:EPSG::7041';

    /**
     * Bessel 1841
     * Original Bessel definition is a=3272077.14 and b=3261139.33 toise. This used a weighted mean of values from
     * several authors but did not account for differences in the length of the various toise: the "Bessel toise" is
     * therefore of uncertain length.
     */
    public const EPSG_BESSEL_1841 = 'urn:ogc:def:ellipsoid:EPSG::7004';

    /**
     * Bessel Modified
     * Used in Norway and also in Sweden with a 1mm increase in semi-major axis.
     */
    public const EPSG_BESSEL_MODIFIED = 'urn:ogc:def:ellipsoid:EPSG::7005';

    /**
     * Bessel Namibia (GLM)
     * The semi-major axis has the same value as the Bessel 1841 ellipsoid (code 7004) but is in different units -
     * German Legal Metres rather than International metres - hence a different size.  a = 6377483.865 International
     * metres. Used in Namibia.
     */
    public const EPSG_BESSEL_NAMIBIA_GLM = 'urn:ogc:def:ellipsoid:EPSG::7046';

    /**
     * CGCS2000
     * Defining parameters semi-major axis, flattening and angular velocity are same as for GRS 1980 (ellipsoid code
     * 7019); GM = 3986004.4e8 m*m*m/s/s (from NASA 1986 Lageos determination).
     */
    public const EPSG_CGCS2000 = 'urn:ogc:def:ellipsoid:EPSG::1024';

    /**
     * Clarke 1858
     * Clarke's 1858/II solution. Derived parameters: a = 6378293.645m using his 1865 ratio of 0.3047972654 feet per
     * metre; 1/f = 294.26068…  In Australia and Amoco Trinidad 1/f taken to two decimal places (294.26 exactly);
     * elsewhere a and b used to derive 1/f.
     */
    public const EPSG_CLARKE_1858 = 'urn:ogc:def:ellipsoid:EPSG::7007';

    /**
     * Clarke 1866
     * Original definition a=20926062 and b=20855121 (British) feet. Uses Clarke's 1865 inch-metre ratio of 39.370432
     * to obtain metres. (Metric value then converted to US survey feet for use in the US and international feet for
     * use in Cayman Islands).
     */
    public const EPSG_CLARKE_1866 = 'urn:ogc:def:ellipsoid:EPSG::7008';

    /**
     * Clarke 1866 Authalic Sphere
     * Authalic sphere derived from Clarke 1866 ellipsoid (code 7008).
     */
    public const EPSG_CLARKE_1866_AUTHALIC_SPHERE = 'urn:ogc:def:ellipsoid:EPSG::7052';

    /**
     * Clarke 1880
     * Clarke gave a and b and also 1/f=293.465 (to 3 decimal places exactly). In the 19th century b was normally given
     * as the second defining parameter.
     */
    public const EPSG_CLARKE_1880 = 'urn:ogc:def:ellipsoid:EPSG::7034';

    /**
     * Clarke 1880 (Arc)
     * Adopts Clarke's value for a with derived 1/f.  Uses his 1865 ratio of 39.370432 inch per metre to convert
     * semi-major axis to metres.
     */
    public const EPSG_CLARKE_1880_ARC = 'urn:ogc:def:ellipsoid:EPSG::7013';

    /**
     * Clarke 1880 (Benoit)
     * Adopts Clarke's values for a and b.  Uses Benoit's 1895 ratio of 0.9143992 metres per yard to convert to metres.
     */
    public const EPSG_CLARKE_1880_BENOIT = 'urn:ogc:def:ellipsoid:EPSG::7010';

    /**
     * Clarke 1880 (IGN)
     * Adopts Clarke's values for a and b using his 1865 ratio of 39.370432 inches per metre to convert axes to metres.
     */
    public const EPSG_CLARKE_1880_IGN = 'urn:ogc:def:ellipsoid:EPSG::7011';

    /**
     * Clarke 1880 (RGS)
     * Adopts Clarke's values for a and 1/f.  Adopts his 1865 ratio of 39.370432 inches per metre to convert semi-major
     * axis to metres. Also known as Clarke Modified 1880.
     */
    public const EPSG_CLARKE_1880_RGS = 'urn:ogc:def:ellipsoid:EPSG::7012';

    /**
     * Clarke 1880 (SGA 1922)
     * Used in Old French Triangulation (ATF).   Uses Clarke's 1865 inch-metre ratio of 39.370432 to convert axes to
     * metres.
     */
    public const EPSG_CLARKE_1880_SGA_1922 = 'urn:ogc:def:ellipsoid:EPSG::7014';

    /**
     * Clarke 1880 (international foot)
     * Clarke's 1880 definition in feet assumed for the purposes of metric conversion to be international foot. a =
     * 6378306.370…metres. 1/f derived from a and b = 293.4663077… Used in Fiji.
     */
    public const EPSG_CLARKE_1880_INTERNATIONAL_FOOT = 'urn:ogc:def:ellipsoid:EPSG::7055';

    /**
     * Danish 1876
     * Semi-major axis originally given as 3271883.25 toise. Uses toise to French metre ratio of 1.94903631 to two
     * decimal place precision. An alternative ratio with the German legal metre of 1.9490622 giving 6377104m has not
     * been used in Danish work.
     */
    public const EPSG_DANISH_1876 = 'urn:ogc:def:ellipsoid:EPSG::7051';

    /**
     * Everest (1830 Definition)
     * Everest gave a and b to 2 decimal places and also 1/f=300.8017 (to 4 decimal places exactly). In the 19th
     * century b was normally given as the second defining parameter.
     */
    public const EPSG_EVEREST_1830_DEFINITION = 'urn:ogc:def:ellipsoid:EPSG::7042';

    /**
     * Everest 1830 (1937 Adjustment)
     * Used for the 1937 readjustment of Indian triangulation.  Clarke's 1865 Indian-British foot ratio (0.99999566)
     * and Benoit's 1898 British inch-metre ratio (39.370113) rounded as 0.30479841 exactly and applied to Everest's
     * 1830 definition taken as a and 1/f.
     */
    public const EPSG_EVEREST_1830_1937_ADJUSTMENT = 'urn:ogc:def:ellipsoid:EPSG::7015';

    /**
     * Everest 1830 (1962 Definition)
     * Used by Pakistan since metrication.  Clarke's 1865 Indian foot-British foot ratio (0.99999566) and his 1865
     * British inch-metre ratio (39.369971) rounded with slight error as 1 Ind ft = 0.3047995m exactly and applied to
     * Everest's 1830 definition of a & b.
     */
    public const EPSG_EVEREST_1830_1962_DEFINITION = 'urn:ogc:def:ellipsoid:EPSG::7044';

    /**
     * Everest 1830 (1967 Definition)
     * Adopted 1967 for use in East Malaysia.  Applies Sears 1922 inch-metre ratio of 39.370147 to Everest 1830
     * original definition of a and 1/f but with a taken to be in British rather than Indian feet.
     */
    public const EPSG_EVEREST_1830_1967_DEFINITION = 'urn:ogc:def:ellipsoid:EPSG::7016';

    /**
     * Everest 1830 (1975 Definition)
     * Used by India since metrication.  Clarke's 1865 Indian foot-British foot ratio (0.99999566) and his 1865 British
     * inch-metre ratio (39.369971) rounded as 1 Ind ft = 0.3047995m exactly applied to Everest's 1830 original
     * definition taken as a and b.
     */
    public const EPSG_EVEREST_1830_1975_DEFINITION = 'urn:ogc:def:ellipsoid:EPSG::7045';

    /**
     * Everest 1830 (RSO 1969)
     * Adopted for 1969 metrication of peninsula Malaysia RSO grid.  Uses Sears 1922 yard-metre ratio truncated to 6
     * significant figures applied to Everest 1830 original definition of a and 1/f but with a taken to be in British
     * rather than Indian feet.
     */
    public const EPSG_EVEREST_1830_RSO_1969 = 'urn:ogc:def:ellipsoid:EPSG::7056';

    /**
     * Everest 1830 Modified
     * Adopted 1967 for use in West Malaysia.  Applies Benoit 1898 inch-metre ratio of 39.370113 to Everest 1830
     * original definition of a and 1/f but with a taken to be in British rather than Indian feet.
     */
    public const EPSG_EVEREST_1830_MODIFIED = 'urn:ogc:def:ellipsoid:EPSG::7018';

    /**
     * GEM 10C
     * Used for  GEM 10C Gravity Potential Model.
     */
    public const EPSG_GEM_10C = 'urn:ogc:def:ellipsoid:EPSG::7031';

    /**
     * GRS 1967
     * Adopted by IUGG 1967 Lucerne.  1/f given is derived from geocentric gravitational constant (GM)= 398603e9
     * m*m*m/s/s; dynamic form factor (J2) = 0.0010827 and Earth's angular velocity w = 7.2921151467e-5 rad/s. See also
     * GRS 1967 Modified (code 7050).
     */
    public const EPSG_GRS_1967 = 'urn:ogc:def:ellipsoid:EPSG::7036';

    /**
     * GRS 1967 Modified
     * Based on the GRS 1967 figure (code 7036) but with 1/f taken to 2 decimal places exactly. Used with SAD69 and
     * TWD67 datums. The dimensions are also used as the Australian National Spheroid (code 7003).
     */
    public const EPSG_GRS_1967_MODIFIED = 'urn:ogc:def:ellipsoid:EPSG::7050';

    /**
     * GRS 1980
     * Adopted by IUGG 1979 Canberra.  Inverse flattening is derived from geocentric gravitational constant GM =
     * 3986005e8 m*m*m/s/s; dynamic form factor J2 = 108263e-8 and Earth's angular velocity = 7292115e-11 rad/s.
     */
    public const EPSG_GRS_1980 = 'urn:ogc:def:ellipsoid:EPSG::7019';

    /**
     * GRS 1980 Authalic Sphere
     * Authalic sphere derived from GRS 1980 ellipsoid (code 7019).  (An authalic sphere is one with a surface area
     * equal to the surface area of the ellipsoid). 1/f is infinite.
     */
    public const EPSG_GRS_1980_AUTHALIC_SPHERE = 'urn:ogc:def:ellipsoid:EPSG::7048';

    /**
     * GSK-2011.
     */
    public const EPSG_GSK_2011 = 'urn:ogc:def:ellipsoid:EPSG::1025';

    /**
     * Helmert 1906
     * Helmert 1906/III solution.
     */
    public const EPSG_HELMERT_1906 = 'urn:ogc:def:ellipsoid:EPSG::7020';

    /**
     * Hough 1960.
     */
    public const EPSG_HOUGH_1960 = 'urn:ogc:def:ellipsoid:EPSG::7053';

    /**
     * Hughes 1980
     * Used in US DMSP SSM/I microwave sensor processing software. Semi-minor axis derived from
     * eccentricity=0.081816153. Semi-major axis (a) sometimes given as 3443.992nm which OGP suspects is a derived
     * approximation. OGP conversion assumes 1nm=1852m exactly.
     */
    public const EPSG_HUGHES_1980 = 'urn:ogc:def:ellipsoid:EPSG::7058';

    /**
     * IAG 1975.
     */
    public const EPSG_IAG_1975 = 'urn:ogc:def:ellipsoid:EPSG::7049';

    /**
     * Indonesian National Spheroid
     * Based on the GRS 1967 figure but with 1/f taken to 3 decimal places exactly.
     */
    public const EPSG_INDONESIAN_NATIONAL_SPHEROID = 'urn:ogc:def:ellipsoid:EPSG::7021';

    /**
     * International 1924
     * Adopted by IUGG 1924 in Madrid. Based on Hayford 1909/1910 figures.
     */
    public const EPSG_INTERNATIONAL_1924 = 'urn:ogc:def:ellipsoid:EPSG::7022';

    /**
     * International 1924 Authalic Sphere
     * Authalic sphere derived from International 1924 ellipsoid (code 7022).
     */
    public const EPSG_INTERNATIONAL_1924_AUTHALIC_SPHERE = 'urn:ogc:def:ellipsoid:EPSG::7057';

    /**
     * Krassowsky 1940.
     */
    public const EPSG_KRASSOWSKY_1940 = 'urn:ogc:def:ellipsoid:EPSG::7024';

    /**
     * NWL 9D
     * Used by Transit Precise Ephemeris between October 1971 and January 1987.
     */
    public const EPSG_NWL_9D = 'urn:ogc:def:ellipsoid:EPSG::7025';

    /**
     * OSU86F
     * Used for OSU86 gravity potential (geoidal) model.
     */
    public const EPSG_OSU86F = 'urn:ogc:def:ellipsoid:EPSG::7032';

    /**
     * OSU91A
     * Used for OSU91 gravity potential (geoidal) model.
     */
    public const EPSG_OSU91A = 'urn:ogc:def:ellipsoid:EPSG::7033';

    /**
     * PZ-90
     * Earth's angular velocity ω = 7.292115e-5 rad/sec; gravitational constant GM =  3986004.418e8 m*m*m/s/s.
     */
    public const EPSG_PZ_90 = 'urn:ogc:def:ellipsoid:EPSG::7054';

    /**
     * Plessis 1817
     * Rescaling of Delambre 1810 figure (a=6376985 m) to make meridional arc from equator to pole equal to 10000000
     * metres exactly. (Ref: Strasser).
     */
    public const EPSG_PLESSIS_1817 = 'urn:ogc:def:ellipsoid:EPSG::7027';

    /**
     * Struve 1860
     * Original definition of semi-major axis given as 3272539 toise.  In "Ellipsoidisch Parameter der Erdfigur
     * (1800-1950)" , Strasser suggests a conversion factor of 1.94903631 which gives a=6378297.337 metres.
     */
    public const EPSG_STRUVE_1860 = 'urn:ogc:def:ellipsoid:EPSG::7028';

    /**
     * WGS 72.
     */
    public const EPSG_WGS_72 = 'urn:ogc:def:ellipsoid:EPSG::7043';

    /**
     * WGS 84
     * 1/f derived from four defining parameters semi-major axis; C20 = -484.16685*10e-6; earth's angular velocity ω =
     * 7292115e-11 rad/sec; gravitational constant GM = 3986005e8 m*m*m/s/s. In 1994 new GM = 3986004.418e8 m*m*m/s/s
     * but a and 1/f retained.
     */
    public const EPSG_WGS_84 = 'urn:ogc:def:ellipsoid:EPSG::7030';

    /**
     * War Office
     * In non-metric form, a=20926201 Gold Coast feet. DMA Technical Manual 8358.1 and data derived from this quotes
     * value for semi-major axis as 6378300.58m: OGP recommends use of defined value 6378300m exactly.
     */
    public const EPSG_WAR_OFFICE = 'urn:ogc:def:ellipsoid:EPSG::7029';

    /**
     * Zach 1812
     * Defined as log a = 6.5266022 Klafter (Austrian fathom, Kl), log b = 6.5251990 Kl. a=10^6.526 6022 = 3362035 Kl.
     * Then using the Austro-Hungarian 1871 KL/m legal ratio of 1.89648384, a = 6376045m.
     */
    public const EPSG_ZACH_1812 = 'urn:ogc:def:ellipsoid:EPSG::1026';

    protected static $sridData = [
        'urn:ogc:def:ellipsoid:EPSG::1024' => [
            'name' => 'CGCS2000',
            'semi_major_axis' => 6378137.0,
            'semi_minor_axis' => 6356752.314140356,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::1025' => [
            'name' => 'GSK-2011',
            'semi_major_axis' => 6378136.5,
            'semi_minor_axis' => 6356751.757955603,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::1026' => [
            'name' => 'Zach 1812',
            'semi_major_axis' => 6376045.0,
            'semi_minor_axis' => 6355477.112903226,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7001' => [
            'name' => 'Airy 1830',
            'semi_major_axis' => 6377563.396,
            'semi_minor_axis' => 6356256.909237285,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7002' => [
            'name' => 'Airy Modified 1849',
            'semi_major_axis' => 6377340.189,
            'semi_minor_axis' => 6356034.447938534,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7003' => [
            'name' => 'Australian National Spheroid',
            'semi_major_axis' => 6378160.0,
            'semi_minor_axis' => 6356774.719195306,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7004' => [
            'name' => 'Bessel 1841',
            'semi_major_axis' => 6377397.155,
            'semi_minor_axis' => 6356078.962818189,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7005' => [
            'name' => 'Bessel Modified',
            'semi_major_axis' => 6377492.018,
            'semi_minor_axis' => 6356173.508712696,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7007' => [
            'name' => 'Clarke 1858',
            'semi_major_axis' => 20926348.0,
            'semi_minor_axis' => 20855233.0,
            'uom' => 'urn:ogc:def:uom:EPSG::9005',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7008' => [
            'name' => 'Clarke 1866',
            'semi_major_axis' => 6378206.4,
            'semi_minor_axis' => 6356583.8,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7010' => [
            'name' => 'Clarke 1880 (Benoit)',
            'semi_major_axis' => 6378300.789,
            'semi_minor_axis' => 6356566.435,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7011' => [
            'name' => 'Clarke 1880 (IGN)',
            'semi_major_axis' => 6378249.2,
            'semi_minor_axis' => 6356515.0,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7012' => [
            'name' => 'Clarke 1880 (RGS)',
            'semi_major_axis' => 6378249.145,
            'semi_minor_axis' => 6356514.8695497755,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7013' => [
            'name' => 'Clarke 1880 (Arc)',
            'semi_major_axis' => 6378249.145,
            'semi_minor_axis' => 6356514.966398753,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7014' => [
            'name' => 'Clarke 1880 (SGA 1922)',
            'semi_major_axis' => 6378249.2,
            'semi_minor_axis' => 6356514.996941779,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7015' => [
            'name' => 'Everest 1830 (1937 Adjustment)',
            'semi_major_axis' => 6377276.345,
            'semi_minor_axis' => 6356075.413140239,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7016' => [
            'name' => 'Everest 1830 (1967 Definition)',
            'semi_major_axis' => 6377298.556,
            'semi_minor_axis' => 6356097.550300896,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7018' => [
            'name' => 'Everest 1830 Modified',
            'semi_major_axis' => 6377304.063,
            'semi_minor_axis' => 6356103.038993155,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7019' => [
            'name' => 'GRS 1980',
            'semi_major_axis' => 6378137.0,
            'semi_minor_axis' => 6356752.314140356,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7020' => [
            'name' => 'Helmert 1906',
            'semi_major_axis' => 6378200.0,
            'semi_minor_axis' => 6356818.169627891,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7021' => [
            'name' => 'Indonesian National Spheroid',
            'semi_major_axis' => 6378160.0,
            'semi_minor_axis' => 6356774.50408554,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7022' => [
            'name' => 'International 1924',
            'semi_major_axis' => 6378388.0,
            'semi_minor_axis' => 6356911.9461279465,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7024' => [
            'name' => 'Krassowsky 1940',
            'semi_major_axis' => 6378245.0,
            'semi_minor_axis' => 6356863.018773047,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7025' => [
            'name' => 'NWL 9D',
            'semi_major_axis' => 6378145.0,
            'semi_minor_axis' => 6356759.769488684,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7027' => [
            'name' => 'Plessis 1817',
            'semi_major_axis' => 6376523.0,
            'semi_minor_axis' => 6355862.933255573,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7028' => [
            'name' => 'Struve 1860',
            'semi_major_axis' => 6378298.3,
            'semi_minor_axis' => 6356657.142669562,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7029' => [
            'name' => 'War Office',
            'semi_major_axis' => 6378300.0,
            'semi_minor_axis' => 6356751.689189189,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7030' => [
            'name' => 'WGS 84',
            'semi_major_axis' => 6378137.0,
            'semi_minor_axis' => 6356752.314245179,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7031' => [
            'name' => 'GEM 10C',
            'semi_major_axis' => 6378137.0,
            'semi_minor_axis' => 6356752.314245179,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7032' => [
            'name' => 'OSU86F',
            'semi_major_axis' => 6378136.2,
            'semi_minor_axis' => 6356751.516927429,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7033' => [
            'name' => 'OSU91A',
            'semi_major_axis' => 6378136.3,
            'semi_minor_axis' => 6356751.616592146,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7034' => [
            'name' => 'Clarke 1880',
            'semi_major_axis' => 20926202.0,
            'semi_minor_axis' => 20854895.0,
            'uom' => 'urn:ogc:def:uom:EPSG::9005',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7036' => [
            'name' => 'GRS 1967',
            'semi_major_axis' => 6378160.0,
            'semi_minor_axis' => 6356774.516090714,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7041' => [
            'name' => 'Average Terrestrial System 1977',
            'semi_major_axis' => 6378135.0,
            'semi_minor_axis' => 6356750.304921594,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7042' => [
            'name' => 'Everest (1830 Definition)',
            'semi_major_axis' => 20922931.8,
            'semi_minor_axis' => 20853374.58,
            'uom' => 'urn:ogc:def:uom:EPSG::9080',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7043' => [
            'name' => 'WGS 72',
            'semi_major_axis' => 6378135.0,
            'semi_minor_axis' => 6356750.520016094,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7044' => [
            'name' => 'Everest 1830 (1962 Definition)',
            'semi_major_axis' => 6377301.243,
            'semi_minor_axis' => 6356100.230165385,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7045' => [
            'name' => 'Everest 1830 (1975 Definition)',
            'semi_major_axis' => 6377299.151,
            'semi_minor_axis' => 6356098.145120132,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7046' => [
            'name' => 'Bessel Namibia (GLM)',
            'semi_major_axis' => 6377397.155,
            'semi_minor_axis' => 6356078.962818189,
            'uom' => 'urn:ogc:def:uom:EPSG::9031',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7048' => [
            'name' => 'GRS 1980 Authalic Sphere',
            'semi_major_axis' => 6371007.0,
            'semi_minor_axis' => 6371007.0,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7049' => [
            'name' => 'IAG 1975',
            'semi_major_axis' => 6378140.0,
            'semi_minor_axis' => 6356755.288157528,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7050' => [
            'name' => 'GRS 1967 Modified',
            'semi_major_axis' => 6378160.0,
            'semi_minor_axis' => 6356774.719195306,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7051' => [
            'name' => 'Danish 1876',
            'semi_major_axis' => 6377019.27,
            'semi_minor_axis' => 6355762.5391,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7052' => [
            'name' => 'Clarke 1866 Authalic Sphere',
            'semi_major_axis' => 6370997.0,
            'semi_minor_axis' => 6370997.0,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7053' => [
            'name' => 'Hough 1960',
            'semi_major_axis' => 6378270.0,
            'semi_minor_axis' => 6356794.343434343,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7054' => [
            'name' => 'PZ-90',
            'semi_major_axis' => 6378136.0,
            'semi_minor_axis' => 6356751.361745712,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7055' => [
            'name' => 'Clarke 1880 (international foot)',
            'semi_major_axis' => 20926202.0,
            'semi_minor_axis' => 20854895.0,
            'uom' => 'urn:ogc:def:uom:EPSG::9002',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7056' => [
            'name' => 'Everest 1830 (RSO 1969)',
            'semi_major_axis' => 6377295.664,
            'semi_minor_axis' => 6356094.667915204,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7057' => [
            'name' => 'International 1924 Authalic Sphere',
            'semi_major_axis' => 6371228.0,
            'semi_minor_axis' => 6371228.0,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
        'urn:ogc:def:ellipsoid:EPSG::7058' => [
            'name' => 'Hughes 1980',
            'semi_major_axis' => 6378273.0,
            'semi_minor_axis' => 6356889.449,
            'uom' => 'urn:ogc:def:uom:EPSG::9001',
        ],
    ];

    protected $semiMajorAxis;

    protected $semiMinorAxis;

    public function __construct(Length $semiMajorAxis, Length $semiMinorAxis)
    {
        $this->semiMajorAxis = $semiMajorAxis;
        $this->semiMinorAxis = $semiMinorAxis;
    }

    public function getSemiMajorAxis(): Length
    {
        return $this->semiMajorAxis;
    }

    public function getSemiMinorAxis(): Length
    {
        return $this->semiMinorAxis;
    }

    public function getInverseFlattening(): float
    {
        return ($this->semiMajorAxis->getValue() - $this->semiMinorAxis->getValue()) / $this->semiMajorAxis->getValue();
    }

    public function getEccentricity(): float
    {
        return sqrt($this->getEccentricitySquared());
    }

    public function getEccentricitySquared(): float
    {
        return (2 * $this->getInverseFlattening()) - $this->getInverseFlattening() ** 2;
    }

    public static function fromSRID(string $srid): self
    {
        if (!isset(static::$sridData[$srid])) {
            throw new UnknownEllipsoidException($srid);
        }

        $data = static::$sridData[$srid];

        return new static(
            Length::makeUnit($data['semi_major_axis'], $data['uom']),
            Length::makeUnit($data['semi_minor_axis'], $data['uom'])
        );
    }

    public static function getSupportedSRIDs(): array
    {
        return array_map(function ($sridData) {return $sridData['name']; }, static::$sridData);
    }
}
