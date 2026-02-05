<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateSystem;

use PHPCoord\Exception\UnknownCoordinateSystemException;

use function array_map;

class Ellipsoidal extends CoordinateSystem
{
    /**
     * 2D Axes: latitude, longitude. Orientations: north, east. Units: degree
     * Coordinates referenced to this CS are in degrees. Any degree representation (e.g. DMSH, decimal, etc.) may be
     * used but that used must be declared for the user by the supplier of data. Used in geographic 2D coordinate
     * reference systems.
     */
    public const EPSG_2D_AXES_LATITUDE_LONGITUDE_ORIENTATIONS_NORTH_EAST_UOM_DEGREE = 'urn:ogc:def:cs:EPSG::6422';

    /**
     * 2D Axes: latitude, longitude. Orientations: north, east. Units: grads.
     * Used in geographic 2D coordinate reference systems.
     */
    public const EPSG_2D_AXES_LATITUDE_LONGITUDE_ORIENTATIONS_NORTH_EAST_UOM_GRADS = 'urn:ogc:def:cs:EPSG::6403';

    /**
     * 2D Axes: longitude, latitude. Orientations: east, north. Units: degree
     * Used in geog2D CRSs for some web mapping: CS code 6422 recommended. Coordinates referenced to this CS are in
     * degrees. Any degree representation (e.g. DMSH, decimal, etc.) may be used but that used must be declared for the
     * user by the supplier of data.
     */
    public const EPSG_2D_AXES_LONGITUDE_LATITUDE_ORIENTATIONS_EAST_NORTH_UOM_DEGREE = 'urn:ogc:def:cs:EPSG::6424';

    /**
     * 3D Axes: latitude, longitude, ellipsoidal height. Orientations: north, east, up. Units: degree, degree, metre.
     * Horizontal coordinates referenced to this CS are in degrees. Any degree representation (e.g. DMSH, decimal,
     * etc.) may be used but that used must be declared for the user. Used in geographic 3D coordinate reference
     * systems.
     */
    public const EPSG_3D_AXES_LATITUDE_LONGITUDE_ELLIPSOIDAL_HEIGHT_ORIENTATIONS_NORTH_EAST_UP_UOM_DEGREE_DEGREE_METRE = 'urn:ogc:def:cs:EPSG::6423';

    /**
     * 3D Axes: longitude, latitude, ellipsoidal height. Orientations: east, north, up. Units: degree, degree, metre.
     * Used in some geographic 3D CRSs for web mapping. CS code 6423 recommended instead. Horizontal coordinates
     * referenced to this CS are in degrees. Any degree representation (e.g. DMSH, decimal, etc.) may be used but that
     * used must be declared for the user.
     */
    public const EPSG_3D_AXES_LONGITUDE_LATITUDE_ELLIPSOIDAL_HEIGHT_ORIENTATIONS_EAST_NORTH_UP_UOM_DEGREE_DEGREE_METRE = 'urn:ogc:def:cs:EPSG::6426';

    /**
     * @var array<string, array{name: string, axes: array<array{orientation: string, abbreviation: string, name: string, uom: string}>, help: string}>
     */
    protected static array $sridData = [
        'urn:ogc:def:cs:EPSG::6403' => [
            'name' => '2D Axes: latitude, longitude. Orientations: north, east. UoM: grads.',
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
            'help' => 'Used in geographic 2D coordinate reference systems.',
        ],
        'urn:ogc:def:cs:EPSG::6422' => [
            'name' => '2D Axes: latitude, longitude. Orientations: north, east. UoM: degree',
            'axes' => [
                [
                    'orientation' => 'north',
                    'abbreviation' => 'Lat',
                    'name' => 'Geodetic latitude',
                    'uom' => 'urn:ogc:def:uom:EPSG::9102',
                ],
                [
                    'orientation' => 'east',
                    'abbreviation' => 'Lon',
                    'name' => 'Geodetic longitude',
                    'uom' => 'urn:ogc:def:uom:EPSG::9102',
                ],
            ],
            'help' => 'Coordinates referenced to this CS are in degrees. Any degree representation (e.g. DMSH, decimal, etc.) may be used but that used must be declared for the user by the supplier of data. Used in geographic 2D coordinate reference systems.',
        ],
        'urn:ogc:def:cs:EPSG::6423' => [
            'name' => '3D Axes: latitude, longitude, ellipsoidal height. Orientations: north, east, up. UoM: degree, degree, metre.',
            'axes' => [
                [
                    'orientation' => 'north',
                    'abbreviation' => 'Lat',
                    'name' => 'Geodetic latitude',
                    'uom' => 'urn:ogc:def:uom:EPSG::9102',
                ],
                [
                    'orientation' => 'east',
                    'abbreviation' => 'Lon',
                    'name' => 'Geodetic longitude',
                    'uom' => 'urn:ogc:def:uom:EPSG::9102',
                ],
                [
                    'orientation' => 'up',
                    'abbreviation' => 'h',
                    'name' => 'Ellipsoidal height',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
            'help' => 'Horizontal coordinates referenced to this CS are in degrees. Any degree representation (e.g. DMSH, decimal, etc.) may be used but that used must be declared for the user. Used in geographic 3D coordinate reference systems.',
        ],
        'urn:ogc:def:cs:EPSG::6424' => [
            'name' => '2D Axes: longitude, latitude. Orientations: east, north. UoM: degree',
            'axes' => [
                [
                    'orientation' => 'east',
                    'abbreviation' => 'Lon',
                    'name' => 'Geodetic longitude',
                    'uom' => 'urn:ogc:def:uom:EPSG::9102',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'Lat',
                    'name' => 'Geodetic latitude',
                    'uom' => 'urn:ogc:def:uom:EPSG::9102',
                ],
            ],
            'help' => 'Used in geog2D CRSs for some web mapping: CS code 6422 recommended. Coordinates referenced to this CS are in degrees. Any degree representation (e.g. DMSH, decimal, etc.) may be used but that used must be declared for the user by the supplier of data.',
        ],
        'urn:ogc:def:cs:EPSG::6426' => [
            'name' => '3D Axes: longitude, latitude, ellipsoidal height. Orientations: east, north, up. UoM: degree, degree, metre.',
            'axes' => [
                [
                    'orientation' => 'east',
                    'abbreviation' => 'Lon',
                    'name' => 'Geodetic longitude',
                    'uom' => 'urn:ogc:def:uom:EPSG::9102',
                ],
                [
                    'orientation' => 'north',
                    'abbreviation' => 'Lat',
                    'name' => 'Geodetic latitude',
                    'uom' => 'urn:ogc:def:uom:EPSG::9102',
                ],
                [
                    'orientation' => 'up',
                    'abbreviation' => 'h',
                    'name' => 'Ellipsoidal height',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
            'help' => 'Used in some geographic 3D CRSs for web mapping. CS code 6423 recommended instead. Horizontal coordinates referenced to this CS are in degrees. Any degree representation (e.g. DMSH, decimal, etc.) may be used but that used must be declared for the user.',
        ],
    ];

    /**
     * @var array<string, self>
     */
    private static array $cachedObjects = [
    ];

    public static function fromSRID(string $srid): self
    {
        if (!isset(static::$sridData[$srid])) {
            throw new UnknownCoordinateSystemException($srid);
        }
        if (!isset(self::$cachedObjects[$srid])) {
            $data = static::$sridData[$srid];
            $axes = [
            ];
            foreach ($data['axes'] as $axisData) {
                $axes[] = new Axis($axisData['orientation'], $axisData['abbreviation'], $axisData['name'], $axisData['uom']);
            }
            self::$cachedObjects[$srid] = new self($srid, $axes);
        }

        return self::$cachedObjects[$srid];
    }

    /**
     * @return array<string, string>
     */
    public static function getSupportedSRIDs(): array
    {
        return array_map(static fn (array $data) => $data['name'], static::$sridData);
    }

    /**
     * @return array<string, array{name: string, help: string}>
     */
    public static function getSupportedSRIDsWithHelp(): array
    {
        return array_map(static fn (array $data) => [
            'name' => $data['name'],
            'help' => $data['help'],
        ], static::$sridData);
    }
}
