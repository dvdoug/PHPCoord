<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry;

use PHPCoord\CoordinateOperation\GeographicValue;
use PHPCoord\Datum\Datum;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Angle\Degree;

use function array_map;
use function array_unique;
use function assert;
use function class_exists;
use function count;
use function implode;
use function usort;
use function in_array;
use function array_keys;

class BoundingArea
{
    /**
     * @var array<array<array<array<float, float>>>
     */
    protected array $vertices;

    protected string $region;

    protected bool $longitudeWrapAroundChecked = false;

    protected bool $longitudeExtendsFurtherThanMinus180 = false;

    protected bool $longitudeExtendsFurtherThanPlus180 = false;

    private static array $cachedObjects = [];

    private array $pointInside = [];

    private array $centre = [];

    protected function __construct(array $vertices, string $region)
    {
        // put largest polygon (outer ring size) first
        usort($vertices, fn (array $polygonA, array $polygonB) => count($polygonB[0]) <=> count($polygonA[0]));
        $this->vertices = $vertices;
        $this->region = $region;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * Vertices in GeoJSON-type format (an array of polygons, which is an array of rings which is an array of long,lat points).
     * @param array<array<array<array<float, float>>> $vertices [[[long,lat], [long,lat]...]]
     * @param RegionMap::REGION_*
     */
    public static function createFromArray(array $vertices, string $region): self
    {
        return new static($vertices, $region);
    }

    public static function createWorld(): self
    {
        return new static([[[[-180, -90], [-180, 90], [180, 90], [180, -90], [-180, -90]]]], RegionMap::REGION_GLOBAL);
    }

    /**
     * @internal
     */
    public static function createFromExtentCodes(array $extentCodes): self
    {
        $cacheKey = implode('|', $extentCodes);
        if (!isset(self::$cachedObjects[$cacheKey])) {
            $extents = [];
            foreach ($extentCodes as $extentCode) {
                $fullExtent = "PHPCoord\\Geometry\\Extents\\Extent{$extentCode}";
                $basicExtent = "PHPCoord\\Geometry\\Extents\\BoundingBoxOnly\\Extent{$extentCode}";
                $extentClass = class_exists($fullExtent) ? new $fullExtent() : new $basicExtent();
                $extents = [...$extents, ...$extentClass()];
            }

            $regionMap = (new RegionMap())();
            $regions = array_unique(array_map(static fn ($extent) => $regionMap[$extent], $extentCodes));
            assert(count($regions) === 1);

            $extentData = self::createFromArray($extents, $regions[0]);

            if (in_array(1352, $extentCodes)) {
                $extentData->pointInside = [new Degree(60.202778), new Degree(11.083889)];
            }

            self::$cachedObjects[$cacheKey] = $extentData;
        }

        return self::$cachedObjects[$cacheKey];
    }

    public function containsPoint(GeographicValue $point): bool
    {
        if (!$this->longitudeWrapAroundChecked) {
            $this->longitudeWrapAroundChecked = true;
            $this->checkLongitudeWrapAround();
        }

        $latitude = $point->getLongitude()->asDegrees()->getValue();
        $longitude = $point->getLatitude()->asDegrees()->getValue();

        $pointsToCheck = [
            [
                $latitude,
                $longitude,
            ],
        ];

        if ($this->longitudeExtendsFurtherThanMinus180) {
            $pointsToCheck[] = [
                $latitude - 360,
                $longitude,
            ];
        }

        if ($this->longitudeExtendsFurtherThanPlus180) {
            $pointsToCheck[] = [
                $latitude + 360,
                $longitude,
            ];
        }

        /*
         * @see https://observablehq.com/@tmcw/understanding-point-in-polygon
         */
        foreach ($pointsToCheck as $pointToCheck) {
            [$x, $y] = $pointToCheck;
            foreach ($this->vertices as $polygon) {
                $vertices = $polygon[0]; // this algo works on simple polygons (no holes)

                $n = count($vertices);
                $inside = false;
                for ($i = 0, $j = $n - 1; $i < $n; $j = $i++) {
                    $xi = $vertices[$i][0];
                    $yi = $vertices[$i][1];
                    $xj = $vertices[$j][0];
                    $yj = $vertices[$j][1];

                    $intersect = (($yi > $y) !== ($yj > $y)) // horizontal ray from $y, intersects if vertices are on opposite sides of it
                        && ($x < ($xj - $xi) * ($y - $yi) / ($yj - $yi) + $xi);
                    if ($intersect) {
                        $inside = !$inside;
                    }
                }

                if ($inside) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @internal used for testing
     * @return array<Angle,Angle>
     */
    public function getPointInside(): array
    {
        if (!$this->pointInside) {
            foreach (array_keys($this->vertices) as $polygonId) {
                $point = $this->getCentre($polygonId);
                $this->pointInside = $point;
                if ($this->containsPoint(new GeographicValue($point[0], $point[1], null, Datum::fromSRID(Datum::EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE)))) {
                    $this->pointInside = $point;
                    break;
                }
            }
        }

        return $this->pointInside;
    }

    /**
     * @internal used for testing
     * @return array<Angle,Angle>
     */
    protected function getCentre(int $polygonId): array
    {
        if (!isset($this->centre[$polygonId])) {
            // Calculates the "centre" (centroid) of a polygon.
            $vertices = $this->vertices[$polygonId][0]; // only consider outer ring
            $n = count($vertices) - 1;
            $area = 0;

            for ($i = 0; $i < $n; ++$i) {
                $area += $vertices[$i][0] * $vertices[$i + 1][1];
            }
            $area += $vertices[$n][0] * $vertices[0][1];

            for ($i = 0; $i < $n; ++$i) {
                $area -= $vertices[$i + 1][0] * $vertices[$i][1];
            }
            $area -= $vertices[0][0] * $vertices[$n][1];
            $area /= 2;

            $latitude = 0;
            $longitude = 0;

            for ($i = 0; $i < $n; ++$i) {
                $latitude += ($vertices[$i][1] + $vertices[$i + 1][1]) * ($vertices[$i][0] * $vertices[$i + 1][1] - $vertices[$i + 1][0] * $vertices[$i][1]);
                $longitude += ($vertices[$i][0] + $vertices[$i + 1][0]) * ($vertices[$i][0] * $vertices[$i + 1][1] - $vertices[$i + 1][0] * $vertices[$i][1]);
            }
            $latitude = new Degree($latitude / 6 / $area);
            $longitude = new Degree($longitude / 6 / $area);

            $this->centre[$polygonId] = [$latitude, $longitude];
        }

        return $this->centre[$polygonId];
    }

    private function checkLongitudeWrapAround(): void
    {
        foreach ($this->vertices as $polygon) {
            foreach ($polygon as $ring) {
                foreach ($ring as $vertex) {
                    if ($vertex[0] >= 180) {
                        $this->longitudeExtendsFurtherThanPlus180 = true;
                    }
                    if ($vertex[0] <= -180) {
                        $this->longitudeExtendsFurtherThanMinus180 = true;
                    }
                }
            }
        }
    }
}
