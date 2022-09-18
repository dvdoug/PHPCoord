<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateSystem;

use PHPCoord\Exception\UnknownCoordinateSystemException;

class Cartesian extends CoordinateSystem
{
    /**
     * 2D Axes: easting, northing (E,N). Orientations: east, north. Units: British chain (Benoit 1895 B).
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_CHBNB = 'urn:ogc:def:cs:EPSG::4401';

    /**
     * 2D Axes: easting, northing (E,N). Orientations: east, north. Units: British chain (Sears 1922 truncated).
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_CHSE_T = 'urn:ogc:def:cs:EPSG::4410';

    /**
     * 2D Axes: easting, northing (E,N). Orientations: east, north. Units: British chain (Sears 1922).
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_CHSE = 'urn:ogc:def:cs:EPSG::4402';

    /**
     * 2D Axes: easting, northing (E,N). Orientations: east, north. Units: foot.
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_FT = 'urn:ogc:def:cs:EPSG::1039';

    /**
     * 2D Axes: easting, northing (E,N). Orientations: east, north. Units: Clarke's foot.
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_FTCLA = 'urn:ogc:def:cs:EPSG::4403';

    /**
     * 2D Axes: easting, northing (E,N). Orientations: east, north. Units: Gold Coast foot.
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_FTGC = 'urn:ogc:def:cs:EPSG::4404';

    /**
     * 2D Axes: easting, northing (E,N). Orientations: east, north. Units: British foot (Sears 1922).
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_FTSE = 'urn:ogc:def:cs:EPSG::4405';

    /**
     * 2D Axes: easting, northing (E,N). Orientations: east, north. Units: kilometre.
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_KM = 'urn:ogc:def:cs:EPSG::4406';

    /**
     * 2D Axes: easting, northing (E,N). Orientations: east, north. Units: Clarke's link.
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_LKCLA = 'urn:ogc:def:cs:EPSG::4407';

    /**
     * 2D Axes: easting, northing (E,N). Orientations: east, north. Units: metre
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_M = 'urn:ogc:def:cs:EPSG::4400';

    /**
     * 2D Axes: easting, northing (E,N). Orientations: east, north. Units: Clarke's yard.
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_YDCL = 'urn:ogc:def:cs:EPSG::1028';

    /**
     * 2D Axes: easting, northing (E,N). Orientations: east, north. Units: Indian yard.
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_YDIND = 'urn:ogc:def:cs:EPSG::4408';

    /**
     * 2D Axes: easting, northing (E,N). Orientations: east, north. Units: British yard (Sears 1922).
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_YDSE = 'urn:ogc:def:cs:EPSG::4409';

    /**
     * 2D Axes: easting, northing (M,P). Orientations east, north. Units: metre
     * Used in projected and engineering coordinate reference systems in Portuguese territories.
     */
    public const EPSG_2D_AXES_EASTING_NORTHING_M_P_ORIENTATIONS_EAST_NORTH_UOM_M = 'urn:ogc:def:cs:EPSG::1024';

    /**
     * 2D Axes: easting, northing (X,Y). Orientations: east, north. Units: foot.
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_EASTING_NORTHING_X_Y_ORIENTATIONS_EAST_NORTH_UOM_FT = 'urn:ogc:def:cs:EPSG::4495';

    /**
     * 2D Axes: easting, northing (X,Y). Orientations: east, north. Units: foot (US).
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_EASTING_NORTHING_X_Y_ORIENTATIONS_EAST_NORTH_UOM_FTUS = 'urn:ogc:def:cs:EPSG::4497';

    /**
     * 2D Axes: easting, northing (X,Y). Orientations: east, north. Units: metre
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_EASTING_NORTHING_X_Y_ORIENTATIONS_EAST_NORTH_UOM_M = 'urn:ogc:def:cs:EPSG::4499';

    /**
     * 2D Axes: easting, northing (Y,X). Orientations: east, north. Units: metre
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_EASTING_NORTHING_Y_X_ORIENTATIONS_EAST_NORTH_UOM_M = 'urn:ogc:def:cs:EPSG::4498';

    /**
     * 2D Axes: easting, northing [E(X),N(Y)]. Orientations: east, north. Units: metre
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_EASTING_NORTHING_E_X_N_Y_ORIENTATIONS_EAST_NORTH_UOM_M = 'urn:ogc:def:cs:EPSG::4496';

    /**
     * 2D Axes: northing, easting (N,E). Orientations: north, east. Units: foot.
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_NORTHING_EASTING_N_E_ORIENTATIONS_NORTH_EAST_UOM_FT = 'urn:ogc:def:cs:EPSG::1029';

    /**
     * 2D Axes: northing, easting (N,E). Orientations: north, east. Units: Clarke's foot.
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_NORTHING_EASTING_N_E_ORIENTATIONS_NORTH_EAST_UOM_FTCLA = 'urn:ogc:def:cs:EPSG::4502';

    /**
     * 2D Axes: northing, easting (N,E). Orientations: north, east. Units: metre
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_NORTHING_EASTING_N_E_ORIENTATIONS_NORTH_EAST_UOM_M = 'urn:ogc:def:cs:EPSG::4500';

    /**
     * 2D Axes: northing, easting (X,Y). Orientations: north, east. Units: link.
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_NORTHING_EASTING_X_Y_ORIENTATIONS_NORTH_EAST_UOM_LK = 'urn:ogc:def:cs:EPSG::4533';

    /**
     * 2D Axes: northing, easting (X,Y). Orientations: north, east. Units: metre
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_NORTHING_EASTING_X_Y_ORIENTATIONS_NORTH_EAST_UOM_M = 'urn:ogc:def:cs:EPSG::4530';

    /**
     * 2D Axes: northing, easting (Y,X). Orientations: north, east. Units: metre
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_NORTHING_EASTING_Y_X_ORIENTATIONS_NORTH_EAST_UOM_M = 'urn:ogc:def:cs:EPSG::4532';

    /**
     * 2D Axes: northing, easting (no abbrev). Orientations: north, east. Units: metre
     * Used in projected coordinate reference systems for nautical charting.
     */
    public const EPSG_2D_AXES_NORTHING_EASTING_NO_ABBREV_ORIENTATIONS_NORTH_EAST_UOM_M = 'urn:ogc:def:cs:EPSG::4534';

    /**
     * 2D Axes: northing, easting (x,y). Orientations: north, east. Units: metre
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_NORTHING_EASTING_X_Y_ORIENTATIONS_NORTH_EAST_UOM_M_LOWERCASE = 'urn:ogc:def:cs:EPSG::4531';

    /**
     * 2D Axes: northing, westing (N,E). Orientations: north, west. Units: metre
     * Used in Danish projected coordinate reference systems. Note that second axis has abbreviation E but is positive
     * west.
     */
    public const EPSG_2D_AXES_NORTHING_WESTING_N_E_ORIENTATIONS_NORTH_WEST_UOM_M = 'urn:ogc:def:cs:EPSG::4501';

    /**
     * 2D Axes: northing, westing (Y,X). Orientations: north, west. Units: metre
     * Used in Danish projected coordinate reference systems.
     */
    public const EPSG_2D_AXES_NORTHING_WESTING_Y_X_ORIENTATIONS_NORTH_WEST_UOM_M = 'urn:ogc:def:cs:EPSG::1031';

    /**
     * 2D Axes: southing, westing (P,M). Orientations: south, west. Units: metre
     * Used in old projected coordinate reference systems in Portugal.
     */
    public const EPSG_2D_AXES_SOUTHING_WESTING_P_M_ORIENTATIONS_SOUTH_WEST_UOM_M = 'urn:ogc:def:cs:EPSG::6509';

    /**
     * 2D Axes: southing, westing (X,Y). Orientations: south, west. Units: metre
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_SOUTHING_WESTING_X_Y_ORIENTATIONS_SOUTH_WEST_UOM_M = 'urn:ogc:def:cs:EPSG::6501';

    /**
     * 2D Axes: westing, northing (W,N). Orientations: west, north. Units: metre
     * Used in old Danish coordinate reference systems.
     */
    public const EPSG_2D_AXES_WESTING_NORTHING_W_N_ORIENTATIONS_WEST_NORTH_UOM_M = 'urn:ogc:def:cs:EPSG::4491';

    /**
     * 2D Axes: westing, southing (Y,X). Orientations: west, south. Units: German legal metre.
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_WESTING_SOUTHING_Y_X_ORIENTATIONS_WEST_SOUTH_UOM_GLM = 'urn:ogc:def:cs:EPSG::6502';

    /**
     * 2D Axes: westing, southing (Y,X). Orientations: west, south. Units: metre
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_2D_AXES_WESTING_SOUTHING_Y_X_ORIENTATIONS_WEST_SOUTH_UOM_M = 'urn:ogc:def:cs:EPSG::6503';

    /**
     * 2D CS for UPS north. Axes: E,N. Orientations: E along 90°E meridian, N along 180°E meridian. Units: metre
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_UPS_NORTH_AXES_E_N_ORIENTATIONS_E_ALONG_90_DEG_E_MERIDIAN_N_ALONG_180_DEG_E_MERIDIAN_UOM_M = 'urn:ogc:def:cs:EPSG::1026';

    /**
     * 2D CS for UPS north. Axes: N,E. Orientations: N along 180°E meridian, E along 90°E meridian. Units: metre
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_UPS_NORTH_AXES_N_E_ORIENTATIONS_N_ALONG_180_DEG_E_MERIDIAN_E_ALONG_90_DEG_E_MERIDIAN_UOM_M = 'urn:ogc:def:cs:EPSG::4493';

    /**
     * 2D CS for UPS south. Axes: E,N. Orientations: E along 90°E, N along 0°E meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_UPS_SOUTH_AXES_E_N_ORIENTATIONS_E_ALONG_90_DEG_E_N_ALONG_0_DEG_E_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::1027';

    /**
     * 2D CS for UPS south. Axes: N,E. Orientations: N along 0°E, E along 90°E meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_UPS_SOUTH_AXES_N_E_ORIENTATIONS_N_ALONG_0_DEG_E_E_ALONG_90_DEG_E_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4494';

    /**
     * 2D CS for north polar azimuthal lonO 0°E. Axes: X,Y. Orientations: X along 90°E, Y along 180°E meridians. Units: metre
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_NORTH_POLAR_AZIMUTHAL_LONO_0_DEG_E_AXES_X_Y_ORIENTATIONS_X_ALONG_90_DEG_E_Y_ALONG_180_DEG_E_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4469';

    /**
     * 2D CS for north polar azimuthal lonO 100°W. Axes: X,Y. Orientations: X along 10°W, Y along 80°E meridians. Units: metre
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_NORTH_POLAR_AZIMUTHAL_LONO_100_DEG_W_AXES_X_Y_ORIENTATIONS_X_ALONG_10_DEG_W_Y_ALONG_80_DEG_E_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4466';

    /**
     * 2D CS for north polar azimuthal lonO 105°E. Axes: X,Y. Orientations: X along 165°W, Y along 75°W meridians. Units: metre
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_NORTH_POLAR_AZIMUTHAL_LONO_105_DEG_E_AXES_X_Y_ORIENTATIONS_X_ALONG_165_DEG_W_Y_ALONG_75_DEG_W_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::1038';

    /**
     * 2D CS for north polar azimuthal lonO 10°E. Axes: X,Y. Orientations: X along 100°E, Y along 170°W meridians. Units: metre
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_NORTH_POLAR_AZIMUTHAL_LONO_10_DEG_E_AXES_X_Y_ORIENTATIONS_X_ALONG_100_DEG_E_Y_ALONG_170_DEG_W_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4463';

    /**
     * 2D CS for north polar azimuthal lonO 150°W. Axes: X,Y. Orientations: X along 60°W, Y along 30°E meridians. Units: metre
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_NORTH_POLAR_AZIMUTHAL_LONO_150_DEG_W_AXES_X_Y_ORIENTATIONS_X_ALONG_60_DEG_W_Y_ALONG_30_DEG_E_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4467';

    /**
     * 2D CS for north polar azimuthal lonO 180°E. Axes: X,Y. Orientations: X along 90°W, Y along 0°E meridians. Units: metre
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_NORTH_POLAR_AZIMUTHAL_LONO_180_DEG_E_AXES_X_Y_ORIENTATIONS_X_ALONG_90_DEG_W_Y_ALONG_0_DEG_E_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4464';

    /**
     * 2D CS for north polar azimuthal lonO 18°E. Axes: X,Y. Orientations: X along 108°E, Y along 162°W meridians. Units: metre
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_NORTH_POLAR_AZIMUTHAL_LONO_18_DEG_E_AXES_X_Y_ORIENTATIONS_X_ALONG_108_DEG_E_Y_ALONG_162_DEG_W_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::1037';

    /**
     * 2D CS for north polar azimuthal lonO 33°W. Axes: X,Y. Orientations: X along 57°E, Y along 147°E meridians. Units: metre
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_NORTH_POLAR_AZIMUTHAL_LONO_33_DEG_W_AXES_X_Y_ORIENTATIONS_X_ALONG_57_DEG_E_Y_ALONG_147_DEG_E_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::1036';

    /**
     * 2D CS for north polar azimuthal lonO 40°W. Axes: X,Y. Orientations: X along 50°E, Y along 140°E meridians. Units: metre
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_NORTH_POLAR_AZIMUTHAL_LONO_40_DEG_W_AXES_X_Y_ORIENTATIONS_X_ALONG_50_DEG_E_Y_ALONG_140_DEG_E_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4465';

    /**
     * 2D CS for north polar azimuthal lonO 45°W. Axes: X,Y. Orientations: X along 45°E, Y along 135°E meridians. Units: metre
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_NORTH_POLAR_AZIMUTHAL_LONO_45_DEG_W_AXES_X_Y_ORIENTATIONS_X_ALONG_45_DEG_E_Y_ALONG_135_DEG_E_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4468';

    /**
     * 2D CS for north polar azimuthal lonO 90°E. Axes: X,Y. Orientations: X along 180°E, Y along 90°W meridians. Units: metre
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_NORTH_POLAR_AZIMUTHAL_LONO_90_DEG_E_AXES_X_Y_ORIENTATIONS_X_ALONG_180_DEG_E_Y_ALONG_90_DEG_W_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::1035';

    /**
     * 2D CS for south polar azimuthal lonO 0°E. Axes: E,N. Orientations: E along 90°E, N along 0°E meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_0_DEG_E_AXES_E_N_ORIENTATIONS_E_ALONG_90_DEG_E_N_ALONG_0_DEG_E_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4490';

    /**
     * 2D CS for south polar azimuthal lonO 0°E. Axes: X,Y. Orientations: X along 90°E, Y along 0°E meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_0_DEG_E_AXES_X_Y_ORIENTATIONS_X_ALONG_90_DEG_E_Y_ALONG_0_DEG_E_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4470';

    /**
     * 2D CS for south polar azimuthal lonO 105°E. Axes: E,N. Orientations: E along 165°W, N along 105°E meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_105_DEG_E_AXES_E_N_ORIENTATIONS_E_ALONG_165_DEG_W_N_ALONG_105_DEG_E_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4485';

    /**
     * 2D CS for south polar azimuthal lonO 105°W. Axes: E,N. Orientations: E along 15°W, N along 105°W meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_105_DEG_W_AXES_E_N_ORIENTATIONS_E_ALONG_15_DEG_W_N_ALONG_105_DEG_W_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4474';

    /**
     * 2D CS for south polar azimuthal lonO 135°E. Axes: E,N. Orientations: E along 135°W, N along 135°E meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_135_DEG_E_AXES_E_N_ORIENTATIONS_E_ALONG_135_DEG_W_N_ALONG_135_DEG_E_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4486';

    /**
     * 2D CS for south polar azimuthal lonO 135°W. Axes: E,N. Orientations: E along 45°W, N along 135°W meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_135_DEG_W_AXES_E_N_ORIENTATIONS_E_ALONG_45_DEG_W_N_ALONG_135_DEG_W_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4473';

    /**
     * 2D CS for south polar azimuthal lonO 140°E. Axes: X,Y. Orientations: X along 130°W, Y along 140°E meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_140_DEG_E_AXES_X_Y_ORIENTATIONS_X_ALONG_130_DEG_W_Y_ALONG_140_DEG_E_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::1025';

    /**
     * 2D CS for south polar azimuthal lonO 150°E. Axes: E,N. Orientations: E along 120°W, N along 150°E meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_150_DEG_E_AXES_E_N_ORIENTATIONS_E_ALONG_120_DEG_W_N_ALONG_150_DEG_E_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4487';

    /**
     * 2D CS for south polar azimuthal lonO 150°W. Axes: E,N. Orientations: E along 60°W, N along 150°W meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_150_DEG_W_AXES_E_N_ORIENTATIONS_E_ALONG_60_DEG_W_N_ALONG_150_DEG_W_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4472';

    /**
     * 2D CS for south polar azimuthal lonO 15°E. Axes: E,N. Orientations: E along 105°E, N along 15°E meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_15_DEG_E_AXES_E_N_ORIENTATIONS_E_ALONG_105_DEG_E_N_ALONG_15_DEG_E_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4480';

    /**
     * 2D CS for south polar azimuthal lonO 15°W. Axes: E,N. Orientations: E along 75°E, N along 15°W meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_15_DEG_W_AXES_E_N_ORIENTATIONS_E_ALONG_75_DEG_E_N_ALONG_15_DEG_W_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4479';

    /**
     * 2D CS for south polar azimuthal lonO 165°E. Axes: E,N. Orientations: E along 105°W, N along 165°E meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_165_DEG_E_AXES_E_N_ORIENTATIONS_E_ALONG_105_DEG_W_N_ALONG_165_DEG_E_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4488';

    /**
     * 2D CS for south polar azimuthal lonO 165°W. Axes: E,N. Orientations: E along 75°W, N along 165°W meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_165_DEG_W_AXES_E_N_ORIENTATIONS_E_ALONG_75_DEG_W_N_ALONG_165_DEG_W_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4471';

    /**
     * 2D CS for south polar azimuthal lonO 180°E. Axes: N,E. Orientations: N along 180°E, E along 90°W meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_180_DEG_E_AXES_N_E_ORIENTATIONS_N_ALONG_180_DEG_E_E_ALONG_90_DEG_W_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::1044';

    /**
     * 2D CS for south polar azimuthal lonO 30°E. Axes: E,N. Orientations: E along 120°E, N along 30°Emeridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_30_DEG_E_AXES_E_N_ORIENTATIONS_E_ALONG_120_DEG_E_N_ALONG_30_DEG_EMERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4481';

    /**
     * 2D CS for south polar azimuthal lonO 30°W. Axes: E,N. Orientations: E along 60°E, N along 30°W meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_30_DEG_W_AXES_E_N_ORIENTATIONS_E_ALONG_60_DEG_E_N_ALONG_30_DEG_W_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4478';

    /**
     * 2D CS for south polar azimuthal lonO 45°E. Axes: E,N. Orientations: E along 135°E, N along 45°E meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_45_DEG_E_AXES_E_N_ORIENTATIONS_E_ALONG_135_DEG_E_N_ALONG_45_DEG_E_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4482';

    /**
     * 2D CS for south polar azimuthal lonO 45°W. Axes: E,N. Orientations: E along 45°E, N along 45°W meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_45_DEG_W_AXES_E_N_ORIENTATIONS_E_ALONG_45_DEG_E_N_ALONG_45_DEG_W_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4477';

    /**
     * 2D CS for south polar azimuthal lonO 70°E. Axes: E,N. Orientations: E along 160°E, N along 70°E meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_70_DEG_E_AXES_E_N_ORIENTATIONS_E_ALONG_160_DEG_E_N_ALONG_70_DEG_E_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4489';

    /**
     * 2D CS for south polar azimuthal lonO 75°E. Axes: E,N. Orientations: E along 165°E, N along 75°E meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_75_DEG_E_AXES_E_N_ORIENTATIONS_E_ALONG_165_DEG_E_N_ALONG_75_DEG_E_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4483';

    /**
     * 2D CS for south polar azimuthal lonO 75°W. Axes: E,N. Orientations: E along 15°E, N along 75°W meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_75_DEG_W_AXES_E_N_ORIENTATIONS_E_ALONG_15_DEG_E_N_ALONG_75_DEG_W_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4476';

    /**
     * 2D CS for south polar azimuthal lonO 90°E. Axes: E,N. Orientations: E along 180°E, N along 90°E meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_90_DEG_E_AXES_E_N_ORIENTATIONS_E_ALONG_180_DEG_E_N_ALONG_90_DEG_E_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4484';

    /**
     * 2D CS for south polar azimuthal lonO 90°W. Axes: E,N. Orientations: E along 0°E, N along 90°W meridians. Units: metre
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_90_DEG_W_AXES_E_N_ORIENTATIONS_E_ALONG_0_DEG_E_N_ALONG_90_DEG_W_MERIDIANS_UOM_M = 'urn:ogc:def:cs:EPSG::4475';

    /**
     * 3D CS (geocentric). Axes: geocentric X Y Z. Orientations: X and Y in equatorial plane, X positive through intersection with prime meridian, Y through 0°N 90°E. Z axis parallel to mean earth rotation axis and positive towards North Pole. Units: metre
     * Earth-centred, Earth-fixed (ECEF) right-handed Cartesian 3D CS, used in geocentric coordinate reference systems.
     */
    public const EPSG_3D_CS_GEOCENTRIC_AXES_GEOCENTRIC_X_Y_Z_ORIENTATIONS_X_AND_Y_IN_EQUATORIAL_PLANE_X_POSITIVE_THROUGH_INTERSECTION_WITH_PRIME_MERIDIAN_Y_THROUGH_0_DEG_N_90_DEG_E_Z_AXIS_PARALLEL_TO_MEAN_EARTH_ROTATION_AXIS_AND_POSITIVE_TOWARDS_NORTH_POLE_UOM_M = 'urn:ogc:def:cs:EPSG::6500';

    /**
     * Affine 3D Axes: northing, easting, ellipsoidal height (X,Y,h). Orientations: north, east, up. Units: metre
     * Used in projected 3D CRSs. Away from the projection origin the ellipsoidal height is not exactly orthogonal to
     * the projection plane and strictly the coordinate system is not Cartesian.
     */
    public const EPSG_AFFINE_3D_AXES_NORTHING_EASTING_ELLIPSOIDAL_HEIGHT_X_Y_H_ORIENTATIONS_NORTH_EAST_UP_UOM_M = 'urn:ogc:def:cs:EPSG::1046';

    protected static array $sridData = [
        'urn:ogc:def:cs:EPSG::1024' => [
            'name' => '2D Axes: easting, northing (M,P). Orientations east, north. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'east',
                    'abbreviation' => 'M',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'P',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::1025' => [
            'name' => '2D CS for south polar azimuthal lonO 140°E. Axes: X,Y. Orientations: X along 130°W, Y along 140°E meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 130°W',
                    'abbreviation' => 'X',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 140°E',
                    'abbreviation' => 'Y',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::1026' => [
            'name' => '2D CS for UPS north. Axes: E,N. Orientations: E along 90°E meridian, N along 180°E meridian. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'South along 90°E',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'South along 180°E',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::1027' => [
            'name' => '2D CS for UPS south. Axes: E,N. Orientations: E along 90°E, N along 0°E meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 90°E',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 0°E',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::1028' => [
            'name' => '2D Axes: easting, northing (E,N). Orientations: east, north. UoM: ydCl.',
            'axes' => [
                [
                    'orientation' => 'east',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9037',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9037',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::1029' => [
            'name' => '2D Axes: northing, easting (N,E). Orientations: north, east. UoM: ft.',
            'axes' => [
                [
                    'orientation' => 'north',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9002',
                ],
                [
                    'orientation' => 'east',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9002',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::1031' => [
            'name' => '2D Axes: northing, westing (Y,X). Orientations: north, west. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'north',
                    'abbreviation' => 'Y',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'west',
                    'abbreviation' => 'X',
                    'name' => 'Westing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::1035' => [
            'name' => '2D CS for north polar azimuthal lonO 90°E. Axes: X,Y. Orientations: X along 180°E, Y along 90°W meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'South along 180°E',
                    'abbreviation' => 'X',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'South along 90°W',
                    'abbreviation' => 'Y',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::1036' => [
            'name' => '2D CS for north polar azimuthal lonO 33°W. Axes: X,Y. Orientations: X along 57°E, Y along 147°E meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'South along 57°E',
                    'abbreviation' => 'X',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'South along 147°E',
                    'abbreviation' => 'Y',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::1037' => [
            'name' => '2D CS for north polar azimuthal lonO 18°E. Axes: X,Y. Orientations: X along 108°E, Y along 162°W meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'South along 108°E',
                    'abbreviation' => 'X',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'South along 162°W',
                    'abbreviation' => 'Y',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::1038' => [
            'name' => '2D CS for north polar azimuthal lonO 105°E. Axes: X,Y. Orientations: X along 165°W, Y along 75°W meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'South along 165°W',
                    'abbreviation' => 'X',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'South along 75°W',
                    'abbreviation' => 'Y',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::1039' => [
            'name' => '2D Axes: easting, northing (E,N). Orientations: east, north. UoM: ft.',
            'axes' => [
                [
                    'orientation' => 'east',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9002',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9002',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::1044' => [
            'name' => '2D CS for south polar azimuthal lonO 180°E. Axes: N,E. Orientations: N along 180°E, E along 90°W meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 180°E',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 90°W',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::1046' => [
            'name' => 'Affine 3D Axes: northing, easting, ellipsoidal height (X,Y,h). Orientations: north, east, up. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'north',
                    'abbreviation' => 'X',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'east',
                    'abbreviation' => 'Y',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'up',
                    'abbreviation' => 'h',
                    'name' => 'Ellipsoidal height',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4400' => [
            'name' => '2D Axes: easting, northing (E,N). Orientations: east, north. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'east',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4401' => [
            'name' => '2D Axes: easting, northing (E,N). Orientations: east, north. UoM: chBnB.',
            'axes' => [
                [
                    'orientation' => 'east',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9062',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9062',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4402' => [
            'name' => '2D Axes: easting, northing (E,N). Orientations: east, north. UoM: chSe.',
            'axes' => [
                [
                    'orientation' => 'east',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9042',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9042',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4403' => [
            'name' => '2D Axes: easting, northing (E,N). Orientations: east, north. UoM: ftCla.',
            'axes' => [
                [
                    'orientation' => 'east',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9005',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9005',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4404' => [
            'name' => '2D Axes: easting, northing (E,N). Orientations: east, north. UoM: ftGC.',
            'axes' => [
                [
                    'orientation' => 'east',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9094',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9094',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4405' => [
            'name' => '2D Axes: easting, northing (E,N). Orientations: east, north. UoM: ftSe.',
            'axes' => [
                [
                    'orientation' => 'east',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9041',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9041',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4406' => [
            'name' => '2D Axes: easting, northing (E,N). Orientations: east, north. UoM: km.',
            'axes' => [
                [
                    'orientation' => 'east',
                    'abbreviation' => 'X',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9036',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'Y',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9036',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4407' => [
            'name' => '2D Axes: easting, northing (E,N). Orientations: east, north. UoM: lkCla.',
            'axes' => [
                [
                    'orientation' => 'east',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9039',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9039',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4408' => [
            'name' => '2D Axes: easting, northing (E,N). Orientations: east, north. UoM: ydInd.',
            'axes' => [
                [
                    'orientation' => 'east',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9084',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9084',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4409' => [
            'name' => '2D Axes: easting, northing (E,N). Orientations: east, north. UoM: ydSe.',
            'axes' => [
                [
                    'orientation' => 'east',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9040',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9040',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4410' => [
            'name' => '2D Axes: easting, northing (E,N). Orientations: east, north. UoM: chSe(T).',
            'axes' => [
                [
                    'orientation' => 'east',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9301',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9301',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4463' => [
            'name' => '2D CS for north polar azimuthal lonO 10°E. Axes: X,Y. Orientations: X along 100°E, Y along 170°W meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'South along 100°E',
                    'abbreviation' => 'X',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'South along 170°W',
                    'abbreviation' => 'Y',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4464' => [
            'name' => '2D CS for north polar azimuthal lonO 180°E. Axes: X,Y. Orientations: X along 90°W, Y along 0°E meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'South along 90°W',
                    'abbreviation' => 'X',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'South along 0°E',
                    'abbreviation' => 'Y',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4465' => [
            'name' => '2D CS for north polar azimuthal lonO 40°W. Axes: X,Y. Orientations: X along 50°E, Y along 140°E meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'South along 50°E',
                    'abbreviation' => 'X',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'South along 140°E',
                    'abbreviation' => 'Y',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4466' => [
            'name' => '2D CS for north polar azimuthal lonO 100°W. Axes: X,Y. Orientations: X along 10°W, Y along 80°E meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'South along 10°W',
                    'abbreviation' => 'X',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'South along 80°E',
                    'abbreviation' => 'Y',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4467' => [
            'name' => '2D CS for north polar azimuthal lonO 150°W. Axes: X,Y. Orientations: X along 60°W, Y along 30°E meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'South along 60°W',
                    'abbreviation' => 'X',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'South along 30°E',
                    'abbreviation' => 'Y',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4468' => [
            'name' => '2D CS for north polar azimuthal lonO 45°W. Axes: X,Y. Orientations: X along 45°E, Y along 135°E meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'South along 45°E',
                    'abbreviation' => 'X',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'South along 135°E',
                    'abbreviation' => 'Y',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4469' => [
            'name' => '2D CS for north polar azimuthal lonO 0°E. Axes: X,Y. Orientations: X along 90°E, Y along 180°E meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'South along 90°E',
                    'abbreviation' => 'X',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'South along 180°E',
                    'abbreviation' => 'Y',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4470' => [
            'name' => '2D CS for south polar azimuthal lonO 0°E. Axes: X,Y. Orientations: X along 90°E, Y along 0°E meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 90°E',
                    'abbreviation' => 'X',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 0°E',
                    'abbreviation' => 'Y',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4471' => [
            'name' => '2D CS for south polar azimuthal lonO 165°W. Axes: E,N. Orientations: E along 75°W, N along 165°W meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 75°W',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 165°W',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4472' => [
            'name' => '2D CS for south polar azimuthal lonO 150°W. Axes: E,N. Orientations: E along 60°W, N along 150°W meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 60°W',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 150°W',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4473' => [
            'name' => '2D CS for south polar azimuthal lonO 135°W. Axes: E,N. Orientations: E along 45°W, N along 135°W meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 45°W',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 135°W',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4474' => [
            'name' => '2D CS for south polar azimuthal lonO 105°W. Axes: E,N. Orientations: E along 15°W, N along 105°W meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 15°W',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 105°W',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4475' => [
            'name' => '2D CS for south polar azimuthal lonO 90°W. Axes: E,N. Orientations: E along 0°E, N along 90°W meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 0°E',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 90°W',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4476' => [
            'name' => '2D CS for south polar azimuthal lonO 75°W. Axes: E,N. Orientations: E along 15°E, N along 75°W meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 15°E',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 75°W',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4477' => [
            'name' => '2D CS for south polar azimuthal lonO 45°W. Axes: E,N. Orientations: E along 45°E, N along 45°W meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 45°E',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 45°W',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4478' => [
            'name' => '2D CS for south polar azimuthal lonO 30°W. Axes: E,N. Orientations: E along 60°E, N along 30°W meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 60°E',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 30°W',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4479' => [
            'name' => '2D CS for south polar azimuthal lonO 15°W. Axes: E,N. Orientations: E along 75°E, N along 15°W meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 75°E',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 15°W',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4480' => [
            'name' => '2D CS for south polar azimuthal lonO 15°E. Axes: E,N. Orientations: E along 105°E, N along 15°E meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 105°E',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 15°E',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4481' => [
            'name' => '2D CS for south polar azimuthal lonO 30°E. Axes: E,N. Orientations: E along 120°E, N along 30°Emeridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 120°E',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 30°E',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4482' => [
            'name' => '2D CS for south polar azimuthal lonO 45°E. Axes: E,N. Orientations: E along 135°E, N along 45°E meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 135°E',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 45°E',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4483' => [
            'name' => '2D CS for south polar azimuthal lonO 75°E. Axes: E,N. Orientations: E along 165°E, N along 75°E meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 165°E',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 75°E',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4484' => [
            'name' => '2D CS for south polar azimuthal lonO 90°E. Axes: E,N. Orientations: E along 180°E, N along 90°E meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 180°E',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 90°E',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4485' => [
            'name' => '2D CS for south polar azimuthal lonO 105°E. Axes: E,N. Orientations: E along 165°W, N along 105°E meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 165°W',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 105°E',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4486' => [
            'name' => '2D CS for south polar azimuthal lonO 135°E. Axes: E,N. Orientations: E along 135°W, N along 135°E meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 135°W',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 135°E',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4487' => [
            'name' => '2D CS for south polar azimuthal lonO 150°E. Axes: E,N. Orientations: E along 120°W, N along 150°E meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 120°W',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 150°E',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4488' => [
            'name' => '2D CS for south polar azimuthal lonO 165°E. Axes: E,N. Orientations: E along 105°W, N along 165°E meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 105°W',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 165°E',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4489' => [
            'name' => '2D CS for south polar azimuthal lonO 70°E. Axes: E,N. Orientations: E along 160°E, N along 70°E meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 160°E',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 70°E',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4490' => [
            'name' => '2D CS for south polar azimuthal lonO 0°E. Axes: E,N. Orientations: E along 90°E, N along 0°E meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 90°E',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 0°E',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4491' => [
            'name' => '2D Axes: westing, northing (W,N). Orientations: west, north. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'west',
                    'abbreviation' => 'W',
                    'name' => 'Westing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4493' => [
            'name' => '2D CS for UPS north. Axes: N,E. Orientations: N along 180°E meridian, E along 90°E meridian. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'South along 180°E',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'South along 90°E',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4494' => [
            'name' => '2D CS for UPS south. Axes: N,E. Orientations: N along 0°E, E along 90°E meridians. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'North along 0°E',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'North along 90°E',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4495' => [
            'name' => '2D Axes: easting, northing (X,Y). Orientations: east, north. UoM: ft.',
            'axes' => [
                [
                    'orientation' => 'east',
                    'abbreviation' => 'X',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9002',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'Y',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9002',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4496' => [
            'name' => '2D Axes: easting, northing [E(X),N(Y)]. Orientations: east, north. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'east',
                    'abbreviation' => 'E(X)',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'N(Y)',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4497' => [
            'name' => '2D Axes: easting, northing (X,Y). Orientations: east, north. UoM: ftUS.',
            'axes' => [
                [
                    'orientation' => 'east',
                    'abbreviation' => 'X',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9003',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'Y',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9003',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4498' => [
            'name' => '2D Axes: easting, northing (Y,X). Orientations: east, north. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'east',
                    'abbreviation' => 'Y',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'X',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4499' => [
            'name' => '2D Axes: easting, northing (X,Y). Orientations: east, north. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'east',
                    'abbreviation' => 'X',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'Y',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4500' => [
            'name' => '2D Axes: northing, easting (N,E). Orientations: north, east. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'north',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'east',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4501' => [
            'name' => '2D Axes: northing, westing (N,E). Orientations: north, west. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'north',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'west',
                    'abbreviation' => 'E',
                    'name' => 'Westing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4502' => [
            'name' => '2D Axes: northing, easting (N,E). Orientations: north, east. UoM: ftCla.',
            'axes' => [
                [
                    'orientation' => 'north',
                    'abbreviation' => 'N',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9005',
                ],
                [
                    'orientation' => 'east',
                    'abbreviation' => 'E',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9005',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4530' => [
            'name' => '2D Axes: northing, easting (X,Y). Orientations: north, east. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'north',
                    'abbreviation' => 'X',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'east',
                    'abbreviation' => 'Y',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4531' => [
            'name' => '2D Axes: northing, easting (x,y). Orientations: north, east. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'north',
                    'abbreviation' => 'x',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'east',
                    'abbreviation' => 'y',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4532' => [
            'name' => '2D Axes: northing, easting (Y,X). Orientations: north, east. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'north',
                    'abbreviation' => 'Y',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'east',
                    'abbreviation' => 'X',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4533' => [
            'name' => '2D Axes: northing, easting (X,Y). Orientations: north, east. UoM: lk.',
            'axes' => [
                [
                    'orientation' => 'north',
                    'abbreviation' => 'X',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9098',
                ],
                [
                    'orientation' => 'east',
                    'abbreviation' => 'Y',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9098',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::4534' => [
            'name' => '2D Axes: northing, easting (no abbrev). Orientations: north, east. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'north',
                    'abbreviation' => 'none',
                    'name' => 'Northing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'east',
                    'abbreviation' => 'none',
                    'name' => 'Easting',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::6500' => [
            'name' => '3D CS (geocentric). Axes: geocentric X Y Z. Orientations: X and Y in equatorial plane, X positive through intersection with prime meridian, Y through 0°N 90°E. Z axis parallel to mean earth rotation axis and positive towards North Pole. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'geocentricX',
                    'abbreviation' => 'X',
                    'name' => 'Geocentric X',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'geocentricY',
                    'abbreviation' => 'Y',
                    'name' => 'Geocentric Y',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'geocentricZ',
                    'abbreviation' => 'Z',
                    'name' => 'Geocentric Z',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::6501' => [
            'name' => '2D Axes: southing, westing (X,Y). Orientations: south, west. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'south',
                    'abbreviation' => 'X',
                    'name' => 'Southing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'west',
                    'abbreviation' => 'Y',
                    'name' => 'Westing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::6502' => [
            'name' => '2D Axes: westing, southing (Y,X). Orientations: west, south. UoM: GLM.',
            'axes' => [
                [
                    'orientation' => 'west',
                    'abbreviation' => 'Y',
                    'name' => 'Westing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9031',
                ],
                [
                    'orientation' => 'south',
                    'abbreviation' => 'X',
                    'name' => 'Southing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9031',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::6503' => [
            'name' => '2D Axes: westing, southing (Y,X). Orientations: west, south. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'west',
                    'abbreviation' => 'Y',
                    'name' => 'Westing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'south',
                    'abbreviation' => 'X',
                    'name' => 'Southing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::6509' => [
            'name' => '2D Axes: southing, westing (P,M). Orientations: south, west. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'south',
                    'abbreviation' => 'P',
                    'name' => 'Southing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
                [
                    'orientation' => 'west',
                    'abbreviation' => 'M',
                    'name' => 'Westing',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
    ];

    private static array $cachedObjects = [];

    public static function fromSRID(string $srid): self
    {
        if (!isset(static::$sridData[$srid])) {
            throw new UnknownCoordinateSystemException($srid);
        }

        if (!isset(self::$cachedObjects[$srid])) {
            $data = static::$sridData[$srid];

            $axes = [];
            foreach ($data['axes'] as $axisData) {
                $axes[] = new Axis(
                    $axisData['orientation'],
                    $axisData['abbreviation'],
                    $axisData['name'],
                    $axisData['uom'],
                );
            }

            self::$cachedObjects[$srid] = new self($srid, $axes);
        }

        return self::$cachedObjects[$srid];
    }

    public static function getSupportedSRIDs(): array
    {
        $supported = [];
        foreach (static::$sridData as $srid => $data) {
            $supported[$srid] = $data['name'];
        }

        return $supported;
    }
}
