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

class Vertical extends CoordinateSystem
{
    /**
     * Axis: depth (D). Orientation: down. Units: foot.
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_AXIS_DEPTH_D_ORIENTATION_DOWN_UOM_FT = 'urn:ogc:def:cs:EPSG::6495';

    /**
     * Axis: depth (D). Orientation: down. Units: foot (US).
     * Used in US vertical coordinate reference systems.
     */
    public const EPSG_AXIS_DEPTH_D_ORIENTATION_DOWN_UOM_FTUS = 'urn:ogc:def:cs:EPSG::1043';

    /**
     * Axis: depth (D). Orientation: down. Units: metre
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_AXIS_DEPTH_D_ORIENTATION_DOWN_UOM_M = 'urn:ogc:def:cs:EPSG::6498';

    /**
     * Axis: height (H). Orientation: up. Units: British foot (1936).
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_AXIS_HEIGHT_H_ORIENTATION_UP_UOM_FT_BR36 = 'urn:ogc:def:cs:EPSG::6496';

    /**
     * Axis: height (H). Orientation: up. Units: foot.
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_AXIS_HEIGHT_H_ORIENTATION_UP_UOM_FT = 'urn:ogc:def:cs:EPSG::1030';

    /**
     * Axis: height (H). Orientation: up. Units: foot (US).
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_AXIS_HEIGHT_H_ORIENTATION_UP_UOM_FTUS = 'urn:ogc:def:cs:EPSG::6497';

    /**
     * Axis: height (H). Orientation: up. Units: metre
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_AXIS_HEIGHT_H_ORIENTATION_UP_UOM_M = 'urn:ogc:def:cs:EPSG::6499';

    /**
     * @var array<string, array{name: string, axes: array<array{orientation: string, abbreviation: string, name: string, uom: string}>, help: string}>
     */
    protected static array $sridData = [
        'urn:ogc:def:cs:EPSG::1030' => [
            'name' => 'Axis: height (H). Orientation: up. UoM: ft.',
            'axes' => [
                [
                    'orientation' => 'up',
                    'abbreviation' => 'H',
                    'name' => 'Gravity-related height',
                    'uom' => 'urn:ogc:def:uom:EPSG::9002',
                ],
            ],
            'help' => 'Used in vertical coordinate reference systems.',
        ],
        'urn:ogc:def:cs:EPSG::1043' => [
            'name' => 'Axis: depth (D). Orientation: down. UoM: ftUS.',
            'axes' => [
                [
                    'orientation' => 'down',
                    'abbreviation' => 'D',
                    'name' => 'Depth',
                    'uom' => 'urn:ogc:def:uom:EPSG::9003',
                ],
            ],
            'help' => 'Used in US vertical coordinate reference systems.',
        ],
        'urn:ogc:def:cs:EPSG::6495' => [
            'name' => 'Axis: depth (D). Orientation: down. UoM: ft.',
            'axes' => [
                [
                    'orientation' => 'down',
                    'abbreviation' => 'D',
                    'name' => 'Depth',
                    'uom' => 'urn:ogc:def:uom:EPSG::9002',
                ],
            ],
            'help' => 'Used in vertical coordinate reference systems.',
        ],
        'urn:ogc:def:cs:EPSG::6496' => [
            'name' => 'Axis: height (H). Orientation: up. UoM: ft(Br36).',
            'axes' => [
                [
                    'orientation' => 'up',
                    'abbreviation' => 'H',
                    'name' => 'Gravity-related height',
                    'uom' => 'urn:ogc:def:uom:EPSG::9095',
                ],
            ],
            'help' => 'Used in vertical coordinate reference systems.',
        ],
        'urn:ogc:def:cs:EPSG::6497' => [
            'name' => 'Axis: height (H). Orientation: up. UoM: ftUS.',
            'axes' => [
                [
                    'orientation' => 'up',
                    'abbreviation' => 'H',
                    'name' => 'Gravity-related height',
                    'uom' => 'urn:ogc:def:uom:EPSG::9003',
                ],
            ],
            'help' => 'Used in vertical coordinate reference systems.',
        ],
        'urn:ogc:def:cs:EPSG::6498' => [
            'name' => 'Axis: depth (D). Orientation: down. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'down',
                    'abbreviation' => 'D',
                    'name' => 'Depth',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
            'help' => 'Used in vertical coordinate reference systems.',
        ],
        'urn:ogc:def:cs:EPSG::6499' => [
            'name' => 'Axis: height (H). Orientation: up. UoM: m.',
            'axes' => [
                [
                    'orientation' => 'up',
                    'abbreviation' => 'H',
                    'name' => 'Gravity-related height',
                    'uom' => 'urn:ogc:def:uom:EPSG::9001',
                ],
            ],
            'help' => 'Used in vertical coordinate reference systems.',
        ],
    ];

    /**
     * @var array<string, self>
     */
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

    /**
     * @return array<string, string>
     */
    public static function getSupportedSRIDs(): array
    {
        return array_map(fn (array $data) => $data['name'], static::$sridData);
    }

    /**
     * @return array<string, array{name: string, help: string}>
     */
    public static function getSupportedSRIDsWithHelp(): array
    {
        return array_map(fn (array $data) => ['name' => $data['name'], 'help' => $data['help']], static::$sridData);
    }
}
