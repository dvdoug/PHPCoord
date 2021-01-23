<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateSystem;

use PHPCoord\Exception\UnknownCoordinateSystemException;

class Vertical extends CoordinateSystem
{
    /**
     * Vertical CS. Axis: depth (D). Orientation: down. UoM: ft.
     * Type: vertical
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_AXIS_DEPTH_D_ORIENTATION_DOWN_UOM_FT = 'urn:ogc:def:cs:EPSG::6495';

    /**
     * Vertical CS. Axis: depth (D). Orientation: down. UoM: ftUS.
     * Type: vertical
     * Used in US vertical coordinate reference systems.
     */
    public const EPSG_AXIS_DEPTH_D_ORIENTATION_DOWN_UOM_FTUS = 'urn:ogc:def:cs:EPSG::1043';

    /**
     * Vertical CS. Axis: depth (D). Orientation: down. UoM: m.
     * Type: vertical
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_AXIS_DEPTH_D_ORIENTATION_DOWN_UOM_M = 'urn:ogc:def:cs:EPSG::6498';

    /**
     * Vertical CS. Axis: height (H). Orientation: up. UoM: ft(Br36).
     * Type: vertical
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_AXIS_HEIGHT_H_ORIENTATION_UP_UOM_FT_BR36 = 'urn:ogc:def:cs:EPSG::6496';

    /**
     * Vertical CS. Axis: height (H). Orientation: up. UoM: ft.
     * Type: vertical
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_AXIS_HEIGHT_H_ORIENTATION_UP_UOM_FT = 'urn:ogc:def:cs:EPSG::1030';

    /**
     * Vertical CS. Axis: height (H). Orientation: up. UoM: ftUS.
     * Type: vertical
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_AXIS_HEIGHT_H_ORIENTATION_UP_UOM_FTUS = 'urn:ogc:def:cs:EPSG::6497';

    /**
     * Vertical CS. Axis: height (H). Orientation: up. UoM: m.
     * Type: vertical
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_AXIS_HEIGHT_H_ORIENTATION_UP_UOM_M = 'urn:ogc:def:cs:EPSG::6499';

    protected static array $sridData = [
        'urn:ogc:def:cs:EPSG::1030' => [
            'name' => '. Axis: height (H). Orientation: up. UoM: ft.',
            'axes' => [
                [
                    'orientation' => 'up',
                    'abbreviation' => 'H',
                    'name' => 'Gravity-related height',
                    'uom' => 'urn:ogc:def:uom:EPSG::9002',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::1043' => [
            'name' => '. Axis: depth (D). Orientation: down. UoM: ftUS.',
            'axes' => [
                [
                    'orientation' => 'down',
                    'abbreviation' => 'D',
                    'name' => 'Depth',
                    'uom' => 'urn:ogc:def:uom:EPSG::9003',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::6495' => [
            'name' => '. Axis: depth (D). Orientation: down. UoM: ft.',
            'axes' => [
                [
                    'orientation' => 'down',
                    'abbreviation' => 'D',
                    'name' => 'Depth',
                    'uom' => 'urn:ogc:def:uom:EPSG::9002',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::6496' => [
            'name' => '. Axis: height (H). Orientation: up. UoM: ft(Br36).',
            'axes' => [
                [
                    'orientation' => 'up',
                    'abbreviation' => 'H',
                    'name' => 'Gravity-related height',
                    'uom' => 'urn:ogc:def:uom:EPSG::9095',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::6497' => [
            'name' => '. Axis: height (H). Orientation: up. UoM: ftUS.',
            'axes' => [
                [
                    'orientation' => 'up',
                    'abbreviation' => 'H',
                    'name' => 'Gravity-related height',
                    'uom' => 'urn:ogc:def:uom:EPSG::9003',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::6498' => [
            'name' => '. Axis: depth (D). Orientation: down. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'down',
                    'abbreviation' => 'D',
                    'name' => 'Depth',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
        ],
        'urn:ogc:def:cs:EPSG::6499' => [
            'name' => '. Axis: height (H). Orientation: up. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'up',
                    'abbreviation' => 'H',
                    'name' => 'Gravity-related height',
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
