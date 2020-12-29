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
    protected const EPSG_AFFINE_PARAMETRIC_TRANSFORMATION = 'urn:ogc:def:method:EPSG::9624';

    /**
     * Albers Equal Area.
     */
    protected const EPSG_ALBERS_EQUAL_AREA = 'urn:ogc:def:method:EPSG::9822';

    /**
     * American Polyconic.
     */
    protected const EPSG_AMERICAN_POLYCONIC = 'urn:ogc:def:method:EPSG::9818';

    /**
     * Bonne (South Orientated).
     */
    protected const EPSG_BONNE_SOUTH_ORIENTATED = 'urn:ogc:def:method:EPSG::9828';

    /**
     * Cartesian Grid Offsets
     * This transformation allows calculation of coordinates in the target system by adding the parameter value to the
     * coordinate values of the point in the source system.
     */
    protected const EPSG_CARTESIAN_GRID_OFFSETS = 'urn:ogc:def:method:EPSG::9656';

    /**
     * Cassini-Soldner.
     */
    protected const EPSG_CASSINI_SOLDNER = 'urn:ogc:def:method:EPSG::9806';

    /**
     * Colombia Urban.
     */
    protected const EPSG_COLOMBIA_URBAN = 'urn:ogc:def:method:EPSG::1052';

    /**
     * Complex polynomial of degree 3
     * Coordinate pairs treated as complex numbers.  This exploits the correlation between the polynomial coefficients
     * and leads to a smaller number of coefficients than the general polynomial of degree 3.
     */
    protected const EPSG_COMPLEX_POLYNOMIAL_OF_DEGREE_3 = 'urn:ogc:def:method:EPSG::9652';

    /**
     * Complex polynomial of degree 4
     * Coordinate pairs treated as complex numbers.  This exploits the correlation between the polynomial coefficients
     * and leads to a smaller number of coefficients than the general polynomial of degree 4.
     */
    protected const EPSG_COMPLEX_POLYNOMIAL_OF_DEGREE_4 = 'urn:ogc:def:method:EPSG::9653';

    /**
     * Coordinate Frame rotation (geocentric domain)
     * This method is a specific case of the Molodensky-Badekas (CF) method (code 1034) in which the evaluation point
     * is at the geocentre with coordinate values of zero. Note the analogy with the Position Vector method (code 1033)
     * but beware of the differences!
     */
    protected const EPSG_COORDINATE_FRAME_ROTATION_GEOCENTRIC_DOMAIN = 'urn:ogc:def:method:EPSG::1032';

    /**
     * Coordinate Frame rotation (geog2D domain)
     * Note the analogy with the Position Vector tfm (code 9606) but beware of the differences!  The Position Vector
     * convention is used by IAG and recommended by ISO 19111. See methods 1032 and 1038 for similar tfms operating
     * between other CRS types.
     */
    protected const EPSG_COORDINATE_FRAME_ROTATION_GEOG2D_DOMAIN = 'urn:ogc:def:method:EPSG::9607';

    /**
     * Equal Earth.
     */
    protected const EPSG_EQUAL_EARTH = 'urn:ogc:def:method:EPSG::1078';

    /**
     * Equidistant Cylindrical
     * See method code 1029 for spherical development. See also Pseudo Plate Carree, method code 9825.
     */
    protected const EPSG_EQUIDISTANT_CYLINDRICAL = 'urn:ogc:def:method:EPSG::1028';

    /**
     * General polynomial of degree 2.
     */
    protected const EPSG_GENERAL_POLYNOMIAL_OF_DEGREE_2 = 'urn:ogc:def:method:EPSG::9645';

    /**
     * General polynomial of degree 6.
     */
    protected const EPSG_GENERAL_POLYNOMIAL_OF_DEGREE_6 = 'urn:ogc:def:method:EPSG::9648';

    /**
     * Geocentric translations (geocentric domain)
     * This method allows calculation of geocentric coords in the target system by adding the parameter values to the
     * corresponding coordinates of the point in the source system. See methods 1035 and 9603 for similar tfms
     * operating between other CRSs types.
     */
    protected const EPSG_GEOCENTRIC_TRANSLATIONS_GEOCENTRIC_DOMAIN = 'urn:ogc:def:method:EPSG::1031';

    /**
     * Geocentric translations (geog2D domain)
     * See methods 1031 and 1035 for similar tfms operating between other CRSs types.
     */
    protected const EPSG_GEOCENTRIC_TRANSLATIONS_GEOG2D_DOMAIN = 'urn:ogc:def:method:EPSG::9603';

    /**
     * Geographic/geocentric conversions
     * In applications it is often concatenated with the 3- 7- or 10-parameter transformations 9603, 9606, 9607 or
     * 9636 to form a geographic to geographic transformation.
     */
    protected const EPSG_GEOGRAPHIC_GEOCENTRIC_CONVERSIONS = 'urn:ogc:def:method:EPSG::9602';

    /**
     * Geographic2D offsets
     * This transformation allows calculation of coordinates in the target system by adding the parameter value to the
     * coordinate values of the point in the source system.
     */
    protected const EPSG_GEOGRAPHIC2D_OFFSETS = 'urn:ogc:def:method:EPSG::9619';

    /**
     * Geographic2D with Height Offsets
     * This transformation allows calculation of coordinates in the target system by adding the parameter value to the
     * coordinate values of the point in the source system.
     */
    protected const EPSG_GEOGRAPHIC2D_WITH_HEIGHT_OFFSETS = 'urn:ogc:def:method:EPSG::9618';

    /**
     * Geographic3D to 2D conversion.
     */
    protected const EPSG_GEOGRAPHIC3D_TO_2D_CONVERSION = 'urn:ogc:def:method:EPSG::9659';

    /**
     * Guam Projection
     * Simplified form of Oblique Azimuthal Equidistant projection method.
     */
    protected const EPSG_GUAM_PROJECTION = 'urn:ogc:def:method:EPSG::9831';

    /**
     * Hotine Oblique Mercator (variant A).
     */
    protected const EPSG_HOTINE_OBLIQUE_MERCATOR_VARIANT_A = 'urn:ogc:def:method:EPSG::9812';

    /**
     * Hotine Oblique Mercator (variant B).
     */
    protected const EPSG_HOTINE_OBLIQUE_MERCATOR_VARIANT_B = 'urn:ogc:def:method:EPSG::9815';

    /**
     * Hyperbolic Cassini-Soldner.
     */
    protected const EPSG_HYPERBOLIC_CASSINI_SOLDNER = 'urn:ogc:def:method:EPSG::9833';

    /**
     * Krovak.
     */
    protected const EPSG_KROVAK = 'urn:ogc:def:method:EPSG::9819';

    /**
     * Krovak (North Orientated).
     */
    protected const EPSG_KROVAK_NORTH_ORIENTATED = 'urn:ogc:def:method:EPSG::1041';

    /**
     * Krovak Modified
     * Incorporates a polynomial transformation which is defined to be exact and for practical purposes is considered
     * to be a map projection.
     */
    protected const EPSG_KROVAK_MODIFIED = 'urn:ogc:def:method:EPSG::1042';

    /**
     * Krovak Modified (North Orientated)
     * Incorporates a polynomial transformation which is defined to be exact and for practical purposes is considered
     * to be a map projection.
     */
    protected const EPSG_KROVAK_MODIFIED_NORTH_ORIENTATED = 'urn:ogc:def:method:EPSG::1043';

    /**
     * Laborde Oblique Mercator.
     */
    protected const EPSG_LABORDE_OBLIQUE_MERCATOR = 'urn:ogc:def:method:EPSG::9813';

    /**
     * Lambert Azimuthal Equal Area
     * This is the ellipsoidal form of the projection.
     */
    protected const EPSG_LAMBERT_AZIMUTHAL_EQUAL_AREA = 'urn:ogc:def:method:EPSG::9820';

    /**
     * Lambert Azimuthal Equal Area (Spherical)
     * This is the spherical form of the projection.  See coordinate operation method Lambert Azimuthal Equal Area
     * (code 9820) for ellipsoidal form.  Differences of several tens of metres result from comparison of the two
     * methods.
     */
    protected const EPSG_LAMBERT_AZIMUTHAL_EQUAL_AREA_SPHERICAL = 'urn:ogc:def:method:EPSG::1027';

    /**
     * Lambert Conic Conformal (1SP).
     */
    protected const EPSG_LAMBERT_CONIC_CONFORMAL_1SP = 'urn:ogc:def:method:EPSG::9801';

    /**
     * Lambert Conic Conformal (2SP Belgium)
     * In 2000 this modification was replaced through use of the regular Lambert Conic Conformal (2SP) method [9802]
     * with appropriately modified parameter values.
     */
    protected const EPSG_LAMBERT_CONIC_CONFORMAL_2SP_BELGIUM = 'urn:ogc:def:method:EPSG::9803';

    /**
     * Lambert Conic Conformal (2SP Michigan).
     */
    protected const EPSG_LAMBERT_CONIC_CONFORMAL_2SP_MICHIGAN = 'urn:ogc:def:method:EPSG::1051';

    /**
     * Lambert Conic Conformal (2SP).
     */
    protected const EPSG_LAMBERT_CONIC_CONFORMAL_2SP = 'urn:ogc:def:method:EPSG::9802';

    /**
     * Lambert Conic Conformal (West Orientated).
     */
    protected const EPSG_LAMBERT_CONIC_CONFORMAL_WEST_ORIENTATED = 'urn:ogc:def:method:EPSG::9826';

    /**
     * Lambert Conic Near-Conformal
     * The Lambert Near-Conformal projection is derived from the Lambert Conformal Conic projection by truncating the
     * series expansion of the projection formulae.
     */
    protected const EPSG_LAMBERT_CONIC_NEAR_CONFORMAL = 'urn:ogc:def:method:EPSG::9817';

    /**
     * Lambert Cylindrical Equal Area
     * This is the ellipsoidal form of the projection.
     */
    protected const EPSG_LAMBERT_CYLINDRICAL_EQUAL_AREA = 'urn:ogc:def:method:EPSG::9835';

    /**
     * Longitude rotation
     * This transformation allows calculation of the longitude of a point in the target system by adding the parameter
     * value to the longitude value of the point in the source system.
     */
    protected const EPSG_LONGITUDE_ROTATION = 'urn:ogc:def:method:EPSG::9601';

    /**
     * Madrid to ED50 polynomial.
     */
    protected const EPSG_MADRID_TO_ED50_POLYNOMIAL = 'urn:ogc:def:method:EPSG::9617';

    /**
     * Mercator (variant A)
     * Note that in these formulas the parameter latitude of natural origin (latO) is not used. However for this
     * Mercator (variant A) method the EPSG dataset includes this parameter, which must have a value of zero, for
     * completeness in CRS labelling.
     */
    protected const EPSG_MERCATOR_VARIANT_A = 'urn:ogc:def:method:EPSG::9804';

    /**
     * Mercator (variant B)
     * Used for most nautical charts.
     */
    protected const EPSG_MERCATOR_VARIANT_B = 'urn:ogc:def:method:EPSG::9805';

    /**
     * Modified Azimuthal Equidistant
     * Modified form of Oblique Azimuthal Equidistant projection method developed for Polynesian islands. For the
     * distances over which these projections are used (under 800km) this modification introduces no significant error.
     */
    protected const EPSG_MODIFIED_AZIMUTHAL_EQUIDISTANT = 'urn:ogc:def:method:EPSG::9832';

    /**
     * Molodensky-Badekas (CF geog2D domain)
     * See method codes 1034 and 1039 for this operation in other coordinate domains and method code 1063 for the
     * opposite rotation convention in geographic 2D domain.
     */
    protected const EPSG_MOLODENSKY_BADEKAS_CF_GEOG2D_DOMAIN = 'urn:ogc:def:method:EPSG::9636';

    /**
     * Molodensky-Badekas (PV geocentric domain)
     * See method codes 1062 and 1063 for this operation in other coordinate domains and method code 1034 for opposite
     * rotation convention in geocentric domain.
     */
    protected const EPSG_MOLODENSKY_BADEKAS_PV_GEOCENTRIC_DOMAIN = 'urn:ogc:def:method:EPSG::1061';

    /**
     * Molodensky-Badekas (PV geog2D domain)
     * See method codes 1061 and 1062 for this operation in other coordinate domains and method code 9636 for opposite
     * rotation in geographic 2D domain.
     */
    protected const EPSG_MOLODENSKY_BADEKAS_PV_GEOG2D_DOMAIN = 'urn:ogc:def:method:EPSG::1063';

    /**
     * New Zealand Map Grid.
     */
    protected const EPSG_NEW_ZEALAND_MAP_GRID = 'urn:ogc:def:method:EPSG::9811';

    /**
     * Oblique Stereographic
     * This is not the same as the projection method of the same name in USGS Professional Paper no. 1395, "Map
     * Projections - A Working Manual" by John P. Snyder.
     */
    protected const EPSG_OBLIQUE_STEREOGRAPHIC = 'urn:ogc:def:method:EPSG::9809';

    /**
     * Polar Stereographic (variant A)
     * Latitude of natural origin must be either 90 degrees or -90 degrees (or equivalent in alternative angle unit).
     */
    protected const EPSG_POLAR_STEREOGRAPHIC_VARIANT_A = 'urn:ogc:def:method:EPSG::9810';

    /**
     * Polar Stereographic (variant B).
     */
    protected const EPSG_POLAR_STEREOGRAPHIC_VARIANT_B = 'urn:ogc:def:method:EPSG::9829';

    /**
     * Polar Stereographic (variant C).
     */
    protected const EPSG_POLAR_STEREOGRAPHIC_VARIANT_C = 'urn:ogc:def:method:EPSG::9830';

    /**
     * Popular Visualisation Pseudo Mercator
     * Applies spherical formulas to the ellipsoid. As such does not have the properties of a true Mercator projection.
     */
    protected const EPSG_POPULAR_VISUALISATION_PSEUDO_MERCATOR = 'urn:ogc:def:method:EPSG::1024';

    /**
     * Position Vector transformation (geocentric domain)
     * This method is a specific case of the Molodensky-Badekas (PV) method (code 1061) in which the evaluation point
     * is the geocentre with coordinate values of zero. Note the analogy with the Coordinate Frame method (code 1032)
     * but beware of the differences!
     */
    protected const EPSG_POSITION_VECTOR_TRANSFORMATION_GEOCENTRIC_DOMAIN = 'urn:ogc:def:method:EPSG::1033';

    /**
     * Position Vector transformation (geog2D domain)
     * Note the analogy with the Coordinate Frame rotation (code 9607) but beware of the differences!  The Position
     * Vector convention is used by IAG and recommended by ISO 19111. See methods 1033 and 1037 for similar tfms
     * operating between other CRS types.
     */
    protected const EPSG_POSITION_VECTOR_TRANSFORMATION_GEOG2D_DOMAIN = 'urn:ogc:def:method:EPSG::9606';

    /**
     * Reversible polynomial of degree 13.
     */
    protected const EPSG_REVERSIBLE_POLYNOMIAL_OF_DEGREE_13 = 'urn:ogc:def:method:EPSG::9654';

    /**
     * Reversible polynomial of degree 4
     * Reversibility is subject to constraints.  See Guidance Note 7 for conditions and clarification.
     */
    protected const EPSG_REVERSIBLE_POLYNOMIAL_OF_DEGREE_4 = 'urn:ogc:def:method:EPSG::9651';

    /**
     * Similarity transformation
     * Defined for two-dimensional coordinate systems.
     */
    protected const EPSG_SIMILARITY_TRANSFORMATION = 'urn:ogc:def:method:EPSG::9621';

    /**
     * Time-dependent Coordinate Frame rotation (geocen)
     * Note the analogy with the Time-dependent Position Vector transformation (code 1053) but beware of the
     * differences!  The Position Vector convention is used by IAG. See method codes 1057 and 1058 for similar methods
     * operating between other CRS types.
     */
    protected const EPSG_TIME_DEPENDENT_COORDINATE_FRAME_ROTATION_GEOCEN = 'urn:ogc:def:method:EPSG::1056';

    /**
     * Time-dependent Position Vector tfm (geocentric)
     * Note the analogy with the Time-dependent Coordinate Frame rotation (code 1056) but beware of the differences!
     * The Position Vector convention is used by IAG. See method codes 1054 and 1055 for similar methods operating
     * between other CRS types.
     */
    protected const EPSG_TIME_DEPENDENT_POSITION_VECTOR_TFM_GEOCENTRIC = 'urn:ogc:def:method:EPSG::1053';

    /**
     * Time-specific Coordinate Frame rotation (geocen)
     * Note the analogy with the Time-specific Position Vector method (code 1065) but beware of the differences!
     */
    protected const EPSG_TIME_SPECIFIC_COORDINATE_FRAME_ROTATION_GEOCEN = 'urn:ogc:def:method:EPSG::1066';

    /**
     * Time-specific Position Vector transform (geocen)
     * Note the analogy with the Time-specifc Coordinate Frame method (code 1066) but beware of the differences!
     */
    protected const EPSG_TIME_SPECIFIC_POSITION_VECTOR_TRANSFORM_GEOCEN = 'urn:ogc:def:method:EPSG::1065';

    /**
     * Transverse Mercator.
     */
    protected const EPSG_TRANSVERSE_MERCATOR = 'urn:ogc:def:method:EPSG::9807';

    /**
     * Transverse Mercator (South Orientated).
     */
    protected const EPSG_TRANSVERSE_MERCATOR_SOUTH_ORIENTATED = 'urn:ogc:def:method:EPSG::9808';

    /**
     * Transverse Mercator Zoned Grid System
     * If locations fall outwith the fixed zones the general Transverse Mercator method (code 9807) must be used for
     * each zone.
     */
    protected const EPSG_TRANSVERSE_MERCATOR_ZONED_GRID_SYSTEM = 'urn:ogc:def:method:EPSG::9824';

    /**
     * Vertical Offset
     * This transformation allows calculation of height (or depth) in the target system by adding the parameter value
     * to the height (or depth)-value of the point in the source system.
     */
    protected const EPSG_VERTICAL_OFFSET = 'urn:ogc:def:method:EPSG::9616';

    /**
     * Vertical Offset and Slope
     * This transformation allows calculation of height in the target system by applying the parameter values to the
     * height value of the point in the source system.
     */
    protected const EPSG_VERTICAL_OFFSET_AND_SLOPE = 'urn:ogc:def:method:EPSG::1046';

    public function operationBySRID(string $srid)
    {
        return [
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
        ];
    }
}
