<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateSystem;

class Ellipsoidal extends CoordinateSystem
{
    /**
     * Ellipsoidal 3D CS. Axes: latitude, longitude, ellipsoidal height. Orientations: north, east, up. UoM: degree,
     * degree, metre.
     * Type: ellipsoidal
     * Horizontal coordinates referenced to this CS are in degrees. Any degree representation (e.g. DMSH, decimal,
     * etc.) may be used but that used must be declared for the user. Used in geographic 3D coordinate reference
     * systems.
     */
    public const EPSG_AXES_LATITUDE_LONGITUDE_ELLIPSOIDAL_HEIGHT_ORIENTATIONS_NORTH_EAST_UP_UOM_DEGREE_DEGREE_METRE = 6423;

    /**
     * Ellipsoidal 2D CS. Axes: latitude, longitude. Orientations: north, east. UoM: degree
     * Type: ellipsoidal
     * Coordinates referenced to this CS are in degrees. Any degree representation (e.g. DMSH, decimal, etc.) may be
     * used but that used must be declared for the user by the supplier of data. Used in geographic 2D coordinate
     * reference systems.
     */
    public const EPSG_AXES_LATITUDE_LONGITUDE_ORIENTATIONS_NORTH_EAST_UOM_DEGREE = 6422;

    /**
     * Ellipsoidal 2D CS. Axes: latitude, longitude. Orientations: north, east. UoM: grads.
     * Type: ellipsoidal
     * Used in geographic 2D coordinate reference systems.
     */
    public const EPSG_AXES_LATITUDE_LONGITUDE_ORIENTATIONS_NORTH_EAST_UOM_GRADS = 6403;

    /**
     * Ellipsoidal 3D CS. Axes: longitude, latitude, ellipsoidal height. Orientations: east, north, up. UoM: degree,
     * degree, metre.
     * Type: ellipsoidal
     * Used in some geographic 3D CRSs for web mapping. CS code 6423 recommended instead. Horizontal coordinates
     * referenced to this CS are in degrees. Any degree representation (e.g. DMSH, decimal, etc.) may be used but that
     * used must be declared for the user.
     */
    public const EPSG_AXES_LONGITUDE_LATITUDE_ELLIPSOIDAL_HEIGHT_ORIENTATIONS_EAST_NORTH_UP_UOM_DEGREE_DEGREE_METRE = 6426;

    /**
     * Ellipsoidal 2D CS. Axes: longitude, latitude. Orientations: east, north. UoM: degree
     * Type: ellipsoidal
     * Used in geog2D CRSs for some web mapping: CS code 6422 recommended. Coordinates referenced to this CS are in
     * degrees. Any degree representation (e.g. DMSH, decimal, etc.) may be used but that used must be declared for the
     * user by the supplier of data.
     */
    public const EPSG_AXES_LONGITUDE_LATITUDE_ORIENTATIONS_EAST_NORTH_UOM_DEGREE = 6424;
}