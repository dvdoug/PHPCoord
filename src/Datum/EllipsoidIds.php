<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Datum;

/**
 * THIS FILE IS AUTO-GENERATED.
 */
interface EllipsoidIds
{
    /**
     * Original definition is a=20923713, b=20853810 feet of 1796. 1/f is given to 7 decimal places. For the 1936
     * retriangulation OSGB defines the relationship of 10 feet of 1796 to the International metre through
     * ([10^0.48401603]/10) exactly = 0.3048007491...
     */
    public const EPSG_AIRY_1830 = 7001;

    /**
     * OSGB Airy 1830 figure (ellipsoid code 7001) rescaled by 0.999965 to best fit the scale of the 19th century
     * primary triangulation of Ireland.
     */
    public const EPSG_AIRY_MODIFIED_1849 = 7002;

    /**
     * Based on the GRS 1967 figure but with 1/f taken to 2 decimal places exactly.  The dimensions are also used as
     * the GRS 1967 Modified ellipsoid (see code 7050).
     */
    public const EPSG_AUSTRALIAN_NATIONAL_SPHEROID = 7003;

    public const EPSG_AVERAGE_TERRESTRIAL_SYSTEM_1977 = 7041;

    /**
     * Original Bessel definition is a=3272077.14 and b=3261139.33 toise. This used a weighted mean of values from
     * several authors but did not account for differences in the length of the various toise: the "Bessel toise" is
     * therefore of uncertain length.
     */
    public const EPSG_BESSEL_1841 = 7004;

    /**
     * Used in Norway and also in Sweden with a 1mm increase in semi-major axis.
     */
    public const EPSG_BESSEL_MODIFIED = 7005;

    /**
     * The semi-major axis has the same value as the Bessel 1841 ellipsoid (code 7004) but is in different units -
     * German Legal Metres rather than International metres - hence a different size.  a = 6377483.865 International
     * metres. Used in Namibia.
     */
    public const EPSG_BESSEL_NAMIBIA_GLM = 7046;

    /**
     * Defining parameters semi-major axis, flattening and angular velocity are same as for GRS 1980 (ellipsoid code
     * 7019); GM = 3986004.4e8 m*m*m/s/s (from NASA 1986 Lageos determination).
     */
    public const EPSG_CGCS2000 = 1024;

    /**
     * Clarke's 1858/II solution. Derived parameters: a = 6378293.645m using his 1865 ratio of 0.3047972654 feet per
     * metre; 1/f = 294.26068…  In Australia and Amoco Trinidad 1/f taken to two decimal places (294.26 exactly);
     * elsewhere a and b used to derive 1/f.
     */
    public const EPSG_CLARKE_1858 = 7007;

    /**
     * Original definition a=20926062 and b=20855121 (British) feet. Uses Clarke's 1865 inch-metre ratio of 39.370432
     * to obtain metres. (Metric value then converted to US survey feet for use in the US and international feet for
     * use in Cayman Islands).
     */
    public const EPSG_CLARKE_1866 = 7008;

    /**
     * Authalic sphere derived from Clarke 1866 ellipsoid (code 7008).
     */
    public const EPSG_CLARKE_1866_AUTHALIC_SPHERE = 7052;

    /**
     * Used for Michigan NAD27 State Plane zones.  Radius = ellipsoid radius + 800 feet; this approximates the average
     * elevation of the state.   Derived parameter: 1/f = 294.97870.
     */
    public const EPSG_CLARKE_1866_MICHIGAN = 7009;

    /**
     * Clarke gave a and b and also 1/f=293.465 (to 3 decimal places exactly). In the 19th century b was normally given
     * as the second defining parameter.
     */
    public const EPSG_CLARKE_1880 = 7034;

    /**
     * Adopts Clarke's value for a with derived 1/f.  Uses his 1865 ratio of 39.370432 inch per metre to convert
     * semi-major axis to metres.
     */
    public const EPSG_CLARKE_1880_ARC = 7013;

    /**
     * Adopts Clarke's values for a and b.  Uses Benoit's 1895 ratio of 0.9143992 metres per yard to convert to metres.
     */
    public const EPSG_CLARKE_1880_BENOIT = 7010;

    /**
     * Adopts Clarke's values for a and b using his 1865 ratio of 39.370432 inches per metre to convert axes to metres.
     */
    public const EPSG_CLARKE_1880_IGN = 7011;

    /**
     * Adopts Clarke's values for a and 1/f.  Adopts his 1865 ratio of 39.370432 inches per metre to convert semi-major
     * axis to metres. Also known as Clarke Modified 1880.
     */
    public const EPSG_CLARKE_1880_RGS = 7012;

    /**
     * Used in Old French Triangulation (ATF).   Uses Clarke's 1865 inch-metre ratio of 39.370432 to convert axes to
     * metres.
     */
    public const EPSG_CLARKE_1880_SGA_1922 = 7014;

    /**
     * Clarke's 1880 definition in feet assumed for the purposes of metric conversion to be international foot. a =
     * 6378306.370…metres. 1/f derived from a and b = 293.4663077… Used in Fiji.
     */
    public const EPSG_CLARKE_1880_INTERNATIONAL_FOOT = 7055;

    /**
     * Semi-major axis originally given as 3271883.25 toise. Uses toise to French metre ratio of 1.94903631 to two
     * decimal place precision. An alternative ratio with the German legal metre of 1.9490622 giving 6377104m has not
     * been used in Danish work.
     */
    public const EPSG_DANISH_1876 = 7051;

    /**
     * Everest gave a and b to 2 decimal places and also 1/f=300.8017 (to 4 decimal places exactly). In the 19th
     * century b was normally given as the second defining parameter.
     */
    public const EPSG_EVEREST_1830_DEFINITION = 7042;

    /**
     * Used for the 1937 readjustment of Indian triangulation.  Clarke's 1865 Indian-British foot ratio (0.99999566)
     * and Benoit's 1898 British inch-metre ratio (39.370113) rounded as 0.30479841 exactly and applied to Everest's
     * 1830 definition taken as a and 1/f.
     */
    public const EPSG_EVEREST_1830_1937_ADJUSTMENT = 7015;

    /**
     * Used by Pakistan since metrication.  Clarke's 1865 Indian foot-British foot ratio (0.99999566) and his 1865
     * British inch-metre ratio (39.369971) rounded with slight error as 1 Ind ft = 0.3047995m exactly and applied to
     * Everest's 1830 definition of a & b.
     */
    public const EPSG_EVEREST_1830_1962_DEFINITION = 7044;

    /**
     * Adopted 1967 for use in East Malaysia.  Applies Sears 1922 inch-metre ratio of 39.370147 to Everest 1830
     * original definition of a and 1/f but with a taken to be in British rather than Indian feet.
     */
    public const EPSG_EVEREST_1830_1967_DEFINITION = 7016;

    /**
     * Used by India since metrication.  Clarke's 1865 Indian foot-British foot ratio (0.99999566) and his 1865 British
     * inch-metre ratio (39.369971) rounded as 1 Ind ft = 0.3047995m exactly applied to Everest's 1830 original
     * definition taken as a and b.
     */
    public const EPSG_EVEREST_1830_1975_DEFINITION = 7045;

    /**
     * Adopted for 1969 metrication of peninsula Malaysia RSO grid.  Uses Sears 1922 yard-metre ratio truncated to 6
     * significant figures applied to Everest 1830 original definition of a and 1/f but with a taken to be in British
     * rather than Indian feet.
     */
    public const EPSG_EVEREST_1830_RSO_1969 = 7056;

    /**
     * Adopted 1967 for use in West Malaysia.  Applies Benoit 1898 inch-metre ratio of 39.370113 to Everest 1830
     * original definition of a and 1/f but with a taken to be in British rather than Indian feet.
     */
    public const EPSG_EVEREST_1830_MODIFIED = 7018;

    /**
     * Used for  GEM 10C Gravity Potential Model.
     */
    public const EPSG_GEM_10C = 7031;

    /**
     * Adopted by IUGG 1967 Lucerne.  1/f given is derived from geocentric gravitational constant (GM)= 398603e9
     * m*m*m/s/s; dynamic form factor (J2) = 0.0010827 and Earth's angular velocity w = 7.2921151467e-5 rad/s. See also
     * GRS 1967 Modified (code 7050).
     */
    public const EPSG_GRS_1967 = 7036;

    /**
     * Based on the GRS 1967 figure (code 7036) but with 1/f taken to 2 decimal places exactly. Used with SAD69 and
     * TWD67 datums. The dimensions are also used as the Australian National Spheroid (code 7003).
     */
    public const EPSG_GRS_1967_MODIFIED = 7050;

    /**
     * Adopted by IUGG 1979 Canberra.  Inverse flattening is derived from geocentric gravitational constant GM =
     * 3986005e8 m*m*m/s/s; dynamic form factor J2 = 108263e-8 and Earth's angular velocity = 7292115e-11 rad/s.
     */
    public const EPSG_GRS_1980 = 7019;

    /**
     * Authalic sphere derived from GRS 1980 ellipsoid (code 7019).  (An authalic sphere is one with a surface area
     * equal to the surface area of the ellipsoid). 1/f is infinite.
     */
    public const EPSG_GRS_1980_AUTHALIC_SPHERE = 7048;

    public const EPSG_GSK_2011 = 1025;

    /**
     * Helmert 1906/III solution.
     */
    public const EPSG_HELMERT_1906 = 7020;

    public const EPSG_HOUGH_1960 = 7053;

    /**
     * Used in US DMSP SSM/I microwave sensor processing software. Semi-minor axis derived from
     * eccentricity=0.081816153. Semi-major axis (a) sometimes given as 3443.992nm which OGP suspects is a derived
     * approximation. OGP conversion assumes 1nm=1852m exactly.
     */
    public const EPSG_HUGHES_1980 = 7058;

    public const EPSG_IAG_1975 = 7049;

    /**
     * Based on the GRS 1967 figure but with 1/f taken to 3 decimal places exactly.
     */
    public const EPSG_INDONESIAN_NATIONAL_SPHEROID = 7021;

    /**
     * Adopted by IUGG 1924 in Madrid. Based on Hayford 1909/1910 figures.
     */
    public const EPSG_INTERNATIONAL_1924 = 7022;

    /**
     * Authalic sphere derived from International 1924 ellipsoid (code 7022).
     */
    public const EPSG_INTERNATIONAL_1924_AUTHALIC_SPHERE = 7057;

    public const EPSG_KRASSOWSKY_1940 = 7024;

    /**
     * Used by Transit Precise Ephemeris between October 1971 and January 1987.
     */
    public const EPSG_NWL_9D = 7025;

    /**
     * Used for OSU86 gravity potential (geoidal) model.
     */
    public const EPSG_OSU86F = 7032;

    /**
     * Used for OSU91 gravity potential (geoidal) model.
     */
    public const EPSG_OSU91A = 7033;

    /**
     * Earth's angular velocity ω = 7.292115e-5 rad/sec; gravitational constant GM =  3986004.418e8 m*m*m/s/s.
     */
    public const EPSG_PZ_90 = 7054;

    /**
     * Rescaling of Delambre 1810 figure (a=6376985 m) to make meridional arc from equator to pole equal to 10000000
     * metres exactly. (Ref: Strasser).
     */
    public const EPSG_PLESSIS_1817 = 7027;

    /**
     * Sphere with radius equal to the semi-major axis of the GRS80 and WGS 84 ellipsoids. Used only for Web
     * approximate mapping and visualisation. Not recognised by geodetic authorities.
     */
    public const EPSG_POPULAR_VISUALISATION_SPHERE = 7059;

    /**
     * Authalic sphere.  1/f is infinite. Superseded by GRS 1980 authalic sphere (code 7047).
     */
    public const EPSG_SPHERE = 7035;

    /**
     * Original definition of semi-major axis given as 3272539 toise.  In "Ellipsoidisch Parameter der Erdfigur
     * (1800-1950)" , Strasser suggests a conversion factor of 1.94903631 which gives a=6378297.337 metres.
     */
    public const EPSG_STRUVE_1860 = 7028;

    public const EPSG_WGS_72 = 7043;

    /**
     * 1/f derived from four defining parameters semi-major axis; C20 = -484.16685*10e-6; earth's angular velocity ω =
     * 7292115e-11 rad/sec; gravitational constant GM = 3986005e8 m*m*m/s/s. In 1994 new GM = 3986004.418e8 m*m*m/s/s
     * but a and 1/f retained.
     */
    public const EPSG_WGS_84 = 7030;

    /**
     * In non-metric form, a=20926201 Gold Coast feet. DMA Technical Manual 8358.1 and data derived from this quotes
     * value for semi-major axis as 6378300.58m: OGP recommends use of defined value 6378300m exactly.
     */
    public const EPSG_WAR_OFFICE = 7029;

    /**
     * Defined as log a = 6.5266022 Klafter (Austrian fathom, Kl), log b = 6.5251990 Kl. a=10^6.526 6022 = 3362035 Kl.
     * Then using the Austro-Hungarian 1871 KL/m legal ratio of 1.89648384, a = 6376045m.
     */
    public const EPSG_ZACH_1812 = 1026;
}
