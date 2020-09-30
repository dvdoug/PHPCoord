<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

class CoordinateOperationMethods
{
    /**
     * Affine parametric transformation.
     */
    protected const EPSG_AFFINE_PARAMETRIC_TRANSFORMATION = 9624;

    /**
     * Albers Equal Area.
     */
    protected const EPSG_ALBERS_EQUAL_AREA = 9822;

    /**
     * American Polyconic.
     */
    protected const EPSG_AMERICAN_POLYCONIC = 9818;

    /**
     * Bonne (South Orientated).
     */
    protected const EPSG_BONNE_SOUTH_ORIENTATED = 9828;

    /**
     * Cartesian Grid Offsets
     * This transformation allows calculation of coordinates in the target system by adding the parameter value to the
     * coordinate values of the point in the source system.
     */
    protected const EPSG_CARTESIAN_GRID_OFFSETS = 9656;

    /**
     * Cassini-Soldner.
     */
    protected const EPSG_CASSINI_SOLDNER = 9806;

    /**
     * Colombia Urban.
     */
    protected const EPSG_COLOMBIA_URBAN = 1052;

    /**
     * Complex polynomial of degree 3
     * Coordinate pairs treated as complex numbers.  This exploits the correlation between the polynomial coefficients
     * and leads to a smaller number of coefficients than the general polynomial of degree 3.
     */
    protected const EPSG_COMPLEX_POLYNOMIAL_OF_DEGREE_3 = 9652;

    /**
     * Complex polynomial of degree 4
     * Coordinate pairs treated as complex numbers.  This exploits the correlation between the polynomial coefficients
     * and leads to a smaller number of coefficients than the general polynomial of degree 4.
     */
    protected const EPSG_COMPLEX_POLYNOMIAL_OF_DEGREE_4 = 9653;

    /**
     * Coordinate Frame rotation (geocentric domain)
     * This method is a specific case of the Molodensky-Badekas (CF) method (code 1034) in which the evaluation point
     * is at the geocentre with coordinate values of zero. Note the analogy with the Position Vector method (code 1033)
     * but beware of the differences!
     */
    protected const EPSG_COORDINATE_FRAME_ROTATION_GEOCENTRIC_DOMAIN = 1032;

    /**
     * Coordinate Frame rotation (geog2D domain)
     * Note the analogy with the Position Vector tfm (code 9606) but beware of the differences!  The Position Vector
     * convention is used by IAG and recommended by ISO 19111. See methods 1032 and 1038 for similar tfms operating
     * between other CRS types.
     */
    protected const EPSG_COORDINATE_FRAME_ROTATION_GEOG2D_DOMAIN = 9607;

    /**
     * Equal Earth.
     */
    protected const EPSG_EQUAL_EARTH = 1078;

    /**
     * Equidistant Cylindrical
     * See method code 1029 for spherical development. See also Pseudo Plate Carree, method code 9825.
     */
    protected const EPSG_EQUIDISTANT_CYLINDRICAL = 1028;

    /**
     * General polynomial of degree 2.
     */
    protected const EPSG_GENERAL_POLYNOMIAL_OF_DEGREE_2 = 9645;

    /**
     * General polynomial of degree 6.
     */
    protected const EPSG_GENERAL_POLYNOMIAL_OF_DEGREE_6 = 9648;

    /**
     * Geocentric translations (geocentric domain)
     * This method allows calculation of geocentric coords in the target system by adding the parameter values to the
     * corresponding coordinates of the point in the source system. See methods 1035 and 9603 for similar tfms
     * operating between other CRSs types.
     */
    protected const EPSG_GEOCENTRIC_TRANSLATIONS_GEOCENTRIC_DOMAIN = 1031;

    /**
     * Geocentric translations (geog2D domain)
     * See methods 1031 and 1035 for similar tfms operating between other CRSs types.
     */
    protected const EPSG_GEOCENTRIC_TRANSLATIONS_GEOG2D_DOMAIN = 9603;

    /**
     * Geographic/geocentric conversions
     * In applications it is often concatenated with the 3- 7- or 10-parameter transformations 9603, 9606, 9607 or
     * 9636 to form a geographic to geographic transformation.
     */
    protected const EPSG_GEOGRAPHIC_GEOCENTRIC_CONVERSIONS = 9602;

    /**
     * Geographic2D offsets
     * This transformation allows calculation of coordinates in the target system by adding the parameter value to the
     * coordinate values of the point in the source system.
     */
    protected const EPSG_GEOGRAPHIC2D_OFFSETS = 9619;

    /**
     * Geographic2D with Height Offsets
     * This transformation allows calculation of coordinates in the target system by adding the parameter value to the
     * coordinate values of the point in the source system.
     */
    protected const EPSG_GEOGRAPHIC2D_WITH_HEIGHT_OFFSETS = 9618;

    /**
     * Geographic3D to 2D conversion.
     */
    protected const EPSG_GEOGRAPHIC3D_TO_2D_CONVERSION = 9659;

    /**
     * Guam Projection
     * Simplified form of Oblique Azimuthal Equidistant projection method.
     */
    protected const EPSG_GUAM_PROJECTION = 9831;

    /**
     * Hotine Oblique Mercator (variant A).
     */
    protected const EPSG_HOTINE_OBLIQUE_MERCATOR_VARIANT_A = 9812;

    /**
     * Hotine Oblique Mercator (variant B).
     */
    protected const EPSG_HOTINE_OBLIQUE_MERCATOR_VARIANT_B = 9815;

    /**
     * Hyperbolic Cassini-Soldner.
     */
    protected const EPSG_HYPERBOLIC_CASSINI_SOLDNER = 9833;

    /**
     * Krovak.
     */
    protected const EPSG_KROVAK = 9819;

    /**
     * Krovak (North Orientated).
     */
    protected const EPSG_KROVAK_NORTH_ORIENTATED = 1041;

    /**
     * Krovak Modified
     * Incorporates a polynomial transformation which is defined to be exact and for practical purposes is considered
     * to be a map projection.
     */
    protected const EPSG_KROVAK_MODIFIED = 1042;

    /**
     * Krovak Modified (North Orientated)
     * Incorporates a polynomial transformation which is defined to be exact and for practical purposes is considered
     * to be a map projection.
     */
    protected const EPSG_KROVAK_MODIFIED_NORTH_ORIENTATED = 1043;

    /**
     * Laborde Oblique Mercator.
     */
    protected const EPSG_LABORDE_OBLIQUE_MERCATOR = 9813;

    /**
     * Lambert Azimuthal Equal Area
     * This is the ellipsoidal form of the projection.
     */
    protected const EPSG_LAMBERT_AZIMUTHAL_EQUAL_AREA = 9820;

    /**
     * Lambert Azimuthal Equal Area (Spherical)
     * This is the spherical form of the projection.  See coordinate operation method Lambert Azimuthal Equal Area
     * (code 9820) for ellipsoidal form.  Differences of several tens of metres result from comparison of the two
     * methods.
     */
    protected const EPSG_LAMBERT_AZIMUTHAL_EQUAL_AREA_SPHERICAL = 1027;

    /**
     * Lambert Conic Conformal (1SP).
     */
    protected const EPSG_LAMBERT_CONIC_CONFORMAL_1SP = 9801;

    /**
     * Lambert Conic Conformal (2SP Belgium)
     * In 2000 this modification was replaced through use of the regular Lambert Conic Conformal (2SP) method [9802]
     * with appropriately modified parameter values.
     */
    protected const EPSG_LAMBERT_CONIC_CONFORMAL_2SP_BELGIUM = 9803;

    /**
     * Lambert Conic Conformal (2SP Michigan).
     */
    protected const EPSG_LAMBERT_CONIC_CONFORMAL_2SP_MICHIGAN = 1051;

    /**
     * Lambert Conic Conformal (2SP).
     */
    protected const EPSG_LAMBERT_CONIC_CONFORMAL_2SP = 9802;

    /**
     * Lambert Conic Conformal (West Orientated).
     */
    protected const EPSG_LAMBERT_CONIC_CONFORMAL_WEST_ORIENTATED = 9826;

    /**
     * Lambert Conic Near-Conformal
     * The Lambert Near-Conformal projection is derived from the Lambert Conformal Conic projection by truncating the
     * series expansion of the projection formulae.
     */
    protected const EPSG_LAMBERT_CONIC_NEAR_CONFORMAL = 9817;

    /**
     * Lambert Cylindrical Equal Area
     * This is the ellipsoidal form of the projection.
     */
    protected const EPSG_LAMBERT_CYLINDRICAL_EQUAL_AREA = 9835;

    /**
     * Longitude rotation
     * This transformation allows calculation of the longitude of a point in the target system by adding the parameter
     * value to the longitude value of the point in the source system.
     */
    protected const EPSG_LONGITUDE_ROTATION = 9601;

    /**
     * Madrid to ED50 polynomial.
     */
    protected const EPSG_MADRID_TO_ED50_POLYNOMIAL = 9617;

    /**
     * Mercator (variant A)
     * Note that in these formulas the parameter latitude of natural origin (latO) is not used. However for this
     * Mercator (variant A) method the EPSG dataset includes this parameter, which must have a value of zero, for
     * completeness in CRS labelling.
     */
    protected const EPSG_MERCATOR_VARIANT_A = 9804;

    /**
     * Mercator (variant B)
     * Used for most nautical charts.
     */
    protected const EPSG_MERCATOR_VARIANT_B = 9805;

    /**
     * Modified Azimuthal Equidistant
     * Modified form of Oblique Azimuthal Equidistant projection method developed for Polynesian islands. For the
     * distances over which these projections are used (under 800km) this modification introduces no significant error.
     */
    protected const EPSG_MODIFIED_AZIMUTHAL_EQUIDISTANT = 9832;

    /**
     * Molodensky-Badekas (CF geog2D domain)
     * See method codes 1034 and 1039 for this operation in other coordinate domains and method code 1063 for the
     * opposite rotation convention in geographic 2D domain.
     */
    protected const EPSG_MOLODENSKY_BADEKAS_CF_GEOG2D_DOMAIN = 9636;

    /**
     * Molodensky-Badekas (PV geocentric domain)
     * See method codes 1062 and 1063 for this operation in other coordinate domains and method code 1034 for opposite
     * rotation convention in geocentric domain.
     */
    protected const EPSG_MOLODENSKY_BADEKAS_PV_GEOCENTRIC_DOMAIN = 1061;

    /**
     * Molodensky-Badekas (PV geog2D domain)
     * See method codes 1061 and 1062 for this operation in other coordinate domains and method code 9636 for opposite
     * rotation in geographic 2D domain.
     */
    protected const EPSG_MOLODENSKY_BADEKAS_PV_GEOG2D_DOMAIN = 1063;

    /**
     * New Zealand Map Grid.
     */
    protected const EPSG_NEW_ZEALAND_MAP_GRID = 9811;

    /**
     * Oblique Stereographic
     * This is not the same as the projection method of the same name in USGS Professional Paper no. 1395, "Map
     * Projections - A Working Manual" by John P. Snyder.
     */
    protected const EPSG_OBLIQUE_STEREOGRAPHIC = 9809;

    /**
     * Polar Stereographic (variant A)
     * Latitude of natural origin must be either 90 degrees or -90 degrees (or equivalent in alternative angle unit).
     */
    protected const EPSG_POLAR_STEREOGRAPHIC_VARIANT_A = 9810;

    /**
     * Polar Stereographic (variant B).
     */
    protected const EPSG_POLAR_STEREOGRAPHIC_VARIANT_B = 9829;

    /**
     * Polar Stereographic (variant C).
     */
    protected const EPSG_POLAR_STEREOGRAPHIC_VARIANT_C = 9830;

    /**
     * Popular Visualisation Pseudo Mercator
     * Applies spherical formulas to the ellipsoid. As such does not have the properties of a true Mercator projection.
     */
    protected const EPSG_POPULAR_VISUALISATION_PSEUDO_MERCATOR = 1024;

    /**
     * Position Vector transformation (geocentric domain)
     * This method is a specific case of the Molodensky-Badekas (PV) method (code 1061) in which the evaluation point
     * is the geocentre with coordinate values of zero. Note the analogy with the Coordinate Frame method (code 1032)
     * but beware of the differences!
     */
    protected const EPSG_POSITION_VECTOR_TRANSFORMATION_GEOCENTRIC_DOMAIN = 1033;

    /**
     * Position Vector transformation (geog2D domain)
     * Note the analogy with the Coordinate Frame rotation (code 9607) but beware of the differences!  The Position
     * Vector convention is used by IAG and recommended by ISO 19111. See methods 1033 and 1037 for similar tfms
     * operating between other CRS types.
     */
    protected const EPSG_POSITION_VECTOR_TRANSFORMATION_GEOG2D_DOMAIN = 9606;

    /**
     * Reversible polynomial of degree 13.
     */
    protected const EPSG_REVERSIBLE_POLYNOMIAL_OF_DEGREE_13 = 9654;

    /**
     * Reversible polynomial of degree 4
     * Reversibility is subject to constraints.  See Guidance Note 7 for conditions and clarification.
     */
    protected const EPSG_REVERSIBLE_POLYNOMIAL_OF_DEGREE_4 = 9651;

    /**
     * Similarity transformation
     * Defined for two-dimensional coordinate systems.
     */
    protected const EPSG_SIMILARITY_TRANSFORMATION = 9621;

    /**
     * Time-dependent Coordinate Frame rotation (geocen)
     * Note the analogy with the Time-dependent Position Vector transformation (code 1053) but beware of the
     * differences!  The Position Vector convention is used by IAG. See method codes 1057 and 1058 for similar methods
     * operating between other CRS types.
     */
    protected const EPSG_TIME_DEPENDENT_COORDINATE_FRAME_ROTATION_GEOCEN = 1056;

    /**
     * Time-dependent Position Vector tfm (geocentric)
     * Note the analogy with the Time-dependent Coordinate Frame rotation (code 1056) but beware of the differences!
     * The Position Vector convention is used by IAG. See method codes 1054 and 1055 for similar methods operating
     * between other CRS types.
     */
    protected const EPSG_TIME_DEPENDENT_POSITION_VECTOR_TFM_GEOCENTRIC = 1053;

    /**
     * Time-specific Coordinate Frame rotation (geocen)
     * Note the analogy with the Time-specific Position Vector method (code 1065) but beware of the differences!
     */
    protected const EPSG_TIME_SPECIFIC_COORDINATE_FRAME_ROTATION_GEOCEN = 1066;

    /**
     * Time-specific Position Vector transform (geocen)
     * Note the analogy with the Time-specifc Coordinate Frame method (code 1066) but beware of the differences!
     */
    protected const EPSG_TIME_SPECIFIC_POSITION_VECTOR_TRANSFORM_GEOCEN = 1065;

    /**
     * Transverse Mercator.
     */
    protected const EPSG_TRANSVERSE_MERCATOR = 9807;

    /**
     * Transverse Mercator (South Orientated).
     */
    protected const EPSG_TRANSVERSE_MERCATOR_SOUTH_ORIENTATED = 9808;

    /**
     * Transverse Mercator Zoned Grid System
     * If locations fall outwith the fixed zones the general Transverse Mercator method (code 9807) must be used for
     * each zone.
     */
    protected const EPSG_TRANSVERSE_MERCATOR_ZONED_GRID_SYSTEM = 9824;

    /**
     * Vertical Offset
     * This transformation allows calculation of height (or depth) in the target system by adding the parameter value
     * to the height (or depth)-value of the point in the source system.
     */
    protected const EPSG_VERTICAL_OFFSET = 9616;

    /**
     * Vertical Offset and Slope
     * This transformation allows calculation of height in the target system by applying the parameter values to the
     * height value of the point in the source system.
     */
    protected const EPSG_VERTICAL_OFFSET_AND_SLOPE = 1046;
}
