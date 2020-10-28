<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateSystem;

use PHPCoord\EPSG\Repository;
use PHPCoord\Exception\UnknownCoordinateSystemException;

abstract class CoordinateSystem
{
    /**
     * Cartesian 2D CS for UPS north. Axes: E,N. Orientations: E along 90°E meridian, N along 180°E meridian. UoM: m.
     * Type: Cartesian
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_UPS_NORTH_AXES_E_N_ORIENTATIONS_E_ALONG_90_DEG_E_MERIDIAN_N_ALONG_180_DEG_E_MERIDIAN_UOM_M = 1026;

    /**
     * Cartesian 2D CS for UPS north. Axes: N,E. Orientations: N along 180°E meridian, E along 90°E meridian. UoM: m.
     * Type: Cartesian
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_UPS_NORTH_AXES_N_E_ORIENTATIONS_N_ALONG_180_DEG_E_MERIDIAN_E_ALONG_90_DEG_E_MERIDIAN_UOM_M = 4493;

    /**
     * Cartesian 2D CS for UPS south. Axes: E,N. Orientations: E along 90°E, N along 0°E meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_UPS_SOUTH_AXES_E_N_ORIENTATIONS_E_ALONG_90_DEG_E_N_ALONG_0_DEG_E_MERIDIANS_UOM_M = 1027;

    /**
     * Cartesian 2D CS for UPS south. Axes: N,E. Orientations: N along 0°E, E along 90°E meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_UPS_SOUTH_AXES_N_E_ORIENTATIONS_N_ALONG_0_DEG_E_E_ALONG_90_DEG_E_MERIDIANS_UOM_M = 4494;

    /**
     * Cartesian 2D CS for north polar azimuthal lonO 0°E. Axes: X,Y. Orientations: X along 90°E, Y along 180°E
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_NORTH_POLAR_AZIMUTHAL_LONO_0_DEG_E_AXES_X_Y_ORIENTATIONS_X_ALONG_90_DEG_E_Y_ALONG_180_DEG_E_MERIDIANS_UOM_M = 4469;

    /**
     * Cartesian 2D CS for north polar azimuthal lonO 100°W. Axes: X,Y. Orientations: X along 10°W, Y along 80°E
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_NORTH_POLAR_AZIMUTHAL_LONO_100_DEG_W_AXES_X_Y_ORIENTATIONS_X_ALONG_10_DEG_W_Y_ALONG_80_DEG_E_MERIDIANS_UOM_M = 4466;

    /**
     * Cartesian 2D CS for north polar azimuthal lonO 105°E. Axes: X,Y. Orientations: X along 165°W, Y along 75°W
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_NORTH_POLAR_AZIMUTHAL_LONO_105_DEG_E_AXES_X_Y_ORIENTATIONS_X_ALONG_165_DEG_W_Y_ALONG_75_DEG_W_MERIDIANS_UOM_M = 1038;

    /**
     * Cartesian 2D CS for north polar azimuthal lonO 10°E. Axes: X,Y. Orientations: X along 100°E, Y along 170°W
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_NORTH_POLAR_AZIMUTHAL_LONO_10_DEG_E_AXES_X_Y_ORIENTATIONS_X_ALONG_100_DEG_E_Y_ALONG_170_DEG_W_MERIDIANS_UOM_M = 4463;

    /**
     * Cartesian 2D CS for north polar azimuthal lonO 150°W. Axes: X,Y. Orientations: X along 60°W, Y along 30°E
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_NORTH_POLAR_AZIMUTHAL_LONO_150_DEG_W_AXES_X_Y_ORIENTATIONS_X_ALONG_60_DEG_W_Y_ALONG_30_DEG_E_MERIDIANS_UOM_M = 4467;

    /**
     * Cartesian 2D CS for north polar azimuthal lonO 180°E. Axes: X,Y. Orientations: X along 90°W, Y along 0°E
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_NORTH_POLAR_AZIMUTHAL_LONO_180_DEG_E_AXES_X_Y_ORIENTATIONS_X_ALONG_90_DEG_W_Y_ALONG_0_DEG_E_MERIDIANS_UOM_M = 4464;

    /**
     * Cartesian 2D CS for north polar azimuthal lonO 18°E. Axes: X,Y. Orientations: X along 108°E, Y along 162°W
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_NORTH_POLAR_AZIMUTHAL_LONO_18_DEG_E_AXES_X_Y_ORIENTATIONS_X_ALONG_108_DEG_E_Y_ALONG_162_DEG_W_MERIDIANS_UOM_M = 1037;

    /**
     * Cartesian 2D CS for north polar azimuthal lonO 33°W. Axes: X,Y. Orientations: X along 57°E, Y along 147°E
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_NORTH_POLAR_AZIMUTHAL_LONO_33_DEG_W_AXES_X_Y_ORIENTATIONS_X_ALONG_57_DEG_E_Y_ALONG_147_DEG_E_MERIDIANS_UOM_M = 1036;

    /**
     * Cartesian 2D CS for north polar azimuthal lonO 40°W. Axes: X,Y. Orientations: X along 50°E, Y along 140°E
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_NORTH_POLAR_AZIMUTHAL_LONO_40_DEG_W_AXES_X_Y_ORIENTATIONS_X_ALONG_50_DEG_E_Y_ALONG_140_DEG_E_MERIDIANS_UOM_M = 4465;

    /**
     * Cartesian 2D CS for north polar azimuthal lonO 45°W. Axes: X,Y. Orientations: X along 45°E, Y along 135°E
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_NORTH_POLAR_AZIMUTHAL_LONO_45_DEG_W_AXES_X_Y_ORIENTATIONS_X_ALONG_45_DEG_E_Y_ALONG_135_DEG_E_MERIDIANS_UOM_M = 4468;

    /**
     * Cartesian 2D CS for north polar azimuthal lonO 90°E. Axes: X,Y. Orientations: X along 180°E, Y along 90°W
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for North Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_NORTH_POLAR_AZIMUTHAL_LONO_90_DEG_E_AXES_X_Y_ORIENTATIONS_X_ALONG_180_DEG_E_Y_ALONG_90_DEG_W_MERIDIANS_UOM_M = 1035;

    /**
     * Cartesian 2D CS for south polar azimuthal lonO 0°E. Axes: E,N. Orientations: E along 90°E, N along 0°E
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_0_DEG_E_AXES_E_N_ORIENTATIONS_E_ALONG_90_DEG_E_N_ALONG_0_DEG_E_MERIDIANS_UOM_M = 4490;

    /**
     * Cartesian 2D CS for south polar azimuthal lonO 0°E. Axes: X,Y. Orientations: X along 90°E, Y along 0°E
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_0_DEG_E_AXES_X_Y_ORIENTATIONS_X_ALONG_90_DEG_E_Y_ALONG_0_DEG_E_MERIDIANS_UOM_M = 4470;

    /**
     * Cartesian 2D CS for south polar azimuthal lonO 105°E. Axes: E,N. Orientations: E along 165°W, N along 105°E
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_105_DEG_E_AXES_E_N_ORIENTATIONS_E_ALONG_165_DEG_W_N_ALONG_105_DEG_E_MERIDIANS_UOM_M = 4485;

    /**
     * Cartesian 2D CS for south polar azimuthal lonO 105°W. Axes: E,N. Orientations: E along 15°W, N along 105°W
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_105_DEG_W_AXES_E_N_ORIENTATIONS_E_ALONG_15_DEG_W_N_ALONG_105_DEG_W_MERIDIANS_UOM_M = 4474;

    /**
     * Cartesian 2D CS for south polar azimuthal lonO 135°E. Axes: E,N. Orientations: E along 135°W, N along 135°E
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_135_DEG_E_AXES_E_N_ORIENTATIONS_E_ALONG_135_DEG_W_N_ALONG_135_DEG_E_MERIDIANS_UOM_M = 4486;

    /**
     * Cartesian 2D CS for south polar azimuthal lonO 135°W. Axes: E,N. Orientations: E along 45°W, N along 135°W
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_135_DEG_W_AXES_E_N_ORIENTATIONS_E_ALONG_45_DEG_W_N_ALONG_135_DEG_W_MERIDIANS_UOM_M = 4473;

    /**
     * Cartesian 2D CS for south polar azimuthal lonO 140°E. Axes: X,Y. Orientations: X along 130°W, Y along 140°E
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_140_DEG_E_AXES_X_Y_ORIENTATIONS_X_ALONG_130_DEG_W_Y_ALONG_140_DEG_E_MERIDIANS_UOM_M = 1025;

    /**
     * Cartesian 2D CS for south polar azimuthal lonO 150°E. Axes: E,N. Orientations: E along 120°W, N along 150°E
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_150_DEG_E_AXES_E_N_ORIENTATIONS_E_ALONG_120_DEG_W_N_ALONG_150_DEG_E_MERIDIANS_UOM_M = 4487;

    /**
     * Cartesian 2D CS for south polar azimuthal lonO 150°W. Axes: E,N. Orientations: E along 60°W, N along 150°W
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_150_DEG_W_AXES_E_N_ORIENTATIONS_E_ALONG_60_DEG_W_N_ALONG_150_DEG_W_MERIDIANS_UOM_M = 4472;

    /**
     * Cartesian 2D CS for south polar azimuthal lonO 15°E. Axes: E,N. Orientations: E along 105°E, N along 15°E
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_15_DEG_E_AXES_E_N_ORIENTATIONS_E_ALONG_105_DEG_E_N_ALONG_15_DEG_E_MERIDIANS_UOM_M = 4480;

    /**
     * Cartesian 2D CS for south polar azimuthal lonO 15°W. Axes: E,N. Orientations: E along 75°E, N along 15°W
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_15_DEG_W_AXES_E_N_ORIENTATIONS_E_ALONG_75_DEG_E_N_ALONG_15_DEG_W_MERIDIANS_UOM_M = 4479;

    /**
     * Cartesian 2D CS for south polar azimuthal lonO 165°E. Axes: E,N. Orientations: E along 105°W, N along 165°E
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_165_DEG_E_AXES_E_N_ORIENTATIONS_E_ALONG_105_DEG_W_N_ALONG_165_DEG_E_MERIDIANS_UOM_M = 4488;

    /**
     * Cartesian 2D CS for south polar azimuthal lonO 165°W. Axes: E,N. Orientations: E along 75°W, N along 165°W
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_165_DEG_W_AXES_E_N_ORIENTATIONS_E_ALONG_75_DEG_W_N_ALONG_165_DEG_W_MERIDIANS_UOM_M = 4471;

    /**
     * Cartesian 2D CS for south polar azimuthal lonO 180°E. Axes: N,E. Orientations: N along 180°E, E along 90°W
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_180_DEG_E_AXES_N_E_ORIENTATIONS_N_ALONG_180_DEG_E_E_ALONG_90_DEG_W_MERIDIANS_UOM_M = 1044;

    /**
     * Cartesian 2D CS for south polar azimuthal lonO 30°E. Axes: E,N. Orientations: E along 120°E, N along
     * 30°Emeridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_30_DEG_E_AXES_E_N_ORIENTATIONS_E_ALONG_120_DEG_E_N_ALONG_30_DEG_EMERIDIANS_UOM_M = 4481;

    /**
     * Cartesian 2D CS for south polar azimuthal lonO 30°W. Axes: E,N. Orientations: E along 60°E, N along 30°W
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_30_DEG_W_AXES_E_N_ORIENTATIONS_E_ALONG_60_DEG_E_N_ALONG_30_DEG_W_MERIDIANS_UOM_M = 4478;

    /**
     * Cartesian 2D CS for south polar azimuthal lonO 45°E. Axes: E,N. Orientations: E along 135°E, N along 45°E
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_45_DEG_E_AXES_E_N_ORIENTATIONS_E_ALONG_135_DEG_E_N_ALONG_45_DEG_E_MERIDIANS_UOM_M = 4482;

    /**
     * Cartesian 2D CS for south polar azimuthal lonO 45°W. Axes: E,N. Orientations: E along 45°E, N along 45°W
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_45_DEG_W_AXES_E_N_ORIENTATIONS_E_ALONG_45_DEG_E_N_ALONG_45_DEG_W_MERIDIANS_UOM_M = 4477;

    /**
     * Cartesian 2D CS for south polar azimuthal lonO 70°E. Axes: E,N. Orientations: E along 160°E, N along 70°E
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_70_DEG_E_AXES_E_N_ORIENTATIONS_E_ALONG_160_DEG_E_N_ALONG_70_DEG_E_MERIDIANS_UOM_M = 4489;

    /**
     * Cartesian 2D CS for south polar azimuthal lonO 75°E. Axes: E,N. Orientations: E along 165°E, N along 75°E
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_75_DEG_E_AXES_E_N_ORIENTATIONS_E_ALONG_165_DEG_E_N_ALONG_75_DEG_E_MERIDIANS_UOM_M = 4483;

    /**
     * Cartesian 2D CS for south polar azimuthal lonO 75°W. Axes: E,N. Orientations: E along 15°E, N along 75°W
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_75_DEG_W_AXES_E_N_ORIENTATIONS_E_ALONG_15_DEG_E_N_ALONG_75_DEG_W_MERIDIANS_UOM_M = 4476;

    /**
     * Cartesian 2D CS for south polar azimuthal lonO 90°E. Axes: E,N. Orientations: E along 180°E, N along 90°E
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_90_DEG_E_AXES_E_N_ORIENTATIONS_E_ALONG_180_DEG_E_N_ALONG_90_DEG_E_MERIDIANS_UOM_M = 4484;

    /**
     * Cartesian 2D CS for south polar azimuthal lonO 90°W. Axes: E,N. Orientations: E along 0°E, N along 90°W
     * meridians. UoM: m.
     * Type: Cartesian
     * Used for South Pole tangential and secant projections.
     */
    public const EPSG_CARTESIAN_2D_CS_FOR_SOUTH_POLAR_AZIMUTHAL_LONO_90_DEG_W_AXES_E_N_ORIENTATIONS_E_ALONG_0_DEG_E_N_ALONG_90_DEG_W_MERIDIANS_UOM_M = 4475;

    /**
     * Cartesian 2D CS. Axes: easting, northing (E,N). Orientations: east, north. UoM: chBnB.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_CHBNB = 4401;

    /**
     * Cartesian 2D CS. Axes: easting, northing (E,N). Orientations: east, north. UoM: chSe(T).
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_CHSE_T = 4410;

    /**
     * Cartesian 2D CS. Axes: easting, northing (E,N). Orientations: east, north. UoM: chSe.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_CHSE = 4402;

    /**
     * Cartesian 2D CS. Axes: easting, northing (E,N). Orientations: east, north. UoM: ft.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_FT = 1039;

    /**
     * Cartesian 2D CS. Axes: easting, northing (E,N). Orientations: east, north. UoM: ftCla.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_FTCLA = 4403;

    /**
     * Cartesian 2D CS. Axes: easting, northing (E,N). Orientations: east, north. UoM: ftGC.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_FTGC = 4404;

    /**
     * Cartesian 2D CS. Axes: easting, northing (E,N). Orientations: east, north. UoM: ftSe.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_FTSE = 4405;

    /**
     * Cartesian 2D CS. Axes: easting, northing (E,N). Orientations: east, north. UoM: km.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_KM = 4406;

    /**
     * Cartesian 2D CS. Axes: easting, northing (E,N). Orientations: east, north. UoM: lkCla.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_LKCLA = 4407;

    /**
     * Cartesian 2D CS. Axes: easting, northing (E,N). Orientations: east, north. UoM: m.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_M = 4400;

    /**
     * Cartesian 2D CS. Axes: easting, northing (E,N). Orientations: east, north. UoM: ydCl.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_YDCL = 1028;

    /**
     * Cartesian 2D CS. Axes: easting, northing (E,N). Orientations: east, north. UoM: ydInd.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_YDIND = 4408;

    /**
     * Cartesian 2D CS. Axes: easting, northing (E,N). Orientations: east, north. UoM: ydSe.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_YDSE = 4409;

    /**
     * Cartesian 2D CS. Axes: easting, northing (M,P). Orientations east, north. UoM m.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems in Portuguese territories.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_EASTING_NORTHING_M_P_ORIENTATIONS_EAST_NORTH_UOM_M = 1024;

    /**
     * Cartesian 2D CS. Axes: easting, northing (X,Y). Orientations: east, north. UoM: ft.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_EASTING_NORTHING_X_Y_ORIENTATIONS_EAST_NORTH_UOM_FT = 4495;

    /**
     * Cartesian 2D CS. Axes: easting, northing (X,Y). Orientations: east, north. UoM: ftUS.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_EASTING_NORTHING_X_Y_ORIENTATIONS_EAST_NORTH_UOM_FTUS = 4497;

    /**
     * Cartesian 2D CS. Axes: easting, northing (X,Y). Orientations: east, north. UoM: m.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_EASTING_NORTHING_X_Y_ORIENTATIONS_EAST_NORTH_UOM_M = 4499;

    /**
     * Cartesian 2D CS. Axes: easting, northing (Y,X). Orientations: east, north. UoM: m.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_EASTING_NORTHING_Y_X_ORIENTATIONS_EAST_NORTH_UOM_M = 4498;

    /**
     * Cartesian 2D CS. Axes: easting, northing [E(X),N(Y)]. Orientations: east, north. UoM: m.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_EASTING_NORTHING_E_X_N_Y_ORIENTATIONS_EAST_NORTH_UOM_M = 4496;

    /**
     * Cartesian 2D CS. Axes: northing, easting (N,E). Orientations: north, east. UoM: ft.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_NORTHING_EASTING_N_E_ORIENTATIONS_NORTH_EAST_UOM_FT = 1029;

    /**
     * Cartesian 2D CS. Axes: northing, easting (N,E). Orientations: north, east. UoM: ftCla.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_NORTHING_EASTING_N_E_ORIENTATIONS_NORTH_EAST_UOM_FTCLA = 4502;

    /**
     * Cartesian 2D CS. Axes: northing, easting (N,E). Orientations: north, east. UoM: m.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_NORTHING_EASTING_N_E_ORIENTATIONS_NORTH_EAST_UOM_M = 4500;

    /**
     * Cartesian 2D CS. Axes: northing, easting (X,Y). Orientations: north, east. UoM: lk.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_NORTHING_EASTING_X_Y_ORIENTATIONS_NORTH_EAST_UOM_LK = 4533;

    /**
     * Cartesian 2D CS. Axes: northing, easting (X,Y). Orientations: north, east. UoM: m.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_NORTHING_EASTING_X_Y_ORIENTATIONS_NORTH_EAST_UOM_M = 4530;

    /**
     * Cartesian 2D CS. Axes: northing, easting (Y,X). Orientations: north, east. UoM: m.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_NORTHING_EASTING_Y_X_ORIENTATIONS_NORTH_EAST_UOM_M = 4532;

    /**
     * Cartesian 2D CS. Axes: northing, easting (no abbrev). Orientations: north, east. UoM: m.
     * Type: Cartesian
     * Used in projected coordinate reference systems for nautical charting.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_NORTHING_EASTING_NO_ABBREV_ORIENTATIONS_NORTH_EAST_UOM_M = 4534;

    /**
     * Cartesian 2D CS. Axes: northing, easting (x,y). Orientations: north, east. UoM: m.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_NORTHING_EASTING_X_Y_ORIENTATIONS_NORTH_EAST_UOM_M_LOWERCASE = 4531;

    /**
     * Cartesian 2D CS. Axes: northing, westing (N,E). Orientations: north, west. UoM: m.
     * Type: Cartesian
     * Used in Danish projected coordinate reference systems. Note that second axis has abbreviation E but is positive
     * west.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_NORTHING_WESTING_N_E_ORIENTATIONS_NORTH_WEST_UOM_M = 4501;

    /**
     * Cartesian 2D CS. Axes: northing, westing (Y,X). Orientations: north, west. UoM: m.
     * Type: Cartesian
     * Used in Danish projected coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_NORTHING_WESTING_Y_X_ORIENTATIONS_NORTH_WEST_UOM_M = 1031;

    /**
     * Cartesian 2D CS. Axes: southing, westing (P,M). Orientations: south, west. UoM: m.
     * Type: Cartesian
     * Used in old projected coordinate reference systems in Portugal.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_SOUTHING_WESTING_P_M_ORIENTATIONS_SOUTH_WEST_UOM_M = 6509;

    /**
     * Cartesian 2D CS. Axes: southing, westing (X,Y). Orientations: south, west. UoM: m.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_SOUTHING_WESTING_X_Y_ORIENTATIONS_SOUTH_WEST_UOM_M = 6501;

    /**
     * Cartesian 2D CS. Axes: westing, northing (W,N). Orientations: west, north. UoM: m.
     * Type: Cartesian
     * Used in old Danish coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_WESTING_NORTHING_W_N_ORIENTATIONS_WEST_NORTH_UOM_M = 4491;

    /**
     * Cartesian 2D CS. Axes: westing, southing (Y,X). Orientations: west, south. UoM: GLM.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_WESTING_SOUTHING_Y_X_ORIENTATIONS_WEST_SOUTH_UOM_GLM = 6502;

    /**
     * Cartesian 2D CS. Axes: westing, southing (Y,X). Orientations: west, south. UoM: m.
     * Type: Cartesian
     * Used in projected and engineering coordinate reference systems.
     */
    public const EPSG_CARTESIAN_2D_CS_AXES_WESTING_SOUTHING_Y_X_ORIENTATIONS_WEST_SOUTH_UOM_M = 6503;

    /**
     * Cartesian 3D CS (geocentric). Axes: geocentric X Y Z. Orientations: X and Y in equatorial plane, X positive
     * through intersection with prime meridian, Y through 0°N 90°E. Z axis parallel to mean earth rotation axis and
     * positive towards North Pole. UoM: m.
     * Type: Cartesian
     * Earth-centred, Earth-fixed (ECEF) right-handed Cartesian 3D CS, used in geocentric coordinate reference systems.
     */
    public const EPSG_CARTESIAN_3D_CS_GEOCENTRIC_AXES_GEOCENTRIC_X_Y_Z_ORIENTATIONS_X_AND_Y_IN_EQUATORIAL_PLANE_X_POSITIVE_THROUGH_INTERSECTION_WITH_PRIME_MERIDIAN_Y_THROUGH_0_DEG_N_90_DEG_E_Z_AXIS_PARALLEL_TO_MEAN_EARTH_ROTATION_AXIS_AND_POSITIVE_TOWARDS_NORTH_POLE_UOM_M = 6500;

    /**
     * Ellipsoidal 2D CS. Axes: latitude, longitude. Orientations: north, east. UoM: degree
     * Type: ellipsoidal
     * Coordinates referenced to this CS are in degrees. Any degree representation (e.g. DMSH, decimal, etc.) may be
     * used but that used must be declared for the user by the supplier of data. Used in geographic 2D coordinate
     * reference systems.
     */
    public const EPSG_ELLIPSOIDAL_2D_CS_AXES_LATITUDE_LONGITUDE_ORIENTATIONS_NORTH_EAST_UOM_DEGREE = 6422;

    /**
     * Ellipsoidal 2D CS. Axes: latitude, longitude. Orientations: north, east. UoM: grads.
     * Type: ellipsoidal
     * Used in geographic 2D coordinate reference systems.
     */
    public const EPSG_ELLIPSOIDAL_2D_CS_AXES_LATITUDE_LONGITUDE_ORIENTATIONS_NORTH_EAST_UOM_GRADS = 6403;

    /**
     * Ellipsoidal 2D CS. Axes: longitude, latitude. Orientations: east, north. UoM: degree
     * Type: ellipsoidal
     * Used in geog2D CRSs for some web mapping: CS code 6422 recommended. Coordinates referenced to this CS are in
     * degrees. Any degree representation (e.g. DMSH, decimal, etc.) may be used but that used must be declared for the
     * user by the supplier of data.
     */
    public const EPSG_ELLIPSOIDAL_2D_CS_AXES_LONGITUDE_LATITUDE_ORIENTATIONS_EAST_NORTH_UOM_DEGREE = 6424;

    /**
     * Ellipsoidal 3D CS. Axes: latitude, longitude, ellipsoidal height. Orientations: north, east, up. UoM: degree,
     * degree, metre.
     * Type: ellipsoidal
     * Horizontal coordinates referenced to this CS are in degrees. Any degree representation (e.g. DMSH, decimal,
     * etc.) may be used but that used must be declared for the user. Used in geographic 3D coordinate reference
     * systems.
     */
    public const EPSG_ELLIPSOIDAL_3D_CS_AXES_LATITUDE_LONGITUDE_ELLIPSOIDAL_HEIGHT_ORIENTATIONS_NORTH_EAST_UP_UOM_DEGREE_DEGREE_METRE = 6423;

    /**
     * Ellipsoidal 3D CS. Axes: longitude, latitude, ellipsoidal height. Orientations: east, north, up. UoM: degree,
     * degree, metre.
     * Type: ellipsoidal
     * Used in some geographic 3D CRSs for web mapping. CS code 6423 recommended instead. Horizontal coordinates
     * referenced to this CS are in degrees. Any degree representation (e.g. DMSH, decimal, etc.) may be used but that
     * used must be declared for the user.
     */
    public const EPSG_ELLIPSOIDAL_3D_CS_AXES_LONGITUDE_LATITUDE_ELLIPSOIDAL_HEIGHT_ORIENTATIONS_EAST_NORTH_UP_UOM_DEGREE_DEGREE_METRE = 6426;

    /**
     * Vertical CS. Axis: depth (D). Orientation: down. UoM: ft.
     * Type: vertical
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_VERTICAL_CS_AXIS_DEPTH_D_ORIENTATION_DOWN_UOM_FT = 6495;

    /**
     * Vertical CS. Axis: depth (D). Orientation: down. UoM: ftUS.
     * Type: vertical
     * Used in US vertical coordinate reference systems.
     */
    public const EPSG_VERTICAL_CS_AXIS_DEPTH_D_ORIENTATION_DOWN_UOM_FTUS = 1043;

    /**
     * Vertical CS. Axis: depth (D). Orientation: down. UoM: m.
     * Type: vertical
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_VERTICAL_CS_AXIS_DEPTH_D_ORIENTATION_DOWN_UOM_M = 6498;

    /**
     * Vertical CS. Axis: height (H). Orientation: up. UoM: ft(Br36).
     * Type: vertical
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_VERTICAL_CS_AXIS_HEIGHT_H_ORIENTATION_UP_UOM_FT_BR36 = 6496;

    /**
     * Vertical CS. Axis: height (H). Orientation: up. UoM: ft.
     * Type: vertical
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_VERTICAL_CS_AXIS_HEIGHT_H_ORIENTATION_UP_UOM_FT = 1030;

    /**
     * Vertical CS. Axis: height (H). Orientation: up. UoM: ftUS.
     * Type: vertical
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_VERTICAL_CS_AXIS_HEIGHT_H_ORIENTATION_UP_UOM_FTUS = 6497;

    /**
     * Vertical CS. Axis: height (H). Orientation: up. UoM: m.
     * Type: vertical
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_VERTICAL_CS_AXIS_HEIGHT_H_ORIENTATION_UP_UOM_M = 6499;

    public const CS_TYPE_CARTESIAN = 'Cartesian';

    public const CS_TYPE_ELLIPSOIDAL = 'ellipsoidal';

    public const CS_TYPE_ORDINAL = 'ordinal';

    public const CS_TYPE_SPHERICAL = 'spherical';

    public const CS_TYPE_VERTICAL = 'vertical';

    /**
     * @var int
     */
    protected $epsgCode;

    /**
     * @var Axis[]
     */
    protected $axes;

    /**
     * @var Repository
     */
    private static $repository;

    public static function fromEPSGCode(int $epsgCode): self
    {
        $repository = static::$repository ?? new Repository();
        $allData = $repository->getCoordinateSystems();

        if (!isset($allData[$epsgCode])) {
            throw new UnknownCoordinateSystemException($epsgCode);
        }

        $data = $allData[$epsgCode];

        $axes = [];
        foreach ($data['axes'] as $axisData) {
            $axes[$axisData['coord_axis_order']] = new Axis(
                $axisData['coord_axis_orientation'],
                $axisData['coord_axis_abbreviation'],
                $axisData['coord_axis_name'],
                $axisData['uom_code'],
            );
        }

        if ($data['coord_sys_type'] === self::CS_TYPE_CARTESIAN) {
            return new Cartesian($epsgCode, $axes);
        }

        if ($data['coord_sys_type'] === self::CS_TYPE_ELLIPSOIDAL) {
            return new Ellipsoidal($epsgCode, $axes);
        }

        if ($data['coord_sys_type'] === self::CS_TYPE_VERTICAL) {
            return new Vertical($epsgCode, $axes);
        }

        throw new UnknownCoordinateSystemException($epsgCode); // @codeCoverageIgnore
    }

    public function __construct(
        int $epsgCode,
        array $axes
    ) {
        $this->epsgCode = $epsgCode;
        $this->axes = $axes;
    }

    public function getEpsgCode(): int
    {
        return $this->epsgCode;
    }

    /**
     * @return Axis[]
     */
    public function getAxes(): array
    {
        return $this->axes;
    }
}
