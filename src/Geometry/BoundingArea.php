<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry;

use function array_merge;
use function array_push;
use function class_exists;
use function count;
use function implode;
use PHPCoord\CoordinateOperation\GeographicValue;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Angle\Degree;

class BoundingArea
{
    /**
     * Vertices in GeoJSON-type format (an array of polygons, which is an array of rings which is an array of long,lat points).
     * @var array<array<array<array<float, float>>>
     */
    protected array $vertices;

    protected bool $longitudeWrapAroundChecked = false;

    protected bool $longitudeExtendsFurtherThanMinus180 = false;

    protected bool $longitudeExtendsFurtherThanPlus180 = false;

    private static array $cachedObjects = [];

    private array $pointInside = [];

    private array $centre = [];

    private const BUFFER_THRESHOLD = 200; // rough guess at where map maker got bored adding vertices for complex shapes

    /**
     * In v5, extents are buffered when exported (and with a better algorithm) and the runtime uses as-is
     * Here, in v4 the extents are "raw" from EPSG, and the buffering is done in-place. However, the algo is flawed
     * and doesn't work well for some country shapes where EPSG have actually drawn something that was already
     * detailed enough to not need buffering in the first place. Backporting the v5 changes is too complex, so just
     * keep a list of extents that are known-good.
     */
    private const EXTENTS_NOT_TO_BUFFER = [
        1305,
    ];

    private const BUFFER_SIZE = 0.1; // approx 10km

    protected function __construct(array $vertices)
    {
        $this->vertices = $vertices;
    }

    /**
     * @param array<array<array<array<float, float>>> $vertices [[[long,lat], [long,lat]...]]
     */
    public static function createFromArray(array $vertices): self
    {
        return new static($vertices);
    }

    public static function createWorld(): self
    {
        return new static([[[[-180, -90], [-180, 90], [180, 90], [180, -90], [-180, -90]]]]);
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
                array_push($extents, ...$extentClass());
            }

            $extentData = self::createFromArray($extents);
            if (!in_array($cacheKey, self::EXTENTS_NOT_TO_BUFFER)) {
                $extentData->addBuffer();
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
                $vertices = array_merge(...$polygon);

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
            $this->pointInside = $this->getCentre(0); // any polygon will do, use the first
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

    /**
     * @internal
     */
    private function addBuffer(): void
    {
        foreach ($this->vertices as $polygonId => $polygon) {
            $centre = $this->getCentre($polygonId);
            $centreX = $centre[1]->asDegrees()->getValue();
            $centreY = $centre[0]->asDegrees()->getValue();
            foreach ($polygon as $ringId => $ring) {
                if ($ringId === 0 && count($ring) > self::BUFFER_THRESHOLD) {
                    foreach ($ring as $vertexId => $vertex) {
                        if ($vertex[0] > $centreX) {
                            $this->vertices[$polygonId][$ringId][$vertexId][0] += self::BUFFER_SIZE;
                        } elseif ($vertex[0] < $centreX) {
                            $this->vertices[$polygonId][$ringId][$vertexId][0] -= self::BUFFER_SIZE;
                        }

                        if ($vertex[1] > $centreY) {
                            $this->vertices[$polygonId][$ringId][$vertexId][1] += self::BUFFER_SIZE;
                        } elseif ($vertex[1] < $centreY) {
                            $this->vertices[$polygonId][$ringId][$vertexId][1] -= self::BUFFER_SIZE;
                        }
                    }
                }
            }
        }
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
