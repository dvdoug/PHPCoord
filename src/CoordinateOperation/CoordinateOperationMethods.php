<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

/**
 * @internal
 */
class CoordinateOperationMethods
{
    /**
     * Abridged Molodensky
     * This transformation is a truncated Taylor series expansion of a transformation between two geographic coordinate
     * systems, modelled as a set of geocentric translations.
     */
    public const EPSG_ABRIDGED_MOLODENSKY = 'urn:ogc:def:method:EPSG::9605';

    /**
     * Affine geometric transformation.
     */
    public const EPSG_AFFINE_GEOMETRIC_TRANSFORMATION = 'urn:ogc:def:method:EPSG::9623';

    /**
     * Affine parametric transformation.
     */
    public const EPSG_AFFINE_PARAMETRIC_TRANSFORMATION = 'urn:ogc:def:method:EPSG::9624';

    /**
     * Albers Equal Area.
     */
    public const EPSG_ALBERS_EQUAL_AREA = 'urn:ogc:def:method:EPSG::9822';

    /**
     * American Polyconic.
     */
    public const EPSG_AMERICAN_POLYCONIC = 'urn:ogc:def:method:EPSG::9818';

    /**
     * Axis Order Reversal (2D)
     * This is a parameter-less conversion to reverse the order of the axes of a 2D CRS.
     */
    public const EPSG_AXIS_ORDER_REVERSAL_2D = 'urn:ogc:def:method:EPSG::9843';

    /**
     * Axis Order Reversal (Geographic3D horizontal)
     * This is a parameter-less conversion to change the order of horizontal coordinates of a geographic 3D CRS.
     */
    public const EPSG_AXIS_ORDER_REVERSAL_GEOGRAPHIC3D_HORIZONTAL = 'urn:ogc:def:method:EPSG::9844';

    /**
     * Bonne.
     */
    public const EPSG_BONNE = 'urn:ogc:def:method:EPSG::9827';

    /**
     * Bonne (South Orientated).
     */
    public const EPSG_BONNE_SOUTH_ORIENTATED = 'urn:ogc:def:method:EPSG::9828';

    /**
     * Cartesian Grid Offsets
     * This transformation allows calculation of coordinates in the target system by adding the parameter value to the
     * coordinate values of the point in the source system.
     */
    public const EPSG_CARTESIAN_GRID_OFFSETS = 'urn:ogc:def:method:EPSG::9656';

    /**
     * Cassini-Soldner.
     */
    public const EPSG_CASSINI_SOLDNER = 'urn:ogc:def:method:EPSG::9806';

    /**
     * Change of Vertical Unit.
     */
    public const EPSG_CHANGE_OF_VERTICAL_UNIT = 'urn:ogc:def:method:EPSG::1104';

    /**
     * Colombia Urban.
     */
    public const EPSG_COLOMBIA_URBAN = 'urn:ogc:def:method:EPSG::1052';

    /**
     * Complex polynomial of degree 3
     * Coordinate pairs treated as complex numbers.  This exploits the correlation between the polynomial coefficients
     * and leads to a smaller number of coefficients than the general polynomial of degree 3.
     */
    public const EPSG_COMPLEX_POLYNOMIAL_OF_DEGREE_3 = 'urn:ogc:def:method:EPSG::9652';

    /**
     * Complex polynomial of degree 4
     * Coordinate pairs treated as complex numbers.  This exploits the correlation between the polynomial coefficients
     * and leads to a smaller number of coefficients than the general polynomial of degree 4.
     */
    public const EPSG_COMPLEX_POLYNOMIAL_OF_DEGREE_4 = 'urn:ogc:def:method:EPSG::9653';

    /**
     * Coordinate Frame rotation (geocentric domain)
     * This method is a specific case of the Molodensky-Badekas (CF) method (code 1034) in which the evaluation point
     * is at the geocentre with coordinate values of zero. Note the analogy with the Position Vector method (code 1033)
     * but beware of the differences!
     */
    public const EPSG_COORDINATE_FRAME_ROTATION_GEOCENTRIC_DOMAIN = 'urn:ogc:def:method:EPSG::1032';

    /**
     * Coordinate Frame rotation (geog2D domain)
     * Note the analogy with the Position Vector tfm (code 9606) but beware of the differences!  The Position Vector
     * convention is used by IAG and recommended by ISO 19111. See methods 1032 and 1038 for similar tfms operating
     * between other CRS types.
     */
    public const EPSG_COORDINATE_FRAME_ROTATION_GEOG2D_DOMAIN = 'urn:ogc:def:method:EPSG::9607';

    /**
     * Coordinate Frame rotation (geog3D domain)
     * Note the analogy with the Position Vector tfm (code 1037) but beware of the differences!  The Position Vector
     * convention is used by IAG and recommended by ISO 19111. See methods 1032 and 9607 for similar tfms operating
     * between other CRS types.
     */
    public const EPSG_COORDINATE_FRAME_ROTATION_GEOG3D_DOMAIN = 'urn:ogc:def:method:EPSG::1038';

    /**
     * Equal Earth.
     */
    public const EPSG_EQUAL_EARTH = 'urn:ogc:def:method:EPSG::1078';

    /**
     * Equidistant Cylindrical
     * See method code 1029 for spherical development. See also Pseudo Plate Carree, method code 9825.
     */
    public const EPSG_EQUIDISTANT_CYLINDRICAL = 'urn:ogc:def:method:EPSG::1028';

    /**
     * Equidistant Cylindrical (Spherical)
     * See method code 1028 for ellipsoidal development. If the latitude of natural origin is at the equator, also
     * known as Plate Carrée. See also Pseudo Plate Carree, method code 9825.
     */
    public const EPSG_EQUIDISTANT_CYLINDRICAL_SPHERICAL = 'urn:ogc:def:method:EPSG::1029';

    /**
     * General polynomial of degree 2.
     */
    public const EPSG_GENERAL_POLYNOMIAL_OF_DEGREE_2 = 'urn:ogc:def:method:EPSG::9645';

    /**
     * General polynomial of degree 3.
     */
    public const EPSG_GENERAL_POLYNOMIAL_OF_DEGREE_3 = 'urn:ogc:def:method:EPSG::9646';

    /**
     * General polynomial of degree 4.
     */
    public const EPSG_GENERAL_POLYNOMIAL_OF_DEGREE_4 = 'urn:ogc:def:method:EPSG::9647';

    /**
     * General polynomial of degree 6.
     */
    public const EPSG_GENERAL_POLYNOMIAL_OF_DEGREE_6 = 'urn:ogc:def:method:EPSG::9648';

    /**
     * Geocentric translation by Grid Interpolation (IGN).
     */
    public const EPSG_GEOCENTRIC_TRANSLATION_BY_GRID_INTERPOLATION_IGN = 'urn:ogc:def:method:EPSG::1087';

    /**
     * Geocentric translations (geocentric domain)
     * This method allows calculation of geocentric coords in the target system by adding the parameter values to the
     * corresponding coordinates of the point in the source system. See methods 1035 and 9603 for similar tfms
     * operating between other CRSs types.
     */
    public const EPSG_GEOCENTRIC_TRANSLATIONS_GEOCENTRIC_DOMAIN = 'urn:ogc:def:method:EPSG::1031';

    /**
     * Geocentric translations (geog2D domain)
     * See methods 1031 and 1035 for similar tfms operating between other CRSs types.
     */
    public const EPSG_GEOCENTRIC_TRANSLATIONS_GEOG2D_DOMAIN = 'urn:ogc:def:method:EPSG::9603';

    /**
     * Geocentric translations (geog3D domain)
     * See methods 1031 and 9603 for similar tfms operating between other CRSs types.
     */
    public const EPSG_GEOCENTRIC_TRANSLATIONS_GEOG3D_DOMAIN = 'urn:ogc:def:method:EPSG::1035';

    /**
     * Geocentric/topocentric conversions.
     */
    public const EPSG_GEOCENTRIC_TOPOCENTRIC_CONVERSIONS = 'urn:ogc:def:method:EPSG::9836';

    /**
     * Geog3D to Geog2D+GravityRelatedHeight (OSGM-GB).
     */
    public const EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_OSGM_GB = 'urn:ogc:def:method:EPSG::1097';

    /**
     * Geographic/geocentric conversions
     * In applications it is often concatenated with the 3- 7- or 10-parameter transformations 9603, 9606, 9607 or
     * 9636 to form a geographic to geographic transformation.
     */
    public const EPSG_GEOGRAPHIC_GEOCENTRIC_CONVERSIONS = 'urn:ogc:def:method:EPSG::9602';

    /**
     * Geographic/topocentric conversions.
     */
    public const EPSG_GEOGRAPHIC_TOPOCENTRIC_CONVERSIONS = 'urn:ogc:def:method:EPSG::9837';

    /**
     * Geographic2D offsets
     * This transformation allows calculation of coordinates in the target system by adding the parameter value to the
     * coordinate values of the point in the source system.
     */
    public const EPSG_GEOGRAPHIC2D_OFFSETS = 'urn:ogc:def:method:EPSG::9619';

    /**
     * Geographic2D with Height Offsets
     * This transformation allows calculation of coordinates in the target system by adding the parameter value to the
     * coordinate values of the point in the source system.
     */
    public const EPSG_GEOGRAPHIC2D_WITH_HEIGHT_OFFSETS = 'urn:ogc:def:method:EPSG::9618';

    /**
     * Geographic3D offsets
     * This transformation allows calculation of coordinates in the target system by adding the parameter value to the
     * coordinate values of the point in the source system.
     */
    public const EPSG_GEOGRAPHIC3D_OFFSETS = 'urn:ogc:def:method:EPSG::9660';

    /**
     * Geographic3D to 2D conversion.
     */
    public const EPSG_GEOGRAPHIC3D_TO_2D_CONVERSION = 'urn:ogc:def:method:EPSG::9659';

    /**
     * Geographic3D to GravityRelatedHeight (OSGM-GB)
     * Transformation of the vertical component of a Geographic 3D CRS to a Vertical CRS.
     */
    public const EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_OSGM_GB = 'urn:ogc:def:method:EPSG::9663';

    /**
     * Guam Projection
     * Simplified form of Oblique Azimuthal Equidistant projection method.
     */
    public const EPSG_GUAM_PROJECTION = 'urn:ogc:def:method:EPSG::9831';

    /**
     * Height Depth Reversal.
     */
    public const EPSG_HEIGHT_DEPTH_REVERSAL = 'urn:ogc:def:method:EPSG::1068';

    /**
     * Hotine Oblique Mercator (variant A).
     */
    public const EPSG_HOTINE_OBLIQUE_MERCATOR_VARIANT_A = 'urn:ogc:def:method:EPSG::9812';

    /**
     * Hotine Oblique Mercator (variant B).
     */
    public const EPSG_HOTINE_OBLIQUE_MERCATOR_VARIANT_B = 'urn:ogc:def:method:EPSG::9815';

    /**
     * Hyperbolic Cassini-Soldner.
     */
    public const EPSG_HYPERBOLIC_CASSINI_SOLDNER = 'urn:ogc:def:method:EPSG::9833';

    /**
     * Krovak.
     */
    public const EPSG_KROVAK = 'urn:ogc:def:method:EPSG::9819';

    /**
     * Krovak (North Orientated).
     */
    public const EPSG_KROVAK_NORTH_ORIENTATED = 'urn:ogc:def:method:EPSG::1041';

    /**
     * Krovak Modified
     * Incorporates a polynomial transformation which is defined to be exact and for practical purposes is considered
     * to be a map projection.
     */
    public const EPSG_KROVAK_MODIFIED = 'urn:ogc:def:method:EPSG::1042';

    /**
     * Krovak Modified (North Orientated)
     * Incorporates a polynomial transformation which is defined to be exact and for practical purposes is considered
     * to be a map projection.
     */
    public const EPSG_KROVAK_MODIFIED_NORTH_ORIENTATED = 'urn:ogc:def:method:EPSG::1043';

    /**
     * Laborde Oblique Mercator.
     */
    public const EPSG_LABORDE_OBLIQUE_MERCATOR = 'urn:ogc:def:method:EPSG::9813';

    /**
     * Lambert Azimuthal Equal Area
     * This is the ellipsoidal form of the projection.
     */
    public const EPSG_LAMBERT_AZIMUTHAL_EQUAL_AREA = 'urn:ogc:def:method:EPSG::9820';

    /**
     * Lambert Azimuthal Equal Area (Spherical)
     * This is the spherical form of the projection.  See coordinate operation method Lambert Azimuthal Equal Area
     * (code 9820) for ellipsoidal form.  Differences of several tens of metres result from comparison of the two
     * methods.
     */
    public const EPSG_LAMBERT_AZIMUTHAL_EQUAL_AREA_SPHERICAL = 'urn:ogc:def:method:EPSG::1027';

    /**
     * Lambert Conic Conformal (1SP variant B).
     */
    public const EPSG_LAMBERT_CONIC_CONFORMAL_1SP_VARIANT_B = 'urn:ogc:def:method:EPSG::1102';

    /**
     * Lambert Conic Conformal (1SP).
     */
    public const EPSG_LAMBERT_CONIC_CONFORMAL_1SP = 'urn:ogc:def:method:EPSG::9801';

    /**
     * Lambert Conic Conformal (2SP Belgium)
     * In 2000 this modification was replaced through use of the regular Lambert Conic Conformal (2SP) method [9802]
     * with appropriately modified parameter values.
     */
    public const EPSG_LAMBERT_CONIC_CONFORMAL_2SP_BELGIUM = 'urn:ogc:def:method:EPSG::9803';

    /**
     * Lambert Conic Conformal (2SP Michigan).
     */
    public const EPSG_LAMBERT_CONIC_CONFORMAL_2SP_MICHIGAN = 'urn:ogc:def:method:EPSG::1051';

    /**
     * Lambert Conic Conformal (2SP).
     */
    public const EPSG_LAMBERT_CONIC_CONFORMAL_2SP = 'urn:ogc:def:method:EPSG::9802';

    /**
     * Lambert Conic Conformal (West Orientated).
     */
    public const EPSG_LAMBERT_CONIC_CONFORMAL_WEST_ORIENTATED = 'urn:ogc:def:method:EPSG::9826';

    /**
     * Lambert Conic Near-Conformal
     * The Lambert Near-Conformal projection is derived from the Lambert Conformal Conic projection by truncating the
     * series expansion of the projection formulae.
     */
    public const EPSG_LAMBERT_CONIC_NEAR_CONFORMAL = 'urn:ogc:def:method:EPSG::9817';

    /**
     * Lambert Cylindrical Equal Area
     * This is the ellipsoidal form of the projection.
     */
    public const EPSG_LAMBERT_CYLINDRICAL_EQUAL_AREA = 'urn:ogc:def:method:EPSG::9835';

    /**
     * Lambert Cylindrical Equal Area (Spherical)
     * This is the spherical form of the projection.  See coordinate operation method Lambert Cylindrical Equal Area
     * (code 9835) for ellipsoidal form.  Differences of several tens of metres result from comparison of the two
     * methods.
     */
    public const EPSG_LAMBERT_CYLINDRICAL_EQUAL_AREA_SPHERICAL = 'urn:ogc:def:method:EPSG::9834';

    /**
     * Longitude rotation
     * This transformation allows calculation of the longitude of a point in the target system by adding the parameter
     * value to the longitude value of the point in the source system.
     */
    public const EPSG_LONGITUDE_ROTATION = 'urn:ogc:def:method:EPSG::9601';

    /**
     * Madrid to ED50 polynomial.
     */
    public const EPSG_MADRID_TO_ED50_POLYNOMIAL = 'urn:ogc:def:method:EPSG::9617';

    /**
     * Mercator (Spherical).
     */
    public const EPSG_MERCATOR_SPHERICAL = 'urn:ogc:def:method:EPSG::1026';

    /**
     * Mercator (variant A)
     * Note that in these formulas the parameter latitude of natural origin (latO) is not used. However for this
     * Mercator (variant A) method the EPSG dataset includes this parameter, which must have a value of zero, for
     * completeness in CRS labelling.
     */
    public const EPSG_MERCATOR_VARIANT_A = 'urn:ogc:def:method:EPSG::9804';

    /**
     * Mercator (variant B)
     * Used for most nautical charts.
     */
    public const EPSG_MERCATOR_VARIANT_B = 'urn:ogc:def:method:EPSG::9805';

    /**
     * Mercator (variant C).
     */
    public const EPSG_MERCATOR_VARIANT_C = 'urn:ogc:def:method:EPSG::1044';

    /**
     * Modified Azimuthal Equidistant
     * Modified form of Oblique Azimuthal Equidistant projection method developed for Polynesian islands. For the
     * distances over which these projections are used (under 800km) this modification introduces no significant error.
     */
    public const EPSG_MODIFIED_AZIMUTHAL_EQUIDISTANT = 'urn:ogc:def:method:EPSG::9832';

    /**
     * Molodensky
     * See Abridged Molodensky.
     */
    public const EPSG_MOLODENSKY = 'urn:ogc:def:method:EPSG::9604';

    /**
     * Molodensky-Badekas (CF geocentric domain)
     * See method codes 1039 and 9636 for this operation in other coordinate domains and method code 1061 for opposite
     * rotation convention in geocentric domain.
     */
    public const EPSG_MOLODENSKY_BADEKAS_CF_GEOCENTRIC_DOMAIN = 'urn:ogc:def:method:EPSG::1034';

    /**
     * Molodensky-Badekas (CF geog2D domain)
     * See method codes 1034 and 1039 for this operation in other coordinate domains and method code 1063 for the
     * opposite rotation convention in geographic 2D domain.
     */
    public const EPSG_MOLODENSKY_BADEKAS_CF_GEOG2D_DOMAIN = 'urn:ogc:def:method:EPSG::9636';

    /**
     * Molodensky-Badekas (CF geog3D domain)
     * See method codes 1034 and 9636 for this operation in other coordinate domains and method code 1062 for opposite
     * rotation convention in geographic 3D domain.
     */
    public const EPSG_MOLODENSKY_BADEKAS_CF_GEOG3D_DOMAIN = 'urn:ogc:def:method:EPSG::1039';

    /**
     * Molodensky-Badekas (PV geocentric domain)
     * See method codes 1062 and 1063 for this operation in other coordinate domains and method code 1034 for opposite
     * rotation convention in geocentric domain.
     */
    public const EPSG_MOLODENSKY_BADEKAS_PV_GEOCENTRIC_DOMAIN = 'urn:ogc:def:method:EPSG::1061';

    /**
     * Molodensky-Badekas (PV geog2D domain)
     * See method codes 1061 and 1062 for this operation in other coordinate domains and method code 9636 for opposite
     * rotation in geographic 2D domain.
     */
    public const EPSG_MOLODENSKY_BADEKAS_PV_GEOG2D_DOMAIN = 'urn:ogc:def:method:EPSG::1063';

    /**
     * Molodensky-Badekas (PV geog3D domain)
     * See method codes 1061 and 1063 for this operation in other coordinate domains and method code 1039 for opposite
     * rotation convention in geographic 3D domain.
     */
    public const EPSG_MOLODENSKY_BADEKAS_PV_GEOG3D_DOMAIN = 'urn:ogc:def:method:EPSG::1062';

    /**
     * NADCON5 (2D)
     * Geodetic transformation operating on geographic coordinate differences by bi-quadratic interpolation.  Input
     * expects longitudes to be positive east in range 0-360° (0° = Greenwich).
     */
    public const EPSG_NADCON5_2D = 'urn:ogc:def:method:EPSG::1074';

    /**
     * NADCON5 (3D)
     * Geodetic transformation operating on geographic coordinate differences by bi-quadratic interpolation.  Input
     * expects longitudes to be positive east in range 0-360° (0° = Greenwich).
     */
    public const EPSG_NADCON5_3D = 'urn:ogc:def:method:EPSG::1075';

    /**
     * NTv2
     * Geodetic transformation operating on geographic coordinate differences by bi-linear interpolation.  Supersedes
     * NTv1 (transformation method code 9614).  Input expects longitudes to be positive west.
     */
    public const EPSG_NTV2 = 'urn:ogc:def:method:EPSG::9615';

    /**
     * New Zealand Map Grid.
     */
    public const EPSG_NEW_ZEALAND_MAP_GRID = 'urn:ogc:def:method:EPSG::9811';

    /**
     * Oblique Stereographic
     * This is not the same as the projection method of the same name in USGS Professional Paper no. 1395, "Map
     * Projections - A Working Manual" by John P. Snyder.
     */
    public const EPSG_OBLIQUE_STEREOGRAPHIC = 'urn:ogc:def:method:EPSG::9809';

    /**
     * Ordnance Survey National Transformation
     * Geodetic transformation between ETRS89 (or WGS 84) and OSGB36 / National Grid.  Uses ETRS89 / National Grid as
     * an intermediate coordinate system for bi-linear interpolation of gridded grid coordinate differences.
     */
    public const EPSG_ORDNANCE_SURVEY_NATIONAL_TRANSFORMATION = 'urn:ogc:def:method:EPSG::9633';

    /**
     * Orthographic
     * If the natural origin of the projection is at the topocentric origin, this is a special case of the Vertical
     * Perspective (orthographic case) (method code 9839) in which the ellipsoid height of all mapped points is zero (h
     * = 0).
     */
    public const EPSG_ORTHOGRAPHIC = 'urn:ogc:def:method:EPSG::9840';

    /**
     * Point motion (ellipsoidal).
     */
    public const EPSG_POINT_MOTION_ELLIPSOIDAL = 'urn:ogc:def:method:EPSG::1067';

    /**
     * Point motion (geocentric Cartesian).
     */
    public const EPSG_POINT_MOTION_GEOCENTRIC_CARTESIAN = 'urn:ogc:def:method:EPSG::1064';

    /**
     * Polar Stereographic (variant A)
     * Latitude of natural origin must be either 90 degrees or -90 degrees (or equivalent in alternative angle unit).
     */
    public const EPSG_POLAR_STEREOGRAPHIC_VARIANT_A = 'urn:ogc:def:method:EPSG::9810';

    /**
     * Polar Stereographic (variant B).
     */
    public const EPSG_POLAR_STEREOGRAPHIC_VARIANT_B = 'urn:ogc:def:method:EPSG::9829';

    /**
     * Polar Stereographic (variant C).
     */
    public const EPSG_POLAR_STEREOGRAPHIC_VARIANT_C = 'urn:ogc:def:method:EPSG::9830';

    /**
     * Popular Visualisation Pseudo Mercator
     * Applies spherical formulas to the ellipsoid. As such does not have the properties of a true Mercator projection.
     */
    public const EPSG_POPULAR_VISUALISATION_PSEUDO_MERCATOR = 'urn:ogc:def:method:EPSG::1024';

    /**
     * Position Vector transformation (geocentric domain)
     * This method is a specific case of the Molodensky-Badekas (PV) method (code 1061) in which the evaluation point
     * is the geocentre with coordinate values of zero. Note the analogy with the Coordinate Frame method (code 1032)
     * but beware of the differences!
     */
    public const EPSG_POSITION_VECTOR_TRANSFORMATION_GEOCENTRIC_DOMAIN = 'urn:ogc:def:method:EPSG::1033';

    /**
     * Position Vector transformation (geog2D domain)
     * Note the analogy with the Coordinate Frame rotation (code 9607) but beware of the differences!  The Position
     * Vector convention is used by IAG and recommended by ISO 19111. See methods 1033 and 1037 for similar tfms
     * operating between other CRS types.
     */
    public const EPSG_POSITION_VECTOR_TRANSFORMATION_GEOG2D_DOMAIN = 'urn:ogc:def:method:EPSG::9606';

    /**
     * Position Vector transformation (geog3D domain)
     * Note the analogy with the Coordinate Frame rotation (code 1038) but beware of the differences!  The Position
     * Vector convention is used by IAG and recommended by ISO 19111. See methods 1033 and 9606 for similar tfms
     * operating between other CRS types.
     */
    public const EPSG_POSITION_VECTOR_TRANSFORMATION_GEOG3D_DOMAIN = 'urn:ogc:def:method:EPSG::1037';

    /**
     * Pseudo Plate Carree
     * Used only for depiction of graticule (latitude/longitude) coordinates on a computer display. The axes units are
     * decimal degrees and of variable scale. The origin is at Lat = 0, Long = 0. See Equidistant Cylindrical, code
     * 1029, for proper Plate Carrée.
     */
    public const EPSG_PSEUDO_PLATE_CARREE = 'urn:ogc:def:method:EPSG::9825';

    /**
     * Reversible polynomial of degree 13.
     */
    public const EPSG_REVERSIBLE_POLYNOMIAL_OF_DEGREE_13 = 'urn:ogc:def:method:EPSG::9654';

    /**
     * Reversible polynomial of degree 2
     * Reversibility is subject to constraints.  See Guidance Note 7 for conditions and clarification.
     */
    public const EPSG_REVERSIBLE_POLYNOMIAL_OF_DEGREE_2 = 'urn:ogc:def:method:EPSG::9649';

    /**
     * Reversible polynomial of degree 3
     * Reversibility is subject to constraints.  See Guidance Note 7 for conditions and clarification.
     */
    public const EPSG_REVERSIBLE_POLYNOMIAL_OF_DEGREE_3 = 'urn:ogc:def:method:EPSG::9650';

    /**
     * Reversible polynomial of degree 4
     * Reversibility is subject to constraints.  See Guidance Note 7 for conditions and clarification.
     */
    public const EPSG_REVERSIBLE_POLYNOMIAL_OF_DEGREE_4 = 'urn:ogc:def:method:EPSG::9651';

    /**
     * Similarity transformation
     * Defined for two-dimensional coordinate systems.
     */
    public const EPSG_SIMILARITY_TRANSFORMATION = 'urn:ogc:def:method:EPSG::9621';

    /**
     * Swiss Oblique Cylindrical
     * Can be accommodated by Oblique Mercator method (code 9815), for which this method is an approximation (see BfL
     * document swissprojectionen.pdf at www.swisstopo.com).
     */
    public const EPSG_SWISS_OBLIQUE_CYLINDRICAL = 'urn:ogc:def:method:EPSG::9814';

    /**
     * Time-dependent Coordinate Frame rotation (geocen)
     * Note the analogy with the Time-dependent Position Vector transformation (code 1053) but beware of the
     * differences!  The Position Vector convention is used by IAG. See method codes 1057 and 1058 for similar methods
     * operating between other CRS types.
     */
    public const EPSG_TIME_DEPENDENT_COORDINATE_FRAME_ROTATION_GEOCEN = 'urn:ogc:def:method:EPSG::1056';

    /**
     * Time-dependent Coordinate Frame rotation (geog2D)
     * Note the analogy with the Time-dependent Position Vector transformation (code 1054) but beware of the
     * differences!  The Position Vector convention is used by IAG. See methods 1056 and 1058 for similar tfms
     * operating between other CRS types.
     */
    public const EPSG_TIME_DEPENDENT_COORDINATE_FRAME_ROTATION_GEOG2D = 'urn:ogc:def:method:EPSG::1057';

    /**
     * Time-dependent Coordinate Frame rotation (geog3D)
     * Note the analogy with the Time-dependent Position Vector transformation (code 1055) but beware of the
     * differences!  The Position Vector convention is used by IAG. See method codes 1056 and 1057 for similar methods
     * operating between other CRS types.
     */
    public const EPSG_TIME_DEPENDENT_COORDINATE_FRAME_ROTATION_GEOG3D = 'urn:ogc:def:method:EPSG::1058';

    /**
     * Time-dependent Position Vector tfm (geocentric)
     * Note the analogy with the Time-dependent Coordinate Frame rotation (code 1056) but beware of the differences!
     * The Position Vector convention is used by IAG. See method codes 1054 and 1055 for similar methods operating
     * between other CRS types.
     */
    public const EPSG_TIME_DEPENDENT_POSITION_VECTOR_TFM_GEOCENTRIC = 'urn:ogc:def:method:EPSG::1053';

    /**
     * Time-dependent Position Vector tfm (geog2D)
     * Note the analogy with the Time-dependent Coordinate Frame rotation (code 1057) but beware of the differences!
     * The Position Vector convention is used by IAG. See method codes 1053 and 1055 for similar methods operating
     * between other CRS types.
     */
    public const EPSG_TIME_DEPENDENT_POSITION_VECTOR_TFM_GEOG2D = 'urn:ogc:def:method:EPSG::1054';

    /**
     * Time-dependent Position Vector tfm (geog3D)
     * Note the analogy with the Coordinate Frame rotation (code 1058) but beware of the differences!  The Position
     * Vector convention is used by IAG. See method codes 1053 and 1054 for similar methods operating between other CRS
     * types.
     */
    public const EPSG_TIME_DEPENDENT_POSITION_VECTOR_TFM_GEOG3D = 'urn:ogc:def:method:EPSG::1055';

    /**
     * Time-specific Coordinate Frame rotation (geocen)
     * Note the analogy with the Time-specific Position Vector method (code 1065) but beware of the differences!
     */
    public const EPSG_TIME_SPECIFIC_COORDINATE_FRAME_ROTATION_GEOCEN = 'urn:ogc:def:method:EPSG::1066';

    /**
     * Time-specific Position Vector transform (geocen)
     * Note the analogy with the Time-specifc Coordinate Frame method (code 1066) but beware of the differences!
     */
    public const EPSG_TIME_SPECIFIC_POSITION_VECTOR_TRANSFORM_GEOCEN = 'urn:ogc:def:method:EPSG::1065';

    /**
     * Transverse Mercator.
     */
    public const EPSG_TRANSVERSE_MERCATOR = 'urn:ogc:def:method:EPSG::9807';

    /**
     * Transverse Mercator (South Orientated).
     */
    public const EPSG_TRANSVERSE_MERCATOR_SOUTH_ORIENTATED = 'urn:ogc:def:method:EPSG::9808';

    /**
     * Transverse Mercator Zoned Grid System
     * If locations fall outwith the fixed zones the general Transverse Mercator method (code 9807) must be used for
     * each zone.
     */
    public const EPSG_TRANSVERSE_MERCATOR_ZONED_GRID_SYSTEM = 'urn:ogc:def:method:EPSG::9824';

    /**
     * Vertical Offset
     * This transformation allows calculation of height (or depth) in the target system by adding the parameter value
     * to the height (or depth)-value of the point in the source system.
     */
    public const EPSG_VERTICAL_OFFSET = 'urn:ogc:def:method:EPSG::9616';

    /**
     * Vertical Offset and Slope
     * This transformation allows calculation of height in the target system by applying the parameter values to the
     * height value of the point in the source system.
     */
    public const EPSG_VERTICAL_OFFSET_AND_SLOPE = 'urn:ogc:def:method:EPSG::1046';

    /**
     * Vertical Perspective
     * For a viewing point height approaching or at infinity, see the Vertical Perspective (orthographic case) (method
     * code 9839).
     */
    public const EPSG_VERTICAL_PERSPECTIVE = 'urn:ogc:def:method:EPSG::9838';

    /**
     * Vertical Perspective (Orthographic case)
     * This is a special case of the general Vertical Perspective (method code 9838) in which the viewing point at
     * infinity.
     */
    public const EPSG_VERTICAL_PERSPECTIVE_ORTHOGRAPHIC_CASE = 'urn:ogc:def:method:EPSG::9839';

    /**
     * zero-tide height to mean-tide height (EVRF2019)
     * The offset of -0.08593 is applied to force EVRF2019 mean-tide height to be equal to EVRF2019 height at the
     * EVRF2019 nominal origin at Amsterdams Peil.
     */
    public const EPSG_ZERO_TIDE_HEIGHT_TO_MEAN_TIDE_HEIGHT_EVRF2019 = 'urn:ogc:def:method:EPSG::1107';

    private const METHOD_CODE_TO_IMPLEMENTATION_LOOKUP = [
        self::EPSG_GEOGRAPHIC_GEOCENTRIC_CONVERSIONS => 'geographicGeocentric',
        self::EPSG_GEOCENTRIC_TRANSLATIONS_GEOCENTRIC_DOMAIN => 'geocentricTranslation',
        self::EPSG_GEOCENTRIC_TRANSLATIONS_GEOG2D_DOMAIN => 'geocentricTranslation',
        self::EPSG_COORDINATE_FRAME_ROTATION_GEOCENTRIC_DOMAIN => 'coordinateFrameRotation',
        self::EPSG_COORDINATE_FRAME_ROTATION_GEOG2D_DOMAIN => 'coordinateFrameRotation',
        self::EPSG_TIME_DEPENDENT_COORDINATE_FRAME_ROTATION_GEOCEN => 'timeDependentCoordinateFrameRotation',
        self::EPSG_TIME_SPECIFIC_COORDINATE_FRAME_ROTATION_GEOCEN => 'timeSpecificCoordinateFrameRotation',
        self::EPSG_POSITION_VECTOR_TRANSFORMATION_GEOCENTRIC_DOMAIN => 'positionVectorTransformation',
        self::EPSG_POSITION_VECTOR_TRANSFORMATION_GEOG2D_DOMAIN => 'positionVectorTransformation',
        self::EPSG_TIME_DEPENDENT_POSITION_VECTOR_TFM_GEOCENTRIC => 'timeDependentPositionVectorTransformation',
        self::EPSG_TIME_SPECIFIC_POSITION_VECTOR_TRANSFORM_GEOCEN => 'timeSpecificPositionVectorTransformation',
        self::EPSG_MOLODENSKY_BADEKAS_CF_GEOG2D_DOMAIN => 'coordinateFrameMolodenskyBadekas',
        self::EPSG_MOLODENSKY_BADEKAS_PV_GEOCENTRIC_DOMAIN => 'positionVectorMolodenskyBadekas',
        self::EPSG_MOLODENSKY_BADEKAS_PV_GEOG2D_DOMAIN => 'positionVectorMolodenskyBadekas',
        self::EPSG_AFFINE_PARAMETRIC_TRANSFORMATION => 'affineParametricTransform',
        self::EPSG_ALBERS_EQUAL_AREA => 'albersEqualArea',
        self::EPSG_AMERICAN_POLYCONIC => 'americanPolyconic',
        self::EPSG_BONNE_SOUTH_ORIENTATED => 'bonneSouthOrientated',
        self::EPSG_CARTESIAN_GRID_OFFSETS => 'offsets',
        self::EPSG_CASSINI_SOLDNER => 'cassiniSoldner',
        self::EPSG_HYPERBOLIC_CASSINI_SOLDNER => 'hyperbolicCassiniSoldner',
        self::EPSG_COLOMBIA_URBAN => 'columbiaUrban',
        self::EPSG_EQUAL_EARTH => 'equalEarth',
        self::EPSG_EQUIDISTANT_CYLINDRICAL => 'equidistantCylindrical',
        self::EPSG_GEOGRAPHIC3D_TO_2D_CONVERSION => 'threeDToTwoD',
        self::EPSG_GUAM_PROJECTION => 'guamProjection',
        self::EPSG_KROVAK => 'krovak',
        self::EPSG_KROVAK_NORTH_ORIENTATED => 'krovak',
        self::EPSG_KROVAK_MODIFIED => 'krovakModified',
        self::EPSG_KROVAK_MODIFIED_NORTH_ORIENTATED => 'krovakModified',
        self::EPSG_LAMBERT_AZIMUTHAL_EQUAL_AREA => 'lambertAzimuthalEqualArea',
        self::EPSG_LAMBERT_AZIMUTHAL_EQUAL_AREA_SPHERICAL => 'lambertAzimuthalEqualAreaSpherical',
        self::EPSG_LAMBERT_CONIC_CONFORMAL_1SP => 'lambertConicConformal1SP',
        self::EPSG_LAMBERT_CONIC_CONFORMAL_1SP_VARIANT_B => 'lambertConicConformal1SPVariantB',
        self::EPSG_LAMBERT_CONIC_CONFORMAL_2SP_BELGIUM => 'lambertConicConformal2SPBelgium',
        self::EPSG_LAMBERT_CONIC_CONFORMAL_2SP_MICHIGAN => 'lambertConicConformal2SPMichigan',
        self::EPSG_LAMBERT_CONIC_CONFORMAL_2SP => 'lambertConicConformal2SP',
        self::EPSG_LAMBERT_CONIC_CONFORMAL_WEST_ORIENTATED => 'lambertConicConformalWestOrientated',
        self::EPSG_LAMBERT_CONIC_NEAR_CONFORMAL => 'lambertConicNearConformal',
        self::EPSG_LAMBERT_CYLINDRICAL_EQUAL_AREA => 'lambertCylindricalEqualArea',
        self::EPSG_MODIFIED_AZIMUTHAL_EQUIDISTANT => 'modifiedAzimuthalEquidistant',
        self::EPSG_OBLIQUE_STEREOGRAPHIC => 'obliqueStereographic',
        self::EPSG_POLAR_STEREOGRAPHIC_VARIANT_A => 'polarStereographicVariantA',
        self::EPSG_POLAR_STEREOGRAPHIC_VARIANT_B => 'polarStereographicVariantB',
        self::EPSG_POLAR_STEREOGRAPHIC_VARIANT_C => 'polarStereographicVariantC',
        self::EPSG_POPULAR_VISUALISATION_PSEUDO_MERCATOR => 'popularVisualisationPseudoMercator',
        self::EPSG_SIMILARITY_TRANSFORMATION => 'similarityTransformation',
        self::EPSG_MERCATOR_VARIANT_A => 'mercatorVariantA',
        self::EPSG_MERCATOR_VARIANT_B => 'mercatorVariantB',
        self::EPSG_GEOGRAPHIC2D_OFFSETS => 'geographic2DOffsets',
        self::EPSG_GEOGRAPHIC2D_WITH_HEIGHT_OFFSETS => 'geographic2DWithHeightOffsets',
        self::EPSG_LONGITUDE_ROTATION => 'longitudeRotation',
        self::EPSG_HOTINE_OBLIQUE_MERCATOR_VARIANT_A => 'obliqueMercatorHotineVariantA',
        self::EPSG_HOTINE_OBLIQUE_MERCATOR_VARIANT_B => 'obliqueMercatorHotineVariantB',
        self::EPSG_TRANSVERSE_MERCATOR => 'transverseMercator',
        self::EPSG_TRANSVERSE_MERCATOR_SOUTH_ORIENTATED => 'transverseMercator',
        self::EPSG_TRANSVERSE_MERCATOR_ZONED_GRID_SYSTEM => 'transverseMercatorZonedGrid',
        self::EPSG_VERTICAL_OFFSET => 'verticalOffset',
        self::EPSG_VERTICAL_OFFSET_AND_SLOPE => 'verticalOffsetAndSlope',
        self::EPSG_GENERAL_POLYNOMIAL_OF_DEGREE_2 => 'generalPolynomial',
        self::EPSG_GENERAL_POLYNOMIAL_OF_DEGREE_6 => 'generalPolynomial',
        self::EPSG_REVERSIBLE_POLYNOMIAL_OF_DEGREE_4 => 'reversiblePolynomial',
        self::EPSG_REVERSIBLE_POLYNOMIAL_OF_DEGREE_13 => 'reversiblePolynomial',
        self::EPSG_NEW_ZEALAND_MAP_GRID => 'newZealandMapGrid',
        self::EPSG_LABORDE_OBLIQUE_MERCATOR => 'obliqueMercatorLaborde',
        self::EPSG_MADRID_TO_ED50_POLYNOMIAL => 'madridToED50Polynomial',
        self::EPSG_COMPLEX_POLYNOMIAL_OF_DEGREE_3 => 'complexPolynomial',
        self::EPSG_COMPLEX_POLYNOMIAL_OF_DEGREE_4 => 'complexPolynomial',
        self::EPSG_AXIS_ORDER_REVERSAL_2D => 'axisReversal',
        self::EPSG_AXIS_ORDER_REVERSAL_GEOGRAPHIC3D_HORIZONTAL => 'axisReversal',
        self::EPSG_HEIGHT_DEPTH_REVERSAL => 'heightDepthReversal',
        self::EPSG_CHANGE_OF_VERTICAL_UNIT => 'changeOfVerticalUnit',
        self::EPSG_ORDNANCE_SURVEY_NATIONAL_TRANSFORMATION => 'OSTN15',
        self::EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_OSGM_GB => 'geographic3DTo2DPlusGravityHeightOSGM15',
        self::EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_OSGM_GB => 'geographic3DToGravityHeightOSGM15',
        self::EPSG_NADCON5_2D => 'NADCON5',
        self::EPSG_NADCON5_3D => 'NADCON5',
        self::EPSG_NTV2 => 'NTv2',
        self::EPSG_ZERO_TIDE_HEIGHT_TO_MEAN_TIDE_HEIGHT_EVRF2019 => 'zeroTideHeightToMeanTideHeightEVRF2019',
        self::EPSG_GEOCENTRIC_TRANSLATION_BY_GRID_INTERPOLATION_IGN => 'geocentricTranslationByGridInterpolationIGNF',
    ];

    public static function getFunctionName(string $srid): string
    {
        return self::METHOD_CODE_TO_IMPLEMENTATION_LOOKUP[$srid];
    }
}
