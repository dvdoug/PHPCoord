<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateSystem;

use PHPCoord\Exception\UnknownCoordinateSystemException;

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
    public const EPSG_AXES_LATITUDE_LONGITUDE_ELLIPSOIDAL_HEIGHT_ORIENTATIONS_NORTH_EAST_UP_UOM_DEGREE_DEGREE_METRE = 'urn:ogc:def:cs:EPSG::6423';

    /**
     * Ellipsoidal 2D CS. Axes: latitude, longitude. Orientations: north, east. UoM: degree
     * Type: ellipsoidal
     * Coordinates referenced to this CS are in degrees. Any degree representation (e.g. DMSH, decimal, etc.) may be
     * used but that used must be declared for the user by the supplier of data. Used in geographic 2D coordinate
     * reference systems.
     */
    public const EPSG_AXES_LATITUDE_LONGITUDE_ORIENTATIONS_NORTH_EAST_UOM_DEGREE = 'urn:ogc:def:cs:EPSG::6422';

    /**
     * Ellipsoidal 2D CS. Axes: latitude, longitude. Orientations: north, east. UoM: grads.
     * Type: ellipsoidal
     * Used in geographic 2D coordinate reference systems.
     */
    public const EPSG_AXES_LATITUDE_LONGITUDE_ORIENTATIONS_NORTH_EAST_UOM_GRADS = 'urn:ogc:def:cs:EPSG::6403';

    /**
     * Ellipsoidal 3D CS. Axes: longitude, latitude, ellipsoidal height. Orientations: east, north, up. UoM: degree,
     * degree, metre.
     * Type: ellipsoidal
     * Used in some geographic 3D CRSs for web mapping. CS code 6423 recommended instead. Horizontal coordinates
     * referenced to this CS are in degrees. Any degree representation (e.g. DMSH, decimal, etc.) may be used but that
     * used must be declared for the user.
     */
    public const EPSG_AXES_LONGITUDE_LATITUDE_ELLIPSOIDAL_HEIGHT_ORIENTATIONS_EAST_NORTH_UP_UOM_DEGREE_DEGREE_METRE = 'urn:ogc:def:cs:EPSG::6426';

    /**
     * Ellipsoidal 2D CS. Axes: longitude, latitude. Orientations: east, north. UoM: degree
     * Type: ellipsoidal
     * Used in geog2D CRSs for some web mapping: CS code 6422 recommended. Coordinates referenced to this CS are in
     * degrees. Any degree representation (e.g. DMSH, decimal, etc.) may be used but that used must be declared for the
     * user by the supplier of data.
     */
    public const EPSG_AXES_LONGITUDE_LATITUDE_ORIENTATIONS_EAST_NORTH_UOM_DEGREE = 'urn:ogc:def:cs:EPSG::6424';

    protected static array $sridData = [
        'urn:ogc:def:cs:EPSG::6403' => [
            'name' => '. Axes: latitude, longitude. Orientations: north, east. UoM: grads.',
            'axes' => [
                [
                    'orientation' => 'north',
                    'abbreviation' => 'Lat',
                    'name' => 'Geodetic latitude',
                    'uom' => 'urn:ogc:def:uom:EPSG::9105',
                ],
                [
                    'orientation' => 'east',
                    'abbreviation' => 'Lon',
                    'name' => 'Geodetic longitude',
                    'uom' => 'urn:ogc:def:uom:EPSG::9105',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::6422' => [
            'name' => '. Axes: latitude, longitude. Orientations: north, east. UoM: degree',
            'axes' => [
                [
                    'orientation' => 'north',
                    'abbreviation' => 'Lat',
                    'name' => 'Geodetic latitude',
                    'uom' => 'urn:ogc:def:uom:EPSG::9122',
                ],
                [
                    'orientation' => 'east',
                    'abbreviation' => 'Lon',
                    'name' => 'Geodetic longitude',
                    'uom' => 'urn:ogc:def:uom:EPSG::9122',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::6423' => [
            'name' => '. Axes: latitude, longitude, ellipsoidal height. Orientations: north, east, up. UoM: degree, degree, metre.',
            'axes' => [
                [
                    'orientation' => 'north',
                    'abbreviation' => 'Lat',
                    'name' => 'Geodetic latitude',
                    'uom' => 'urn:ogc:def:uom:EPSG::9122',
                ],
                [
                    'orientation' => 'east',
                    'abbreviation' => 'Lon',
                    'name' => 'Geodetic longitude',
                    'uom' => 'urn:ogc:def:uom:EPSG::9122',
                ],
                [
                    'orientation' => 'up',
                    'abbreviation' => 'h',
                    'name' => 'Ellipsoidal height',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::6424' => [
            'name' => '. Axes: longitude, latitude. Orientations: east, north. UoM: degree',
            'axes' => [
                [
                    'orientation' => 'east',
                    'abbreviation' => 'Lon',
                    'name' => 'Geodetic longitude',
                    'uom' => 'urn:ogc:def:uom:EPSG::9122',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'Lat',
                    'name' => 'Geodetic latitude',
                    'uom' => 'urn:ogc:def:uom:EPSG::9122',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::6426' => [
            'name' => '. Axes: longitude, latitude, ellipsoidal height. Orientations: east, north, up. UoM: degree, degree, metre.',
            'axes' => [
                [
                    'orientation' => 'east',
                    'abbreviation' => 'Lon',
                    'name' => 'Geodetic longitude',
                    'uom' => 'urn:ogc:def:uom:EPSG::9122',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'Lat',
                    'name' => 'Geodetic latitude',
                    'uom' => 'urn:ogc:def:uom:EPSG::9122',
                ],
                [
                    'orientation' => 'up',
                    'abbreviation' => 'h',
                    'name' => 'Ellipsoidal height',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
    ];

    public static function fromSRID(string $srid): self
    {
        if (!isset(static::$sridData[$srid])) {
            throw new UnknownCoordinateSystemException($srid);
        }

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

        return new self($srid, $axes);
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
