<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

use PHPCoord\CoordinateSystem\Cartesian;
use PHPCoord\CoordinateSystem\CoordinateSystem;
use PHPCoord\Datum\Datum;
use PHPCoord\Exception\UnknownCoordinateReferenceSystemException;
use PHPCoord\Geometry\BoundingArea;

use function assert;
use function count;
use function array_map;

/**
 * @internal use all methods and constants directly from the Projected class e.g. Projected::EPSG_*, Projected::fromSRID()
 * This will be removed and folded back into the main class once support for PHP <8.2 is dropped
 */
class ProjectedBase extends CoordinateReferenceSystem
{
    use ProjectedSRIDData;

    protected Geographic2D|Geographic3D $baseCRS;

    protected ?string $derivingConversion;

    /**
     * @var array<string, Projected>
     */
    private static array $cachedObjects = [
    ];

    public function __construct(string $srid, CoordinateSystem $coordinateSystem, Datum $datum, BoundingArea $boundingArea, string $name = '', Geographic2D|Geographic3D|null $baseCRS = null, ?string $derivingConversion = null)
    {
        $this->srid = $srid;
        $this->coordinateSystem = $coordinateSystem;
        $this->datum = $datum;
        $this->boundingArea = $boundingArea;
        $this->name = $name;
        $this->baseCRS = $baseCRS ?? Geographic2D::fromSRID(Geographic2D::EPSG_WGS_84);
        $this->derivingConversion = $derivingConversion;
        assert(count($coordinateSystem->getAxes()) === 2 || count($coordinateSystem->getAxes()) === 3);
    }

    public function getBaseCRS(): Geographic2D|Geographic3D
    {
        return $this->baseCRS;
    }

    public function getDerivingConversion(): string
    {
        return $this->derivingConversion;
    }

    public static function fromSRID(string $srid): Projected
    {
        if (!isset(static::$sridData[$srid])) {
            throw new UnknownCoordinateReferenceSystemException($srid);
        }
        if (!isset(self::$cachedObjects[$srid])) {
            $data = static::$sridData[$srid];
            $baseCRS = Geographic::fromSRID($data['base_crs']);
            $extent = $data['extent'] instanceof BoundingArea ? $data['extent'] : BoundingArea::createFromExtentCodes($data['extent']);
            self::$cachedObjects[$srid] = new Projected($srid, Cartesian::fromSRID($data['coordinate_system']), $baseCRS->getDatum(), $extent, $data['name'], $baseCRS, $data['deriving_conversion']);
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
     * @return array<string, array{name: string, extent_description: string, help: string}>
     */
    public static function getSupportedSRIDsWithHelp(): array
    {
        return array_map(static fn (array $data) => [
            'name' => $data['name'],
            'extent_description' => $data['name'],
            'help' => $data['help'],
        ], static::$sridData);
    }

    public static function registerCustomCRS(string $srid, string $name, string $baseCRSSrid, string $derivingConversionSrid, string $coordinateSystemSrid, BoundingArea $extent, string $help = ''): void
    {
        self::$sridData[$srid] = [
            'name' => $name,
            'coordinate_system' => $coordinateSystemSrid,
            'base_crs' => $baseCRSSrid,
            'deriving_conversion' => $derivingConversionSrid,
            'extent' => $extent,
            'extent_description' => '',
            'help' => $help,
        ];
    }
}
