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
     * Abridged Molodensky.
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
     * Alias.
     */
    public const EPSG_ALIAS = 'urn:ogc:def:method:EPSG::32768';

    /**
     * American Polyconic.
     */
    public const EPSG_AMERICAN_POLYCONIC = 'urn:ogc:def:method:EPSG::9818';

    /**
     * Axis Order Reversal (2D).
     */
    public const EPSG_AXIS_ORDER_REVERSAL_2D = 'urn:ogc:def:method:EPSG::9843';

    /**
     * Axis Order Reversal (Geographic3D horizontal).
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
     * Cartesian Grid Offsets.
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
     * Complex polynomial of degree 3.
     */
    public const EPSG_COMPLEX_POLYNOMIAL_OF_DEGREE_3 = 'urn:ogc:def:method:EPSG::9652';

    /**
     * Complex polynomial of degree 4.
     */
    public const EPSG_COMPLEX_POLYNOMIAL_OF_DEGREE_4 = 'urn:ogc:def:method:EPSG::9653';

    /**
     * Coordinate Frame rotation (geocentric domain).
     */
    public const EPSG_COORDINATE_FRAME_ROTATION_GEOCENTRIC_DOMAIN = 'urn:ogc:def:method:EPSG::1032';

    /**
     * Coordinate Frame rotation (geog2D domain).
     */
    public const EPSG_COORDINATE_FRAME_ROTATION_GEOG2D_DOMAIN = 'urn:ogc:def:method:EPSG::9607';

    /**
     * Coordinate Frame rotation (geog3D domain).
     */
    public const EPSG_COORDINATE_FRAME_ROTATION_GEOG3D_DOMAIN = 'urn:ogc:def:method:EPSG::1038';

    /**
     * Equal Earth.
     */
    public const EPSG_EQUAL_EARTH = 'urn:ogc:def:method:EPSG::1078';

    /**
     * Equidistant Conic.
     */
    public const EPSG_EQUIDISTANT_CONIC = 'urn:ogc:def:method:EPSG::1119';

    /**
     * Equidistant Cylindrical.
     */
    public const EPSG_EQUIDISTANT_CYLINDRICAL = 'urn:ogc:def:method:EPSG::1028';

    /**
     * Equidistant Cylindrical (Spherical).
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
     * Geocentric translations (geocentric domain).
     */
    public const EPSG_GEOCENTRIC_TRANSLATIONS_GEOCENTRIC_DOMAIN = 'urn:ogc:def:method:EPSG::1031';

    /**
     * Geocentric translations (geog2D domain).
     */
    public const EPSG_GEOCENTRIC_TRANSLATIONS_GEOG2D_DOMAIN = 'urn:ogc:def:method:EPSG::9603';

    /**
     * Geocentric translations (geog3D domain).
     */
    public const EPSG_GEOCENTRIC_TRANSLATIONS_GEOG3D_DOMAIN = 'urn:ogc:def:method:EPSG::1035';

    /**
     * Geocentric/topocentric conversions.
     */
    public const EPSG_GEOCENTRIC_TOPOCENTRIC_CONVERSIONS = 'urn:ogc:def:method:EPSG::9836';

    /**
     * Geog3D to Geog2D+GravityRelatedHeight (AUSGeoidv2).
     */
    public const EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_AUSGEOIDV2 = 'urn:ogc:def:method:EPSG::1083';

    /**
     * Geog3D to Geog2D+GravityRelatedHeight (BEV AT).
     */
    public const EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_BEV_AT = 'urn:ogc:def:method:EPSG::1089';

    /**
     * Geog3D to Geog2D+GravityRelatedHeight (EGM2008).
     */
    public const EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_EGM2008 = 'urn:ogc:def:method:EPSG::1092';

    /**
     * Geog3D to Geog2D+GravityRelatedHeight (Gravsoft).
     */
    public const EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_GRAVSOFT = 'urn:ogc:def:method:EPSG::1093';

    /**
     * Geog3D to Geog2D+GravityRelatedHeight (IGN2009).
     */
    public const EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_IGN2009 = 'urn:ogc:def:method:EPSG::1095';

    /**
     * Geog3D to Geog2D+GravityRelatedHeight (ISG).
     */
    public const EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_ISG = 'urn:ogc:def:method:EPSG::1118';

    /**
     * Geog3D to Geog2D+GravityRelatedHeight (ITAL2005).
     */
    public const EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_ITAL2005 = 'urn:ogc:def:method:EPSG::1105';

    /**
     * Geog3D to Geog2D+GravityRelatedHeight (NGS bin).
     */
    public const EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_NGS_BIN = 'urn:ogc:def:method:EPSG::1135';

    /**
     * Geog3D to Geog2D+GravityRelatedHeight (NRCan byn).
     */
    public const EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_NRCAN_BYN = 'urn:ogc:def:method:EPSG::1090';

    /**
     * Geog3D to Geog2D+GravityRelatedHeight (OSGM-GB).
     */
    public const EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_OSGM_GB = 'urn:ogc:def:method:EPSG::1097';

    /**
     * Geog3D to Geog2D+GravityRelatedHeight (OSGM15-Ire).
     */
    public const EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_OSGM15_IRE = 'urn:ogc:def:method:EPSG::1096';

    /**
     * Geog3D to Geog2D+GravityRelatedHeight (PL txt).
     */
    public const EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_PL_TXT = 'urn:ogc:def:method:EPSG::1100';

    /**
     * Geog3D to Geog2D+GravityRelatedHeight (gtx).
     */
    public const EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_GTX = 'urn:ogc:def:method:EPSG::1088';

    /**
     * Geog3D to Geog2D+GravityRelatedHeight (txt).
     */
    public const EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_TXT = 'urn:ogc:def:method:EPSG::1098';

    /**
     * Geographic/geocentric conversions.
     */
    public const EPSG_GEOGRAPHIC_GEOCENTRIC_CONVERSIONS = 'urn:ogc:def:method:EPSG::9602';

    /**
     * Geographic/topocentric conversions.
     */
    public const EPSG_GEOGRAPHIC_TOPOCENTRIC_CONVERSIONS = 'urn:ogc:def:method:EPSG::9837';

    /**
     * Geographic2D offsets.
     */
    public const EPSG_GEOGRAPHIC2D_OFFSETS = 'urn:ogc:def:method:EPSG::9619';

    /**
     * Geographic2D with Height Offsets.
     */
    public const EPSG_GEOGRAPHIC2D_WITH_HEIGHT_OFFSETS = 'urn:ogc:def:method:EPSG::9618';

    /**
     * Geographic3D offsets.
     */
    public const EPSG_GEOGRAPHIC3D_OFFSETS = 'urn:ogc:def:method:EPSG::9660';

    /**
     * Geographic3D to 2D conversion.
     */
    public const EPSG_GEOGRAPHIC3D_TO_2D_CONVERSION = 'urn:ogc:def:method:EPSG::9659';

    /**
     * Geographic3D to GravityRelatedHeight (AUSGeoid v2).
     */
    public const EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_AUSGEOID_V2 = 'urn:ogc:def:method:EPSG::1048';

    /**
     * Geographic3D to GravityRelatedHeight (BEV AT).
     */
    public const EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_BEV_AT = 'urn:ogc:def:method:EPSG::1081';

    /**
     * Geographic3D to GravityRelatedHeight (EGM2008).
     */
    public const EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_EGM2008 = 'urn:ogc:def:method:EPSG::1025';

    /**
     * Geographic3D to GravityRelatedHeight (Gravsoft).
     */
    public const EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_GRAVSOFT = 'urn:ogc:def:method:EPSG::1047';

    /**
     * Geographic3D to GravityRelatedHeight (IGN2009).
     */
    public const EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_IGN2009 = 'urn:ogc:def:method:EPSG::1073';

    /**
     * Geographic3D to GravityRelatedHeight (ISG).
     */
    public const EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_ISG = 'urn:ogc:def:method:EPSG::1117';

    /**
     * Geographic3D to GravityRelatedHeight (ITAL2005).
     */
    public const EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_ITAL2005 = 'urn:ogc:def:method:EPSG::1106';

    /**
     * Geographic3D to GravityRelatedHeight (NGS bin).
     */
    public const EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_NGS_BIN = 'urn:ogc:def:method:EPSG::1134';

    /**
     * Geographic3D to GravityRelatedHeight (NRCan byn).
     */
    public const EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_NRCAN_BYN = 'urn:ogc:def:method:EPSG::1060';

    /**
     * Geographic3D to GravityRelatedHeight (NZgeoid).
     */
    public const EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_NZGEOID = 'urn:ogc:def:method:EPSG::1030';

    /**
     * Geographic3D to GravityRelatedHeight (OSGM-GB).
     */
    public const EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_OSGM_GB = 'urn:ogc:def:method:EPSG::9663';

    /**
     * Geographic3D to GravityRelatedHeight (OSGM15-Ire).
     */
    public const EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_OSGM15_IRE = 'urn:ogc:def:method:EPSG::1072';

    /**
     * Geographic3D to GravityRelatedHeight (PL txt).
     */
    public const EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_PL_TXT = 'urn:ogc:def:method:EPSG::1099';

    /**
     * Geographic3D to GravityRelatedHeight (PNG).
     */
    public const EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_PNG = 'urn:ogc:def:method:EPSG::1059';

    /**
     * Geographic3D to GravityRelatedHeight (gtx).
     */
    public const EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_GTX = 'urn:ogc:def:method:EPSG::9665';

    /**
     * Geographic3D to GravityRelatedHeight (txt).
     */
    public const EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_TXT = 'urn:ogc:def:method:EPSG::1082';

    /**
     * Guam Projection.
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
     * Krovak Modified.
     */
    public const EPSG_KROVAK_MODIFIED = 'urn:ogc:def:method:EPSG::1042';

    /**
     * Krovak Modified (North Orientated).
     */
    public const EPSG_KROVAK_MODIFIED_NORTH_ORIENTATED = 'urn:ogc:def:method:EPSG::1043';

    /**
     * Laborde Oblique Mercator.
     */
    public const EPSG_LABORDE_OBLIQUE_MERCATOR = 'urn:ogc:def:method:EPSG::9813';

    /**
     * Lambert Azimuthal Equal Area.
     */
    public const EPSG_LAMBERT_AZIMUTHAL_EQUAL_AREA = 'urn:ogc:def:method:EPSG::9820';

    /**
     * Lambert Azimuthal Equal Area (Spherical).
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
     * Lambert Conic Conformal (2SP Belgium).
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
     * Lambert Conic Near-Conformal.
     */
    public const EPSG_LAMBERT_CONIC_NEAR_CONFORMAL = 'urn:ogc:def:method:EPSG::9817';

    /**
     * Lambert Cylindrical Equal Area.
     */
    public const EPSG_LAMBERT_CYLINDRICAL_EQUAL_AREA = 'urn:ogc:def:method:EPSG::9835';

    /**
     * Lambert Cylindrical Equal Area (Spherical).
     */
    public const EPSG_LAMBERT_CYLINDRICAL_EQUAL_AREA_SPHERICAL = 'urn:ogc:def:method:EPSG::9834';

    /**
     * Local Orthographic.
     */
    public const EPSG_LOCAL_ORTHOGRAPHIC = 'urn:ogc:def:method:EPSG::1130';

    /**
     * Longitude rotation.
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
     * Mercator (variant A).
     */
    public const EPSG_MERCATOR_VARIANT_A = 'urn:ogc:def:method:EPSG::9804';

    /**
     * Mercator (variant B).
     */
    public const EPSG_MERCATOR_VARIANT_B = 'urn:ogc:def:method:EPSG::9805';

    /**
     * Mercator (variant C).
     */
    public const EPSG_MERCATOR_VARIANT_C = 'urn:ogc:def:method:EPSG::1108';

    /**
     * Modified Azimuthal Equidistant.
     */
    public const EPSG_MODIFIED_AZIMUTHAL_EQUIDISTANT = 'urn:ogc:def:method:EPSG::9832';

    /**
     * Molodensky.
     */
    public const EPSG_MOLODENSKY = 'urn:ogc:def:method:EPSG::9604';

    /**
     * Molodensky-Badekas (CF geocentric domain).
     */
    public const EPSG_MOLODENSKY_BADEKAS_CF_GEOCENTRIC_DOMAIN = 'urn:ogc:def:method:EPSG::1034';

    /**
     * Molodensky-Badekas (CF geog2D domain).
     */
    public const EPSG_MOLODENSKY_BADEKAS_CF_GEOG2D_DOMAIN = 'urn:ogc:def:method:EPSG::9636';

    /**
     * Molodensky-Badekas (CF geog3D domain).
     */
    public const EPSG_MOLODENSKY_BADEKAS_CF_GEOG3D_DOMAIN = 'urn:ogc:def:method:EPSG::1039';

    /**
     * Molodensky-Badekas (PV geocentric domain).
     */
    public const EPSG_MOLODENSKY_BADEKAS_PV_GEOCENTRIC_DOMAIN = 'urn:ogc:def:method:EPSG::1061';

    /**
     * Molodensky-Badekas (PV geog2D domain).
     */
    public const EPSG_MOLODENSKY_BADEKAS_PV_GEOG2D_DOMAIN = 'urn:ogc:def:method:EPSG::1063';

    /**
     * Molodensky-Badekas (PV geog3D domain).
     */
    public const EPSG_MOLODENSKY_BADEKAS_PV_GEOG3D_DOMAIN = 'urn:ogc:def:method:EPSG::1062';

    /**
     * NADCON5 (2D).
     */
    public const EPSG_NADCON5_2D = 'urn:ogc:def:method:EPSG::1074';

    /**
     * NADCON5 (3D).
     */
    public const EPSG_NADCON5_3D = 'urn:ogc:def:method:EPSG::1075';

    /**
     * NTv2.
     */
    public const EPSG_NTV2 = 'urn:ogc:def:method:EPSG::9615';

    /**
     * New Zealand Map Grid.
     */
    public const EPSG_NEW_ZEALAND_MAP_GRID = 'urn:ogc:def:method:EPSG::9811';

    /**
     * Oblique Stereographic.
     */
    public const EPSG_OBLIQUE_STEREOGRAPHIC = 'urn:ogc:def:method:EPSG::9809';

    /**
     * Ordnance Survey National Transformation.
     */
    public const EPSG_ORDNANCE_SURVEY_NATIONAL_TRANSFORMATION = 'urn:ogc:def:method:EPSG::9633';

    /**
     * Orthographic.
     */
    public const EPSG_ORTHOGRAPHIC = 'urn:ogc:def:method:EPSG::9840';

    /**
     * Point motion (ellipsoidal).
     */
    public const EPSG_POINT_MOTION_ELLIPSOIDAL = 'urn:ogc:def:method:EPSG::1067';

    /**
     * Point motion (geocen) by grid (INADEFORM).
     */
    public const EPSG_POINT_MOTION_GEOCEN_BY_GRID_INADEFORM = 'urn:ogc:def:method:EPSG::1086';

    /**
     * Point motion (geocentric Cartesian).
     */
    public const EPSG_POINT_MOTION_GEOCENTRIC_CARTESIAN = 'urn:ogc:def:method:EPSG::1064';

    /**
     * Point motion (geocentric domain) using NEU displacement grid (grd).
     */
    public const EPSG_POINT_MOTION_GEOCENTRIC_DOMAIN_USING_NEU_DISPLACEMENT_GRID_GRD = 'urn:ogc:def:method:EPSG::1148';

    /**
     * Polar Stereographic (variant A).
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
     * Popular Visualisation Pseudo Mercator.
     */
    public const EPSG_POPULAR_VISUALISATION_PSEUDO_MERCATOR = 'urn:ogc:def:method:EPSG::1024';

    /**
     * Position Vector transformation (geocentric domain).
     */
    public const EPSG_POSITION_VECTOR_TRANSFORMATION_GEOCENTRIC_DOMAIN = 'urn:ogc:def:method:EPSG::1033';

    /**
     * Position Vector transformation (geog2D domain).
     */
    public const EPSG_POSITION_VECTOR_TRANSFORMATION_GEOG2D_DOMAIN = 'urn:ogc:def:method:EPSG::9606';

    /**
     * Position Vector transformation (geog3D domain).
     */
    public const EPSG_POSITION_VECTOR_TRANSFORMATION_GEOG3D_DOMAIN = 'urn:ogc:def:method:EPSG::1037';

    /**
     * Pseudo Plate Carree.
     */
    public const EPSG_PSEUDO_PLATE_CARREE = 'urn:ogc:def:method:EPSG::9825';

    /**
     * Reversible polynomial of degree 13.
     */
    public const EPSG_REVERSIBLE_POLYNOMIAL_OF_DEGREE_13 = 'urn:ogc:def:method:EPSG::9654';

    /**
     * Reversible polynomial of degree 2.
     */
    public const EPSG_REVERSIBLE_POLYNOMIAL_OF_DEGREE_2 = 'urn:ogc:def:method:EPSG::9649';

    /**
     * Reversible polynomial of degree 3.
     */
    public const EPSG_REVERSIBLE_POLYNOMIAL_OF_DEGREE_3 = 'urn:ogc:def:method:EPSG::9650';

    /**
     * Reversible polynomial of degree 4.
     */
    public const EPSG_REVERSIBLE_POLYNOMIAL_OF_DEGREE_4 = 'urn:ogc:def:method:EPSG::9651';

    /**
     * Similarity transformation.
     */
    public const EPSG_SIMILARITY_TRANSFORMATION = 'urn:ogc:def:method:EPSG::9621';

    /**
     * Swiss Oblique Cylindrical.
     */
    public const EPSG_SWISS_OBLIQUE_CYLINDRICAL = 'urn:ogc:def:method:EPSG::9814';

    /**
     * Time-dependent Coordinate Frame rotation (geocen).
     */
    public const EPSG_TIME_DEPENDENT_COORDINATE_FRAME_ROTATION_GEOCEN = 'urn:ogc:def:method:EPSG::1056';

    /**
     * Time-dependent Coordinate Frame rotation (geog2D).
     */
    public const EPSG_TIME_DEPENDENT_COORDINATE_FRAME_ROTATION_GEOG2D = 'urn:ogc:def:method:EPSG::1057';

    /**
     * Time-dependent Coordinate Frame rotation (geog3D).
     */
    public const EPSG_TIME_DEPENDENT_COORDINATE_FRAME_ROTATION_GEOG3D = 'urn:ogc:def:method:EPSG::1058';

    /**
     * Time-dependent Position Vector tfm (geocentric).
     */
    public const EPSG_TIME_DEPENDENT_POSITION_VECTOR_TFM_GEOCENTRIC = 'urn:ogc:def:method:EPSG::1053';

    /**
     * Time-dependent Position Vector tfm (geog2D).
     */
    public const EPSG_TIME_DEPENDENT_POSITION_VECTOR_TFM_GEOG2D = 'urn:ogc:def:method:EPSG::1054';

    /**
     * Time-dependent Position Vector tfm (geog3D).
     */
    public const EPSG_TIME_DEPENDENT_POSITION_VECTOR_TFM_GEOG3D = 'urn:ogc:def:method:EPSG::1055';

    /**
     * Time-specific Coordinate Frame rotation (geocen).
     */
    public const EPSG_TIME_SPECIFIC_COORDINATE_FRAME_ROTATION_GEOCEN = 'urn:ogc:def:method:EPSG::1066';

    /**
     * Time-specific Position Vector transform (geocen).
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
     * Transverse Mercator 3D.
     */
    public const EPSG_TRANSVERSE_MERCATOR_3D = 'urn:ogc:def:method:EPSG::1111';

    /**
     * Transverse Mercator Zoned Grid System.
     */
    public const EPSG_TRANSVERSE_MERCATOR_ZONED_GRID_SYSTEM = 'urn:ogc:def:method:EPSG::9824';

    /**
     * Vertical Offset.
     */
    public const EPSG_VERTICAL_OFFSET = 'urn:ogc:def:method:EPSG::9616';

    /**
     * Vertical Offset and Slope.
     */
    public const EPSG_VERTICAL_OFFSET_AND_SLOPE = 'urn:ogc:def:method:EPSG::1046';

    /**
     * Vertical Offset by Grid Interpolation (BEV AT).
     */
    public const EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_BEV_AT = 'urn:ogc:def:method:EPSG::1080';

    /**
     * Vertical Offset by Grid Interpolation (NZLVD).
     */
    public const EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_NZLVD = 'urn:ogc:def:method:EPSG::1071';

    /**
     * Vertical Offset by Grid Interpolation (PL txt).
     */
    public const EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_PL_TXT = 'urn:ogc:def:method:EPSG::1101';

    /**
     * Vertical Offset by Grid Interpolation (VERTCON).
     */
    public const EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_VERTCON = 'urn:ogc:def:method:EPSG::9658';

    /**
     * Vertical Offset by Grid Interpolation (gtx).
     */
    public const EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_GTX = 'urn:ogc:def:method:EPSG::1084';

    /**
     * Vertical Perspective.
     */
    public const EPSG_VERTICAL_PERSPECTIVE = 'urn:ogc:def:method:EPSG::9838';

    /**
     * Vertical Perspective (Orthographic case).
     */
    public const EPSG_VERTICAL_PERSPECTIVE_ORTHOGRAPHIC_CASE = 'urn:ogc:def:method:EPSG::9839';

    /**
     * Vertical change by geoid grid difference (NRCan).
     */
    public const EPSG_VERTICAL_CHANGE_BY_GEOID_GRID_DIFFERENCE_NRCAN = 'urn:ogc:def:method:EPSG::1126';

    /**
     * Zero-tide height to mean-tide height (EVRF2019).
     */
    public const EPSG_ZERO_TIDE_HEIGHT_TO_MEAN_TIDE_HEIGHT_EVRF2019 = 'urn:ogc:def:method:EPSG::1107';

    /**
     * @var array<string, array{name: string, reversible: bool, paramData: array<string, array{reverses: bool}>}>
     */
    protected static array $sridData = [
        'urn:ogc:def:method:EPSG::1024' => [
            'name' => 'Popular Visualisation Pseudo Mercator',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1025' => [
            'name' => 'Geographic3D to GravityRelatedHeight (EGM2008)',
            'reversible' => false,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1026' => [
            'name' => 'Mercator (Spherical)',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1027' => [
            'name' => 'Lambert Azimuthal Equal Area (Spherical)',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1028' => [
            'name' => 'Equidistant Cylindrical',
            'reversible' => true,
            'paramData' => [
                'latitudeOf1stStandardParallel' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1029' => [
            'name' => 'Equidistant Cylindrical (Spherical)',
            'reversible' => true,
            'paramData' => [
                'latitudeOf1stStandardParallel' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1030' => [
            'name' => 'Geographic3D to GravityRelatedHeight (NZgeoid)',
            'reversible' => false,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1031' => [
            'name' => 'Geocentric translations (geocentric domain)',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1032' => [
            'name' => 'Coordinate Frame rotation (geocentric domain)',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
                'xAxisRotation' => [
                    'reverses' => true,
                ],
                'yAxisRotation' => [
                    'reverses' => true,
                ],
                'zAxisRotation' => [
                    'reverses' => true,
                ],
                'scaleDifference' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1033' => [
            'name' => 'Position Vector transformation (geocentric domain)',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
                'xAxisRotation' => [
                    'reverses' => true,
                ],
                'yAxisRotation' => [
                    'reverses' => true,
                ],
                'zAxisRotation' => [
                    'reverses' => true,
                ],
                'scaleDifference' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1034' => [
            'name' => 'Molodensky-Badekas (CF geocentric domain)',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
                'xAxisRotation' => [
                    'reverses' => true,
                ],
                'yAxisRotation' => [
                    'reverses' => true,
                ],
                'zAxisRotation' => [
                    'reverses' => true,
                ],
                'scaleDifference' => [
                    'reverses' => true,
                ],
                'ordinate1OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'ordinate3OfEvaluationPoint' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1035' => [
            'name' => 'Geocentric translations (geog3D domain)',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1037' => [
            'name' => 'Position Vector transformation (geog3D domain)',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
                'xAxisRotation' => [
                    'reverses' => true,
                ],
                'yAxisRotation' => [
                    'reverses' => true,
                ],
                'zAxisRotation' => [
                    'reverses' => true,
                ],
                'scaleDifference' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1038' => [
            'name' => 'Coordinate Frame rotation (geog3D domain)',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
                'xAxisRotation' => [
                    'reverses' => true,
                ],
                'yAxisRotation' => [
                    'reverses' => true,
                ],
                'zAxisRotation' => [
                    'reverses' => true,
                ],
                'scaleDifference' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1039' => [
            'name' => 'Molodensky-Badekas (CF geog3D domain)',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
                'xAxisRotation' => [
                    'reverses' => true,
                ],
                'yAxisRotation' => [
                    'reverses' => true,
                ],
                'zAxisRotation' => [
                    'reverses' => true,
                ],
                'scaleDifference' => [
                    'reverses' => true,
                ],
                'ordinate1OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'ordinate3OfEvaluationPoint' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1041' => [
            'name' => 'Krovak (North Orientated)',
            'reversible' => true,
            'paramData' => [
                'latitudeOfProjectionCentre' => [
                    'reverses' => false,
                ],
                'longitudeOfOrigin' => [
                    'reverses' => false,
                ],
                'coLatitudeOfConeAxis' => [
                    'reverses' => false,
                ],
                'latitudeOfPseudoStandardParallel' => [
                    'reverses' => false,
                ],
                'scaleFactorOnPseudoStandardParallel' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1042' => [
            'name' => 'Krovak Modified',
            'reversible' => true,
            'paramData' => [
                'latitudeOfProjectionCentre' => [
                    'reverses' => false,
                ],
                'longitudeOfOrigin' => [
                    'reverses' => false,
                ],
                'coLatitudeOfConeAxis' => [
                    'reverses' => false,
                ],
                'latitudeOfPseudoStandardParallel' => [
                    'reverses' => false,
                ],
                'scaleFactorOnPseudoStandardParallel' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
                'ordinate1OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'C1' => [
                    'reverses' => false,
                ],
                'C2' => [
                    'reverses' => false,
                ],
                'C3' => [
                    'reverses' => false,
                ],
                'C4' => [
                    'reverses' => false,
                ],
                'C5' => [
                    'reverses' => false,
                ],
                'C6' => [
                    'reverses' => false,
                ],
                'C7' => [
                    'reverses' => false,
                ],
                'C8' => [
                    'reverses' => false,
                ],
                'C9' => [
                    'reverses' => false,
                ],
                'C10' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1043' => [
            'name' => 'Krovak Modified (North Orientated)',
            'reversible' => true,
            'paramData' => [
                'latitudeOfProjectionCentre' => [
                    'reverses' => false,
                ],
                'longitudeOfOrigin' => [
                    'reverses' => false,
                ],
                'coLatitudeOfConeAxis' => [
                    'reverses' => false,
                ],
                'latitudeOfPseudoStandardParallel' => [
                    'reverses' => false,
                ],
                'scaleFactorOnPseudoStandardParallel' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
                'ordinate1OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'C1' => [
                    'reverses' => false,
                ],
                'C2' => [
                    'reverses' => false,
                ],
                'C3' => [
                    'reverses' => false,
                ],
                'C4' => [
                    'reverses' => false,
                ],
                'C5' => [
                    'reverses' => false,
                ],
                'C6' => [
                    'reverses' => false,
                ],
                'C7' => [
                    'reverses' => false,
                ],
                'C8' => [
                    'reverses' => false,
                ],
                'C9' => [
                    'reverses' => false,
                ],
                'C10' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1046' => [
            'name' => 'Vertical Offset and Slope',
            'reversible' => true,
            'paramData' => [
                'ordinate1OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'verticalOffset' => [
                    'reverses' => true,
                ],
                'inclinationInLatitude' => [
                    'reverses' => true,
                ],
                'inclinationInLongitude' => [
                    'reverses' => true,
                ],
                'EPSGCodeForHorizontalCRS' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1047' => [
            'name' => 'Geographic3D to GravityRelatedHeight (Gravsoft)',
            'reversible' => false,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1048' => [
            'name' => 'Geographic3D to GravityRelatedHeight (AUSGeoid v2)',
            'reversible' => false,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1051' => [
            'name' => 'Lambert Conic Conformal (2SP Michigan)',
            'reversible' => true,
            'paramData' => [
                'latitudeOfFalseOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfFalseOrigin' => [
                    'reverses' => false,
                ],
                'latitudeOf1stStandardParallel' => [
                    'reverses' => false,
                ],
                'latitudeOf2ndStandardParallel' => [
                    'reverses' => false,
                ],
                'eastingAtFalseOrigin' => [
                    'reverses' => false,
                ],
                'northingAtFalseOrigin' => [
                    'reverses' => false,
                ],
                'ellipsoidScalingFactor' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1052' => [
            'name' => 'Colombia Urban',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
                'projectionPlaneOriginHeight' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1053' => [
            'name' => 'Time-dependent Position Vector tfm (geocentric)',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
                'xAxisRotation' => [
                    'reverses' => true,
                ],
                'yAxisRotation' => [
                    'reverses' => true,
                ],
                'zAxisRotation' => [
                    'reverses' => true,
                ],
                'scaleDifference' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfXAxisTranslation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfYAxisTranslation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfZAxisTranslation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfXAxisRotation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfYAxisRotation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfZAxisRotation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfScaleDifference' => [
                    'reverses' => true,
                ],
                'parameterReferenceEpoch' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1054' => [
            'name' => 'Time-dependent Position Vector tfm (geog2D)',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
                'xAxisRotation' => [
                    'reverses' => true,
                ],
                'yAxisRotation' => [
                    'reverses' => true,
                ],
                'zAxisRotation' => [
                    'reverses' => true,
                ],
                'scaleDifference' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfXAxisTranslation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfYAxisTranslation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfZAxisTranslation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfXAxisRotation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfYAxisRotation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfZAxisRotation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfScaleDifference' => [
                    'reverses' => true,
                ],
                'parameterReferenceEpoch' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1055' => [
            'name' => 'Time-dependent Position Vector tfm (geog3D)',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
                'xAxisRotation' => [
                    'reverses' => true,
                ],
                'yAxisRotation' => [
                    'reverses' => true,
                ],
                'zAxisRotation' => [
                    'reverses' => true,
                ],
                'scaleDifference' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfXAxisTranslation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfYAxisTranslation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfZAxisTranslation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfXAxisRotation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfYAxisRotation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfZAxisRotation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfScaleDifference' => [
                    'reverses' => true,
                ],
                'parameterReferenceEpoch' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1056' => [
            'name' => 'Time-dependent Coordinate Frame rotation (geocen)',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
                'xAxisRotation' => [
                    'reverses' => true,
                ],
                'yAxisRotation' => [
                    'reverses' => true,
                ],
                'zAxisRotation' => [
                    'reverses' => true,
                ],
                'scaleDifference' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfXAxisTranslation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfYAxisTranslation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfZAxisTranslation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfXAxisRotation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfYAxisRotation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfZAxisRotation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfScaleDifference' => [
                    'reverses' => true,
                ],
                'parameterReferenceEpoch' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1057' => [
            'name' => 'Time-dependent Coordinate Frame rotation (geog2D)',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
                'xAxisRotation' => [
                    'reverses' => true,
                ],
                'yAxisRotation' => [
                    'reverses' => true,
                ],
                'zAxisRotation' => [
                    'reverses' => true,
                ],
                'scaleDifference' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfXAxisTranslation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfYAxisTranslation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfZAxisTranslation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfXAxisRotation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfYAxisRotation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfZAxisRotation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfScaleDifference' => [
                    'reverses' => true,
                ],
                'parameterReferenceEpoch' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1058' => [
            'name' => 'Time-dependent Coordinate Frame rotation (geog3D)',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
                'xAxisRotation' => [
                    'reverses' => true,
                ],
                'yAxisRotation' => [
                    'reverses' => true,
                ],
                'zAxisRotation' => [
                    'reverses' => true,
                ],
                'scaleDifference' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfXAxisTranslation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfYAxisTranslation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfZAxisTranslation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfXAxisRotation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfYAxisRotation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfZAxisRotation' => [
                    'reverses' => true,
                ],
                'rateOfChangeOfScaleDifference' => [
                    'reverses' => true,
                ],
                'parameterReferenceEpoch' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1059' => [
            'name' => 'Geographic3D to GravityRelatedHeight (PNG)',
            'reversible' => false,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1060' => [
            'name' => 'Geographic3D to GravityRelatedHeight (NRCan byn)',
            'reversible' => false,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1061' => [
            'name' => 'Molodensky-Badekas (PV geocentric domain)',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
                'xAxisRotation' => [
                    'reverses' => true,
                ],
                'yAxisRotation' => [
                    'reverses' => true,
                ],
                'zAxisRotation' => [
                    'reverses' => true,
                ],
                'scaleDifference' => [
                    'reverses' => true,
                ],
                'ordinate1OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'ordinate3OfEvaluationPoint' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1062' => [
            'name' => 'Molodensky-Badekas (PV geog3D domain)',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
                'xAxisRotation' => [
                    'reverses' => true,
                ],
                'yAxisRotation' => [
                    'reverses' => true,
                ],
                'zAxisRotation' => [
                    'reverses' => true,
                ],
                'scaleDifference' => [
                    'reverses' => true,
                ],
                'ordinate1OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'ordinate3OfEvaluationPoint' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1063' => [
            'name' => 'Molodensky-Badekas (PV geog2D domain)',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
                'xAxisRotation' => [
                    'reverses' => true,
                ],
                'yAxisRotation' => [
                    'reverses' => true,
                ],
                'zAxisRotation' => [
                    'reverses' => true,
                ],
                'scaleDifference' => [
                    'reverses' => true,
                ],
                'ordinate1OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'ordinate3OfEvaluationPoint' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1064' => [
            'name' => 'Point motion (geocentric Cartesian)',
            'reversible' => false,
            'paramData' => [
                'pointMotionVelocityX' => [
                    'reverses' => false,
                ],
                'pointMotionVelocityY' => [
                    'reverses' => false,
                ],
                'pointMotionVelocityZ' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1065' => [
            'name' => 'Time-specific Position Vector transform (geocen)',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
                'xAxisRotation' => [
                    'reverses' => true,
                ],
                'yAxisRotation' => [
                    'reverses' => true,
                ],
                'zAxisRotation' => [
                    'reverses' => true,
                ],
                'scaleDifference' => [
                    'reverses' => true,
                ],
                'transformationReferenceEpoch' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1066' => [
            'name' => 'Time-specific Coordinate Frame rotation (geocen)',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
                'xAxisRotation' => [
                    'reverses' => true,
                ],
                'yAxisRotation' => [
                    'reverses' => true,
                ],
                'zAxisRotation' => [
                    'reverses' => true,
                ],
                'scaleDifference' => [
                    'reverses' => true,
                ],
                'transformationReferenceEpoch' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1067' => [
            'name' => 'Point motion (ellipsoidal)',
            'reversible' => false,
            'paramData' => [
                'pointMotionVelocityNorth' => [
                    'reverses' => false,
                ],
                'pointMotionVelocityEast' => [
                    'reverses' => false,
                ],
                'pointMotionVelocityUp' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1068' => [
            'name' => 'Height Depth Reversal',
            'reversible' => true,
            'paramData' => [
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1071' => [
            'name' => 'Vertical Offset by Grid Interpolation (NZLVD)',
            'reversible' => true,
            'paramData' => [
                'offsetsFile' => [
                    'reverses' => true,
                ],
                'EPSGCodeForInterpolationCRS' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1072' => [
            'name' => 'Geographic3D to GravityRelatedHeight (OSGM15-Ire)',
            'reversible' => false,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1073' => [
            'name' => 'Geographic3D to GravityRelatedHeight (IGN2009)',
            'reversible' => false,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1074' => [
            'name' => 'NADCON5 (2D)',
            'reversible' => true,
            'paramData' => [
                'latitudeDifferenceFile' => [
                    'reverses' => true,
                ],
                'longitudeDifferenceFile' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1075' => [
            'name' => 'NADCON5 (3D)',
            'reversible' => true,
            'paramData' => [
                'latitudeDifferenceFile' => [
                    'reverses' => true,
                ],
                'longitudeDifferenceFile' => [
                    'reverses' => true,
                ],
                'ellipsoidalHeightDifferenceFile' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1078' => [
            'name' => 'Equal Earth',
            'reversible' => true,
            'paramData' => [
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1080' => [
            'name' => 'Vertical Offset by Grid Interpolation (BEV AT)',
            'reversible' => true,
            'paramData' => [
                'offsetsFile' => [
                    'reverses' => true,
                ],
                'EPSGCodeForInterpolationCRS' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1081' => [
            'name' => 'Geographic3D to GravityRelatedHeight (BEV AT)',
            'reversible' => false,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => false,
                ],
                'EPSGCodeForInterpolationCRS' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1082' => [
            'name' => 'Geographic3D to GravityRelatedHeight (txt)',
            'reversible' => false,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1083' => [
            'name' => 'Geog3D to Geog2D+GravityRelatedHeight (AUSGeoidv2)',
            'reversible' => true,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => true,
                ],
                'EPSGCodeForInterpolationCRS' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1084' => [
            'name' => 'Vertical Offset by Grid Interpolation (gtx)',
            'reversible' => true,
            'paramData' => [
                'offsetsFile' => [
                    'reverses' => true,
                ],
                'EPSGCodeForInterpolationCRS' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1086' => [
            'name' => 'Point motion (geocen) by grid (INADEFORM)',
            'reversible' => true,
            'paramData' => [
                'pointMotionVelocityGridFile' => [
                    'reverses' => false,
                ],
                'EPSGCodeForInterpolationCRS' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1087' => [
            'name' => 'Geocentric translation by Grid Interpolation (IGN)',
            'reversible' => true,
            'paramData' => [
                'offsetsFile' => [
                    'reverses' => true,
                ],
                'EPSGCodeForInterpolationCRS' => [
                    'reverses' => false,
                ],
                'EPSGCodeForStandardTransformationT0' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1088' => [
            'name' => 'Geog3D to Geog2D+GravityRelatedHeight (gtx)',
            'reversible' => true,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => true,
                ],
                'EPSGCodeForInterpolationCRS' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1089' => [
            'name' => 'Geog3D to Geog2D+GravityRelatedHeight (BEV AT)',
            'reversible' => true,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => true,
                ],
                'EPSGCodeForInterpolationCRS' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1090' => [
            'name' => 'Geog3D to Geog2D+GravityRelatedHeight (NRCan byn)',
            'reversible' => true,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => true,
                ],
                'EPSGCodeForInterpolationCRS' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1092' => [
            'name' => 'Geog3D to Geog2D+GravityRelatedHeight (EGM2008)',
            'reversible' => true,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => true,
                ],
                'EPSGCodeForInterpolationCRS' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1093' => [
            'name' => 'Geog3D to Geog2D+GravityRelatedHeight (Gravsoft)',
            'reversible' => true,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => true,
                ],
                'EPSGCodeForInterpolationCRS' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1095' => [
            'name' => 'Geog3D to Geog2D+GravityRelatedHeight (IGN2009)',
            'reversible' => true,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => true,
                ],
                'EPSGCodeForInterpolationCRS' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1096' => [
            'name' => 'Geog3D to Geog2D+GravityRelatedHeight (OSGM15-Ire)',
            'reversible' => true,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => true,
                ],
                'EPSGCodeForInterpolationCRS' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1097' => [
            'name' => 'Geog3D to Geog2D+GravityRelatedHeight (OSGM-GB)',
            'reversible' => true,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => true,
                ],
                'EPSGCodeForInterpolationCRS' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1098' => [
            'name' => 'Geog3D to Geog2D+GravityRelatedHeight (txt)',
            'reversible' => true,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => true,
                ],
                'EPSGCodeForInterpolationCRS' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1099' => [
            'name' => 'Geographic3D to GravityRelatedHeight (PL txt)',
            'reversible' => false,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1100' => [
            'name' => 'Geog3D to Geog2D+GravityRelatedHeight (PL txt)',
            'reversible' => true,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => true,
                ],
                'EPSGCodeForInterpolationCRS' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1101' => [
            'name' => 'Vertical Offset by Grid Interpolation (PL txt)',
            'reversible' => true,
            'paramData' => [
                'offsetsFile' => [
                    'reverses' => true,
                ],
                'EPSGCodeForInterpolationCRS' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1102' => [
            'name' => 'Lambert Conic Conformal (1SP variant B)',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'scaleFactorAtNaturalOrigin' => [
                    'reverses' => false,
                ],
                'latitudeOfFalseOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfFalseOrigin' => [
                    'reverses' => false,
                ],
                'eastingAtFalseOrigin' => [
                    'reverses' => false,
                ],
                'northingAtFalseOrigin' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1104' => [
            'name' => 'Change of Vertical Unit',
            'reversible' => true,
            'paramData' => [
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1105' => [
            'name' => 'Geog3D to Geog2D+GravityRelatedHeight (ITAL2005)',
            'reversible' => true,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => true,
                ],
                'EPSGCodeForInterpolationCRS' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1106' => [
            'name' => 'Geographic3D to GravityRelatedHeight (ITAL2005)',
            'reversible' => false,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1107' => [
            'name' => 'zero-tide height to mean-tide height (EVRF2019)',
            'reversible' => true,
            'paramData' => [
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1108' => [
            'name' => 'Mercator (variant C)',
            'reversible' => true,
            'paramData' => [
                'latitudeOf1stStandardParallel' => [
                    'reverses' => false,
                ],
                'latitudeOfFalseOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfFalseOrigin' => [
                    'reverses' => false,
                ],
                'eastingAtFalseOrigin' => [
                    'reverses' => false,
                ],
                'northingAtFalseOrigin' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1111' => [
            'name' => 'Transverse Mercator 3D',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'scaleFactorAtNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1117' => [
            'name' => 'Geographic3D to GravityRelatedHeight (ISG)',
            'reversible' => false,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1118' => [
            'name' => 'Geog3D to Geog2D+GravityRelatedHeight (ISG)',
            'reversible' => true,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => true,
                ],
                'EPSGCodeForInterpolationCRS' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1119' => [
            'name' => 'Equidistant Conic',
            'reversible' => true,
            'paramData' => [
                'latitudeOfFalseOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfFalseOrigin' => [
                    'reverses' => false,
                ],
                'latitudeOf1stStandardParallel' => [
                    'reverses' => false,
                ],
                'latitudeOf2ndStandardParallel' => [
                    'reverses' => false,
                ],
                'eastingAtFalseOrigin' => [
                    'reverses' => false,
                ],
                'northingAtFalseOrigin' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1126' => [
            'name' => 'Vertical change by geoid grid difference (NRCan)',
            'reversible' => true,
            'paramData' => [
                'offsetsFile' => [
                    'reverses' => false,
                ],
                'EPSGCodeForInterpolationCRS' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1130' => [
            'name' => 'Local Orthographic',
            'reversible' => true,
            'paramData' => [
                'latitudeOfProjectionCentre' => [
                    'reverses' => false,
                ],
                'longitudeOfProjectionCentre' => [
                    'reverses' => false,
                ],
                'azimuthAtProjectionCentre' => [
                    'reverses' => false,
                ],
                'scaleFactorAtProjectionCentre' => [
                    'reverses' => false,
                ],
                'eastingAtProjectionCentre' => [
                    'reverses' => false,
                ],
                'northingAtProjectionCentre' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1134' => [
            'name' => 'Geographic3D to GravityRelatedHeight (NGS bin)',
            'reversible' => false,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1135' => [
            'name' => 'Geog3D to Geog2D+GravityRelatedHeight (NGS bin)',
            'reversible' => true,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => true,
                ],
                'EPSGCodeForInterpolationCRS' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::1148' => [
            'name' => 'Point motion (geocentric domain) using NEU displacement grid (grd)',
            'reversible' => true,
            'paramData' => [
                'pointMotionDisplacementNorthGridFile' => [
                    'reverses' => false,
                ],
                'pointMotionDisplacementEastGridFile' => [
                    'reverses' => false,
                ],
                'pointMotionDisplacementUpGridFile' => [
                    'reverses' => false,
                ],
                'EPSGCodeForInterpolationCRS' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9601' => [
            'name' => 'Longitude rotation',
            'reversible' => true,
            'paramData' => [
                'longitudeOffset' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9602' => [
            'name' => 'Geographic/geocentric conversions',
            'reversible' => true,
            'paramData' => [
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9603' => [
            'name' => 'Geocentric translations (geog2D domain)',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9604' => [
            'name' => 'Molodensky',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
                'semiMajorAxisLengthDifference' => [
                    'reverses' => true,
                ],
                'flatteningDifference' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9605' => [
            'name' => 'Abridged Molodensky',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
                'semiMajorAxisLengthDifference' => [
                    'reverses' => true,
                ],
                'flatteningDifference' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9606' => [
            'name' => 'Position Vector transformation (geog2D domain)',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
                'xAxisRotation' => [
                    'reverses' => true,
                ],
                'yAxisRotation' => [
                    'reverses' => true,
                ],
                'zAxisRotation' => [
                    'reverses' => true,
                ],
                'scaleDifference' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9607' => [
            'name' => 'Coordinate Frame rotation (geog2D domain)',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
                'xAxisRotation' => [
                    'reverses' => true,
                ],
                'yAxisRotation' => [
                    'reverses' => true,
                ],
                'zAxisRotation' => [
                    'reverses' => true,
                ],
                'scaleDifference' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9615' => [
            'name' => 'NTv2',
            'reversible' => true,
            'paramData' => [
                'offsetsFile' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9616' => [
            'name' => 'Vertical Offset',
            'reversible' => true,
            'paramData' => [
                'verticalOffset' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9617' => [
            'name' => 'Madrid to ED50 polynomial',
            'reversible' => false,
            'paramData' => [
                'A0' => [
                    'reverses' => false,
                ],
                'A1' => [
                    'reverses' => false,
                ],
                'A2' => [
                    'reverses' => false,
                ],
                'A3' => [
                    'reverses' => false,
                ],
                'B00' => [
                    'reverses' => false,
                ],
                'B0' => [
                    'reverses' => false,
                ],
                'B1' => [
                    'reverses' => false,
                ],
                'B2' => [
                    'reverses' => false,
                ],
                'B3' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9618' => [
            'name' => 'Geographic2D with Height Offsets',
            'reversible' => true,
            'paramData' => [
                'latitudeOffset' => [
                    'reverses' => true,
                ],
                'longitudeOffset' => [
                    'reverses' => true,
                ],
                'geoidHeight' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9619' => [
            'name' => 'Geographic2D offsets',
            'reversible' => true,
            'paramData' => [
                'latitudeOffset' => [
                    'reverses' => true,
                ],
                'longitudeOffset' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9621' => [
            'name' => 'Similarity transformation',
            'reversible' => true,
            'paramData' => [
                'ordinate1OfEvaluationPointInTargetCRS' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPointInTargetCRS' => [
                    'reverses' => false,
                ],
                'scaleFactorForSourceCRSAxes' => [
                    'reverses' => false,
                ],
                'rotationAngleOfSourceCRSAxes' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9623' => [
            'name' => 'Affine geometric transformation',
            'reversible' => true,
            'paramData' => [
                'ordinate1OfEvaluationPointInTargetCRS' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPointInTargetCRS' => [
                    'reverses' => false,
                ],
                'scaleFactorForSourceCRSFirstAxis' => [
                    'reverses' => false,
                ],
                'scaleFactorForSourceCRSSecondAxis' => [
                    'reverses' => false,
                ],
                'pointScaleFactor' => [
                    'reverses' => false,
                ],
                'rotationAngleOfSourceCRSFirstAxis' => [
                    'reverses' => false,
                ],
                'rotationAngleOfSourceCRSSecondAxis' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9624' => [
            'name' => 'Affine parametric transformation',
            'reversible' => true,
            'paramData' => [
                'A0' => [
                    'reverses' => false,
                ],
                'A1' => [
                    'reverses' => false,
                ],
                'A2' => [
                    'reverses' => false,
                ],
                'B0' => [
                    'reverses' => false,
                ],
                'B1' => [
                    'reverses' => false,
                ],
                'B2' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9633' => [
            'name' => 'Ordnance Survey National Transformation',
            'reversible' => true,
            'paramData' => [
                'eastingAndNorthingDifferenceFile' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9636' => [
            'name' => 'Molodensky-Badekas (CF geog2D domain)',
            'reversible' => true,
            'paramData' => [
                'xAxisTranslation' => [
                    'reverses' => true,
                ],
                'yAxisTranslation' => [
                    'reverses' => true,
                ],
                'zAxisTranslation' => [
                    'reverses' => true,
                ],
                'xAxisRotation' => [
                    'reverses' => true,
                ],
                'yAxisRotation' => [
                    'reverses' => true,
                ],
                'zAxisRotation' => [
                    'reverses' => true,
                ],
                'scaleDifference' => [
                    'reverses' => true,
                ],
                'ordinate1OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'ordinate3OfEvaluationPoint' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9645' => [
            'name' => 'General polynomial of degree 2',
            'reversible' => false,
            'paramData' => [
                'ordinate1OfEvaluationPointInSourceCRS' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPointInSourceCRS' => [
                    'reverses' => false,
                ],
                'ordinate1OfEvaluationPointInTargetCRS' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPointInTargetCRS' => [
                    'reverses' => false,
                ],
                'scalingFactorForSourceCRSCoordDifferences' => [
                    'reverses' => false,
                ],
                'scalingFactorForTargetCRSCoordDifferences' => [
                    'reverses' => false,
                ],
                'A0' => [
                    'reverses' => false,
                ],
                'Au1v0' => [
                    'reverses' => false,
                ],
                'Au0v1' => [
                    'reverses' => false,
                ],
                'Au2v0' => [
                    'reverses' => false,
                ],
                'Au1v1' => [
                    'reverses' => false,
                ],
                'Au0v2' => [
                    'reverses' => false,
                ],
                'B0' => [
                    'reverses' => false,
                ],
                'Bu1v0' => [
                    'reverses' => false,
                ],
                'Bu0v1' => [
                    'reverses' => false,
                ],
                'Bu2v0' => [
                    'reverses' => false,
                ],
                'Bu1v1' => [
                    'reverses' => false,
                ],
                'Bu0v2' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9646' => [
            'name' => 'General polynomial of degree 3',
            'reversible' => false,
            'paramData' => [
                'ordinate1OfEvaluationPointInSourceCRS' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPointInSourceCRS' => [
                    'reverses' => false,
                ],
                'ordinate1OfEvaluationPointInTargetCRS' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPointInTargetCRS' => [
                    'reverses' => false,
                ],
                'scalingFactorForSourceCRSCoordDifferences' => [
                    'reverses' => false,
                ],
                'scalingFactorForTargetCRSCoordDifferences' => [
                    'reverses' => false,
                ],
                'A0' => [
                    'reverses' => false,
                ],
                'Au1v0' => [
                    'reverses' => false,
                ],
                'Au0v1' => [
                    'reverses' => false,
                ],
                'Au2v0' => [
                    'reverses' => false,
                ],
                'Au1v1' => [
                    'reverses' => false,
                ],
                'Au0v2' => [
                    'reverses' => false,
                ],
                'Au3v0' => [
                    'reverses' => false,
                ],
                'Au2v1' => [
                    'reverses' => false,
                ],
                'Au1v2' => [
                    'reverses' => false,
                ],
                'Au0v3' => [
                    'reverses' => false,
                ],
                'B0' => [
                    'reverses' => false,
                ],
                'Bu1v0' => [
                    'reverses' => false,
                ],
                'Bu0v1' => [
                    'reverses' => false,
                ],
                'Bu2v0' => [
                    'reverses' => false,
                ],
                'Bu1v1' => [
                    'reverses' => false,
                ],
                'Bu0v2' => [
                    'reverses' => false,
                ],
                'Bu3v0' => [
                    'reverses' => false,
                ],
                'Bu2v1' => [
                    'reverses' => false,
                ],
                'Bu1v2' => [
                    'reverses' => false,
                ],
                'Bu0v3' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9647' => [
            'name' => 'General polynomial of degree 4',
            'reversible' => false,
            'paramData' => [
                'ordinate1OfEvaluationPointInSourceCRS' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPointInSourceCRS' => [
                    'reverses' => false,
                ],
                'ordinate1OfEvaluationPointInTargetCRS' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPointInTargetCRS' => [
                    'reverses' => false,
                ],
                'scalingFactorForSourceCRSCoordDifferences' => [
                    'reverses' => false,
                ],
                'scalingFactorForTargetCRSCoordDifferences' => [
                    'reverses' => false,
                ],
                'A0' => [
                    'reverses' => false,
                ],
                'Au1v0' => [
                    'reverses' => false,
                ],
                'Au0v1' => [
                    'reverses' => false,
                ],
                'Au2v0' => [
                    'reverses' => false,
                ],
                'Au1v1' => [
                    'reverses' => false,
                ],
                'Au0v2' => [
                    'reverses' => false,
                ],
                'Au3v0' => [
                    'reverses' => false,
                ],
                'Au2v1' => [
                    'reverses' => false,
                ],
                'Au1v2' => [
                    'reverses' => false,
                ],
                'Au0v3' => [
                    'reverses' => false,
                ],
                'Au4v0' => [
                    'reverses' => false,
                ],
                'Au3v1' => [
                    'reverses' => false,
                ],
                'Au2v2' => [
                    'reverses' => false,
                ],
                'Au1v3' => [
                    'reverses' => false,
                ],
                'Au0v4' => [
                    'reverses' => false,
                ],
                'B0' => [
                    'reverses' => false,
                ],
                'Bu1v0' => [
                    'reverses' => false,
                ],
                'Bu0v1' => [
                    'reverses' => false,
                ],
                'Bu2v0' => [
                    'reverses' => false,
                ],
                'Bu1v1' => [
                    'reverses' => false,
                ],
                'Bu0v2' => [
                    'reverses' => false,
                ],
                'Bu3v0' => [
                    'reverses' => false,
                ],
                'Bu2v1' => [
                    'reverses' => false,
                ],
                'Bu1v2' => [
                    'reverses' => false,
                ],
                'Bu0v3' => [
                    'reverses' => false,
                ],
                'Bu4v0' => [
                    'reverses' => false,
                ],
                'Bu3v1' => [
                    'reverses' => false,
                ],
                'Bu2v2' => [
                    'reverses' => false,
                ],
                'Bu1v3' => [
                    'reverses' => false,
                ],
                'Bu0v4' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9648' => [
            'name' => 'General polynomial of degree 6',
            'reversible' => true,
            'paramData' => [
                'ordinate1OfEvaluationPointInSourceCRS' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPointInSourceCRS' => [
                    'reverses' => false,
                ],
                'ordinate1OfEvaluationPointInTargetCRS' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPointInTargetCRS' => [
                    'reverses' => false,
                ],
                'scalingFactorForSourceCRSCoordDifferences' => [
                    'reverses' => false,
                ],
                'scalingFactorForTargetCRSCoordDifferences' => [
                    'reverses' => false,
                ],
                'A0' => [
                    'reverses' => false,
                ],
                'Au1v0' => [
                    'reverses' => false,
                ],
                'Au0v1' => [
                    'reverses' => false,
                ],
                'Au2v0' => [
                    'reverses' => false,
                ],
                'Au1v1' => [
                    'reverses' => false,
                ],
                'Au0v2' => [
                    'reverses' => false,
                ],
                'Au3v0' => [
                    'reverses' => false,
                ],
                'Au2v1' => [
                    'reverses' => false,
                ],
                'Au1v2' => [
                    'reverses' => false,
                ],
                'Au0v3' => [
                    'reverses' => false,
                ],
                'Au4v0' => [
                    'reverses' => false,
                ],
                'Au3v1' => [
                    'reverses' => false,
                ],
                'Au2v2' => [
                    'reverses' => false,
                ],
                'Au1v3' => [
                    'reverses' => false,
                ],
                'Au0v4' => [
                    'reverses' => false,
                ],
                'Au5v0' => [
                    'reverses' => false,
                ],
                'Au4v1' => [
                    'reverses' => false,
                ],
                'Au3v2' => [
                    'reverses' => false,
                ],
                'Au2v3' => [
                    'reverses' => false,
                ],
                'Au1v4' => [
                    'reverses' => false,
                ],
                'Au0v5' => [
                    'reverses' => false,
                ],
                'Au6v0' => [
                    'reverses' => false,
                ],
                'Au5v1' => [
                    'reverses' => false,
                ],
                'Au4v2' => [
                    'reverses' => false,
                ],
                'Au3v3' => [
                    'reverses' => false,
                ],
                'Au2v4' => [
                    'reverses' => false,
                ],
                'Au1v5' => [
                    'reverses' => false,
                ],
                'Au0v6' => [
                    'reverses' => false,
                ],
                'B0' => [
                    'reverses' => false,
                ],
                'Bu1v0' => [
                    'reverses' => false,
                ],
                'Bu0v1' => [
                    'reverses' => false,
                ],
                'Bu2v0' => [
                    'reverses' => false,
                ],
                'Bu1v1' => [
                    'reverses' => false,
                ],
                'Bu0v2' => [
                    'reverses' => false,
                ],
                'Bu3v0' => [
                    'reverses' => false,
                ],
                'Bu2v1' => [
                    'reverses' => false,
                ],
                'Bu1v2' => [
                    'reverses' => false,
                ],
                'Bu0v3' => [
                    'reverses' => false,
                ],
                'Bu4v0' => [
                    'reverses' => false,
                ],
                'Bu3v1' => [
                    'reverses' => false,
                ],
                'Bu2v2' => [
                    'reverses' => false,
                ],
                'Bu1v3' => [
                    'reverses' => false,
                ],
                'Bu0v4' => [
                    'reverses' => false,
                ],
                'Bu5v0' => [
                    'reverses' => false,
                ],
                'Bu4v1' => [
                    'reverses' => false,
                ],
                'Bu3v2' => [
                    'reverses' => false,
                ],
                'Bu2v3' => [
                    'reverses' => false,
                ],
                'Bu1v4' => [
                    'reverses' => false,
                ],
                'Bu0v5' => [
                    'reverses' => false,
                ],
                'Bu6v0' => [
                    'reverses' => false,
                ],
                'Bu5v1' => [
                    'reverses' => false,
                ],
                'Bu4v2' => [
                    'reverses' => false,
                ],
                'Bu3v3' => [
                    'reverses' => false,
                ],
                'Bu2v4' => [
                    'reverses' => false,
                ],
                'Bu1v5' => [
                    'reverses' => false,
                ],
                'Bu0v6' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9649' => [
            'name' => 'Reversible polynomial of degree 2',
            'reversible' => true,
            'paramData' => [
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9650' => [
            'name' => 'Reversible polynomial of degree 3',
            'reversible' => true,
            'paramData' => [
                'ordinate1OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'scalingFactorForCoordDifferences' => [
                    'reverses' => false,
                ],
                'A0' => [
                    'reverses' => true,
                ],
                'Au1v0' => [
                    'reverses' => true,
                ],
                'Au0v1' => [
                    'reverses' => true,
                ],
                'Au2v0' => [
                    'reverses' => true,
                ],
                'Au1v1' => [
                    'reverses' => true,
                ],
                'Au0v2' => [
                    'reverses' => true,
                ],
                'Au3v0' => [
                    'reverses' => true,
                ],
                'Au2v1' => [
                    'reverses' => true,
                ],
                'Au1v2' => [
                    'reverses' => true,
                ],
                'Au0v3' => [
                    'reverses' => true,
                ],
                'B0' => [
                    'reverses' => true,
                ],
                'Bu1v0' => [
                    'reverses' => true,
                ],
                'Bu0v1' => [
                    'reverses' => true,
                ],
                'Bu2v0' => [
                    'reverses' => true,
                ],
                'Bu1v1' => [
                    'reverses' => true,
                ],
                'Bu0v2' => [
                    'reverses' => true,
                ],
                'Bu3v0' => [
                    'reverses' => true,
                ],
                'Bu2v1' => [
                    'reverses' => true,
                ],
                'Bu1v2' => [
                    'reverses' => true,
                ],
                'Bu0v3' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9651' => [
            'name' => 'Reversible polynomial of degree 4',
            'reversible' => true,
            'paramData' => [
                'ordinate1OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'scalingFactorForCoordDifferences' => [
                    'reverses' => false,
                ],
                'A0' => [
                    'reverses' => true,
                ],
                'Au1v0' => [
                    'reverses' => true,
                ],
                'Au0v1' => [
                    'reverses' => true,
                ],
                'Au2v0' => [
                    'reverses' => true,
                ],
                'Au1v1' => [
                    'reverses' => true,
                ],
                'Au0v2' => [
                    'reverses' => true,
                ],
                'Au3v0' => [
                    'reverses' => true,
                ],
                'Au2v1' => [
                    'reverses' => true,
                ],
                'Au1v2' => [
                    'reverses' => true,
                ],
                'Au0v3' => [
                    'reverses' => true,
                ],
                'Au4v0' => [
                    'reverses' => true,
                ],
                'Au3v1' => [
                    'reverses' => true,
                ],
                'Au2v2' => [
                    'reverses' => true,
                ],
                'Au1v3' => [
                    'reverses' => true,
                ],
                'Au0v4' => [
                    'reverses' => true,
                ],
                'B0' => [
                    'reverses' => true,
                ],
                'Bu1v0' => [
                    'reverses' => true,
                ],
                'Bu0v1' => [
                    'reverses' => true,
                ],
                'Bu2v0' => [
                    'reverses' => true,
                ],
                'Bu1v1' => [
                    'reverses' => true,
                ],
                'Bu0v2' => [
                    'reverses' => true,
                ],
                'Bu3v0' => [
                    'reverses' => true,
                ],
                'Bu2v1' => [
                    'reverses' => true,
                ],
                'Bu1v2' => [
                    'reverses' => true,
                ],
                'Bu0v3' => [
                    'reverses' => true,
                ],
                'Bu4v0' => [
                    'reverses' => true,
                ],
                'Bu3v1' => [
                    'reverses' => true,
                ],
                'Bu2v2' => [
                    'reverses' => true,
                ],
                'Bu1v3' => [
                    'reverses' => true,
                ],
                'Bu0v4' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9652' => [
            'name' => 'Complex polynomial of degree 3',
            'reversible' => false,
            'paramData' => [
                'ordinate1OfEvaluationPointInSourceCRS' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPointInSourceCRS' => [
                    'reverses' => false,
                ],
                'ordinate1OfEvaluationPointInTargetCRS' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPointInTargetCRS' => [
                    'reverses' => false,
                ],
                'scalingFactorForSourceCRSCoordDifferences' => [
                    'reverses' => false,
                ],
                'scalingFactorForTargetCRSCoordDifferences' => [
                    'reverses' => false,
                ],
                'A1' => [
                    'reverses' => false,
                ],
                'A2' => [
                    'reverses' => false,
                ],
                'A3' => [
                    'reverses' => false,
                ],
                'A4' => [
                    'reverses' => false,
                ],
                'A5' => [
                    'reverses' => false,
                ],
                'A6' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9653' => [
            'name' => 'Complex polynomial of degree 4',
            'reversible' => false,
            'paramData' => [
                'ordinate1OfEvaluationPointInSourceCRS' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPointInSourceCRS' => [
                    'reverses' => false,
                ],
                'ordinate1OfEvaluationPointInTargetCRS' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPointInTargetCRS' => [
                    'reverses' => false,
                ],
                'scalingFactorForSourceCRSCoordDifferences' => [
                    'reverses' => false,
                ],
                'scalingFactorForTargetCRSCoordDifferences' => [
                    'reverses' => false,
                ],
                'A1' => [
                    'reverses' => false,
                ],
                'A2' => [
                    'reverses' => false,
                ],
                'A3' => [
                    'reverses' => false,
                ],
                'A4' => [
                    'reverses' => false,
                ],
                'A5' => [
                    'reverses' => false,
                ],
                'A6' => [
                    'reverses' => false,
                ],
                'A7' => [
                    'reverses' => false,
                ],
                'A8' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9654' => [
            'name' => 'Reversible polynomial of degree 13',
            'reversible' => true,
            'paramData' => [
                'ordinate1OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'ordinate2OfEvaluationPoint' => [
                    'reverses' => false,
                ],
                'scalingFactorForCoordDifferences' => [
                    'reverses' => false,
                ],
                'A0' => [
                    'reverses' => true,
                ],
                'Au1v0' => [
                    'reverses' => true,
                ],
                'Au0v1' => [
                    'reverses' => true,
                ],
                'Au2v0' => [
                    'reverses' => true,
                ],
                'Au1v1' => [
                    'reverses' => true,
                ],
                'Au3v0' => [
                    'reverses' => true,
                ],
                'Au2v1' => [
                    'reverses' => true,
                ],
                'Au4v0' => [
                    'reverses' => true,
                ],
                'Au4v1' => [
                    'reverses' => true,
                ],
                'Au5v2' => [
                    'reverses' => true,
                ],
                'Au0v8' => [
                    'reverses' => true,
                ],
                'Au9v0' => [
                    'reverses' => true,
                ],
                'Au2v7' => [
                    'reverses' => true,
                ],
                'Au1v9' => [
                    'reverses' => true,
                ],
                'Au3v9' => [
                    'reverses' => true,
                ],
                'B0' => [
                    'reverses' => true,
                ],
                'Bu1v0' => [
                    'reverses' => true,
                ],
                'Bu0v1' => [
                    'reverses' => true,
                ],
                'Bu2v0' => [
                    'reverses' => true,
                ],
                'Bu1v1' => [
                    'reverses' => true,
                ],
                'Bu0v2' => [
                    'reverses' => true,
                ],
                'Bu3v0' => [
                    'reverses' => true,
                ],
                'Bu4v0' => [
                    'reverses' => true,
                ],
                'Bu1v3' => [
                    'reverses' => true,
                ],
                'Bu5v0' => [
                    'reverses' => true,
                ],
                'Bu2v3' => [
                    'reverses' => true,
                ],
                'Bu1v4' => [
                    'reverses' => true,
                ],
                'Bu0v5' => [
                    'reverses' => true,
                ],
                'Bu6v0' => [
                    'reverses' => true,
                ],
                'Bu3v3' => [
                    'reverses' => true,
                ],
                'Bu2v4' => [
                    'reverses' => true,
                ],
                'Bu1v5' => [
                    'reverses' => true,
                ],
                'Bu7v0' => [
                    'reverses' => true,
                ],
                'Bu6v1' => [
                    'reverses' => true,
                ],
                'Bu4v4' => [
                    'reverses' => true,
                ],
                'Bu8v1' => [
                    'reverses' => true,
                ],
                'Bu7v2' => [
                    'reverses' => true,
                ],
                'Bu2v7' => [
                    'reverses' => true,
                ],
                'Bu0v9' => [
                    'reverses' => true,
                ],
                'Bu4v6' => [
                    'reverses' => true,
                ],
                'Bu9v2' => [
                    'reverses' => true,
                ],
                'Bu8v3' => [
                    'reverses' => true,
                ],
                'Bu5v7' => [
                    'reverses' => true,
                ],
                'Bu9v4' => [
                    'reverses' => true,
                ],
                'Bu4v9' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9656' => [
            'name' => 'Cartesian Grid Offsets',
            'reversible' => true,
            'paramData' => [
                'eastingOffset' => [
                    'reverses' => true,
                ],
                'northingOffset' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9658' => [
            'name' => 'Vertical Offset by Grid Interpolation (VERTCON)',
            'reversible' => true,
            'paramData' => [
                'offsetsFile' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9659' => [
            'name' => 'Geographic3D to 2D conversion',
            'reversible' => true,
            'paramData' => [
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9660' => [
            'name' => 'Geographic3D offsets',
            'reversible' => true,
            'paramData' => [
                'latitudeOffset' => [
                    'reverses' => true,
                ],
                'longitudeOffset' => [
                    'reverses' => true,
                ],
                'verticalOffset' => [
                    'reverses' => true,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9663' => [
            'name' => 'Geographic3D to GravityRelatedHeight (OSGM-GB)',
            'reversible' => false,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9665' => [
            'name' => 'Geographic3D to GravityRelatedHeight (gtx)',
            'reversible' => false,
            'paramData' => [
                'geoidHeightCorrectionModelFile' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9801' => [
            'name' => 'Lambert Conic Conformal (1SP)',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'scaleFactorAtNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9802' => [
            'name' => 'Lambert Conic Conformal (2SP)',
            'reversible' => true,
            'paramData' => [
                'latitudeOfFalseOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfFalseOrigin' => [
                    'reverses' => false,
                ],
                'latitudeOf1stStandardParallel' => [
                    'reverses' => false,
                ],
                'latitudeOf2ndStandardParallel' => [
                    'reverses' => false,
                ],
                'eastingAtFalseOrigin' => [
                    'reverses' => false,
                ],
                'northingAtFalseOrigin' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9803' => [
            'name' => 'Lambert Conic Conformal (2SP Belgium)',
            'reversible' => true,
            'paramData' => [
                'latitudeOfFalseOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfFalseOrigin' => [
                    'reverses' => false,
                ],
                'latitudeOf1stStandardParallel' => [
                    'reverses' => false,
                ],
                'latitudeOf2ndStandardParallel' => [
                    'reverses' => false,
                ],
                'eastingAtFalseOrigin' => [
                    'reverses' => false,
                ],
                'northingAtFalseOrigin' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9804' => [
            'name' => 'Mercator (variant A)',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'scaleFactorAtNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9805' => [
            'name' => 'Mercator (variant B)',
            'reversible' => true,
            'paramData' => [
                'latitudeOf1stStandardParallel' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9806' => [
            'name' => 'Cassini-Soldner',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9807' => [
            'name' => 'Transverse Mercator',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'scaleFactorAtNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9808' => [
            'name' => 'Transverse Mercator (South Orientated)',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'scaleFactorAtNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9809' => [
            'name' => 'Oblique Stereographic',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'scaleFactorAtNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9810' => [
            'name' => 'Polar Stereographic (variant A)',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'scaleFactorAtNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9811' => [
            'name' => 'New Zealand Map Grid',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9812' => [
            'name' => 'Hotine Oblique Mercator (variant A)',
            'reversible' => true,
            'paramData' => [
                'latitudeOfProjectionCentre' => [
                    'reverses' => false,
                ],
                'longitudeOfProjectionCentre' => [
                    'reverses' => false,
                ],
                'azimuthAtProjectionCentre' => [
                    'reverses' => false,
                ],
                'angleFromRectifiedToSkewGrid' => [
                    'reverses' => false,
                ],
                'scaleFactorAtProjectionCentre' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9813' => [
            'name' => 'Laborde Oblique Mercator',
            'reversible' => true,
            'paramData' => [
                'latitudeOfProjectionCentre' => [
                    'reverses' => false,
                ],
                'longitudeOfProjectionCentre' => [
                    'reverses' => false,
                ],
                'azimuthAtProjectionCentre' => [
                    'reverses' => false,
                ],
                'scaleFactorAtProjectionCentre' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9814' => [
            'name' => 'Swiss Oblique Cylindrical',
            'reversible' => true,
            'paramData' => [
                'latitudeOfProjectionCentre' => [
                    'reverses' => false,
                ],
                'longitudeOfProjectionCentre' => [
                    'reverses' => false,
                ],
                'eastingAtProjectionCentre' => [
                    'reverses' => false,
                ],
                'northingAtProjectionCentre' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9815' => [
            'name' => 'Hotine Oblique Mercator (variant B)',
            'reversible' => true,
            'paramData' => [
                'latitudeOfProjectionCentre' => [
                    'reverses' => false,
                ],
                'longitudeOfProjectionCentre' => [
                    'reverses' => false,
                ],
                'azimuthAtProjectionCentre' => [
                    'reverses' => false,
                ],
                'angleFromRectifiedToSkewGrid' => [
                    'reverses' => false,
                ],
                'scaleFactorAtProjectionCentre' => [
                    'reverses' => false,
                ],
                'eastingAtProjectionCentre' => [
                    'reverses' => false,
                ],
                'northingAtProjectionCentre' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9817' => [
            'name' => 'Lambert Conic Near-Conformal',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'scaleFactorAtNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9818' => [
            'name' => 'American Polyconic',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9819' => [
            'name' => 'Krovak',
            'reversible' => true,
            'paramData' => [
                'latitudeOfProjectionCentre' => [
                    'reverses' => false,
                ],
                'longitudeOfOrigin' => [
                    'reverses' => false,
                ],
                'coLatitudeOfConeAxis' => [
                    'reverses' => false,
                ],
                'latitudeOfPseudoStandardParallel' => [
                    'reverses' => false,
                ],
                'scaleFactorOnPseudoStandardParallel' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9820' => [
            'name' => 'Lambert Azimuthal Equal Area',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9822' => [
            'name' => 'Albers Equal Area',
            'reversible' => true,
            'paramData' => [
                'latitudeOfFalseOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfFalseOrigin' => [
                    'reverses' => false,
                ],
                'latitudeOf1stStandardParallel' => [
                    'reverses' => false,
                ],
                'latitudeOf2ndStandardParallel' => [
                    'reverses' => false,
                ],
                'eastingAtFalseOrigin' => [
                    'reverses' => false,
                ],
                'northingAtFalseOrigin' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9824' => [
            'name' => 'Transverse Mercator Zoned Grid System',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'initialLongitude' => [
                    'reverses' => false,
                ],
                'zoneWidth' => [
                    'reverses' => false,
                ],
                'scaleFactorAtNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9825' => [
            'name' => 'Pseudo Plate Carree',
            'reversible' => true,
            'paramData' => [
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9826' => [
            'name' => 'Lambert Conic Conformal (West Orientated)',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'scaleFactorAtNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9827' => [
            'name' => 'Bonne',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9828' => [
            'name' => 'Bonne (South Orientated)',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9829' => [
            'name' => 'Polar Stereographic (variant B)',
            'reversible' => true,
            'paramData' => [
                'latitudeOfStandardParallel' => [
                    'reverses' => false,
                ],
                'longitudeOfOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9830' => [
            'name' => 'Polar Stereographic (variant C)',
            'reversible' => true,
            'paramData' => [
                'latitudeOfStandardParallel' => [
                    'reverses' => false,
                ],
                'longitudeOfOrigin' => [
                    'reverses' => false,
                ],
                'eastingAtFalseOrigin' => [
                    'reverses' => false,
                ],
                'northingAtFalseOrigin' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9831' => [
            'name' => 'Guam Projection',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9832' => [
            'name' => 'Modified Azimuthal Equidistant',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9833' => [
            'name' => 'Hyperbolic Cassini-Soldner',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9834' => [
            'name' => 'Lambert Cylindrical Equal Area (Spherical)',
            'reversible' => true,
            'paramData' => [
                'latitudeOf1stStandardParallel' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9835' => [
            'name' => 'Lambert Cylindrical Equal Area',
            'reversible' => true,
            'paramData' => [
                'latitudeOf1stStandardParallel' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9836' => [
            'name' => 'Geocentric/topocentric conversions',
            'reversible' => true,
            'paramData' => [
                'geocentricXOfTopocentricOrigin' => [
                    'reverses' => false,
                ],
                'geocentricYOfTopocentricOrigin' => [
                    'reverses' => false,
                ],
                'geocentricZOfTopocentricOrigin' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9837' => [
            'name' => 'Geographic/topocentric conversions',
            'reversible' => true,
            'paramData' => [
                'latitudeOfTopocentricOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfTopocentricOrigin' => [
                    'reverses' => false,
                ],
                'ellipsoidalHeightOfTopocentricOrigin' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9838' => [
            'name' => 'Vertical Perspective',
            'reversible' => false,
            'paramData' => [
                'latitudeOfTopocentricOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfTopocentricOrigin' => [
                    'reverses' => false,
                ],
                'ellipsoidalHeightOfTopocentricOrigin' => [
                    'reverses' => false,
                ],
                'viewpointHeight' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9839' => [
            'name' => 'Vertical Perspective (Orthographic case)',
            'reversible' => false,
            'paramData' => [
                'latitudeOfTopocentricOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfTopocentricOrigin' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9840' => [
            'name' => 'Orthographic',
            'reversible' => true,
            'paramData' => [
                'latitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'longitudeOfNaturalOrigin' => [
                    'reverses' => false,
                ],
                'falseEasting' => [
                    'reverses' => false,
                ],
                'falseNorthing' => [
                    'reverses' => false,
                ],
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9843' => [
            'name' => 'Axis Order Reversal (2D)',
            'reversible' => true,
            'paramData' => [
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::9844' => [
            'name' => 'Axis Order Reversal (Geographic3D horizontal)',
            'reversible' => true,
            'paramData' => [
            ],
            'help' => '',
        ],
        'urn:ogc:def:method:EPSG::32768' => [
            'name' => 'Alias',
            'reversible' => true,
            'paramData' => [
            ],
            'help' => '',
        ],
    ];

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
        self::EPSG_LAMBERT_CYLINDRICAL_EQUAL_AREA_SPHERICAL => 'lambertCylindricalEqualAreaSpherical',
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
        self::EPSG_TRANSVERSE_MERCATOR_3D => 'transverseMercator',
        self::EPSG_TRANSVERSE_MERCATOR_ZONED_GRID_SYSTEM => 'transverseMercatorZonedGrid',
        self::EPSG_VERTICAL_OFFSET => 'offset',
        self::EPSG_VERTICAL_OFFSET_AND_SLOPE => 'offsetAndSlope',
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
        self::EPSG_NADCON5_2D => 'offsetsFromGridNADCON5',
        self::EPSG_NADCON5_3D => 'offsetsFromGridNADCON5',
        self::EPSG_NTV2 => 'offsetsFromGrid',
        self::EPSG_ZERO_TIDE_HEIGHT_TO_MEAN_TIDE_HEIGHT_EVRF2019 => 'zeroTideHeightToMeanTideHeightEVRF2019',
        self::EPSG_GEOCENTRIC_TRANSLATION_BY_GRID_INTERPOLATION_IGN => 'offsetsFromGrid',
        self::EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_GTX => 'geographic3DTo2DPlusGravityHeightFromGrid',
        self::EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_GTX => 'geographic3DToGravityHeightFromGrid',
        self::EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_GTX => 'offsetFromGrid',
        self::EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_NGS_BIN => 'geographic3DToGravityHeightFromGrid',
        self::EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_NGS_BIN => 'geographic3DTo2DPlusGravityHeightFromGrid',
        self::EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_IGN2009 => 'geographic3DTo2DPlusGravityHeightFromGrid',
        self::EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_IGN2009 => 'geographic3DToGravityHeightFromGrid',
        self::EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_EGM2008 => 'geographic3DTo2DPlusGravityHeightFromGrid',
        self::EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_EGM2008 => 'geographic3DToGravityHeightFromGrid',
        self::EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_PL_TXT => 'geographic3DTo2DPlusGravityHeightFromGrid',
        self::EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_PL_TXT => 'geographic3DToGravityHeightFromGrid',
        self::EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_PL_TXT => 'offsetFromGrid',
        self::EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_BEV_AT => 'geographic3DTo2DPlusGravityHeightFromGrid',
        self::EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_BEV_AT => 'geographic3DToGravityHeightFromGrid',
        self::EPSG_VERTICAL_OFFSET_BY_GRID_INTERPOLATION_BEV_AT => 'offsetFromGrid',
        self::EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_NRCAN_BYN => 'geographic3DTo2DPlusGravityHeightFromGrid',
        self::EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_NRCAN_BYN => 'geographic3DToGravityHeightFromGrid',
        self::EPSG_VERTICAL_CHANGE_BY_GEOID_GRID_DIFFERENCE_NRCAN => 'offsetFromGrid',
        self::EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_GRAVSOFT => 'geographic3DTo2DPlusGravityHeightFromGrid',
        self::EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_GRAVSOFT => 'geographic3DToGravityHeightFromGrid',
        self::EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_TXT => 'geographic3DTo2DPlusGravityHeightFromGrid',
        self::EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_TXT => 'geographic3DToGravityHeightFromGrid',
        self::EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_OSGM15_IRE => 'geographic3DTo2DPlusGravityHeightFromGrid',
        self::EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_OSGM15_IRE => 'geographic3DToGravityHeightFromGrid',
        self::EPSG_GEOG3D_TO_GEOG2D_PLUS_GRAVITYRELATEDHEIGHT_ISG => 'geographic3DTo2DPlusGravityHeightFromGrid',
        self::EPSG_GEOGRAPHIC3D_TO_GRAVITYRELATEDHEIGHT_ISG => 'geographic3DToGravityHeightFromGrid',
        self::EPSG_LOCAL_ORTHOGRAPHIC => 'localOrthographic',
    ];

    public static function getFunctionName(string $srid): string
    {
        return self::METHOD_CODE_TO_IMPLEMENTATION_LOOKUP[$srid];
    }

    /**
     * @internal
     * @return array{name: string, reversible: bool, paramData: array<string, array{reverses: bool}>}
     */
    public static function getMethodData(string $methodSrid): array
    {
        return self::$sridData[$methodSrid];
    }
}
