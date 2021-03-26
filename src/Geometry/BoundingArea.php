<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry;

use function array_merge;
use function count;
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

    protected bool $longitudeExtendsFurtherThanMinus180 = false;

    protected bool $longitudeExtendsFurtherThanPlus180 = false;

    protected function __construct(array $vertices)
    {
        $this->vertices = $vertices;
        foreach ($this->vertices as $polygon) {
            foreach ($polygon as $ring) {
                foreach ($ring as $vertex) {
                    if ($vertex[0] > 180) {
                        $this->longitudeExtendsFurtherThanPlus180 = true;
                    }
                    if ($vertex[0] < -180) {
                        $this->longitudeExtendsFurtherThanMinus180 = true;
                    }
                }
            }
        }
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

    public function containsPoint(GeographicValue $point): bool
    {
        $pointsToCheck = [
            [
                $point->getLongitude()->asDegrees()->getValue(),
                $point->getLatitude()->asDegrees()->getValue(),
            ],
        ];

        if ($this->longitudeExtendsFurtherThanMinus180) {
            $pointsToCheck[] = [
                $point->getLongitude()->asDegrees()->getValue() - 360,
                $point->getLatitude()->asDegrees()->getValue(),
            ];
        }

        if ($this->longitudeExtendsFurtherThanPlus180) {
            $pointsToCheck[] = [
                $point->getLongitude()->asDegrees()->getValue() + 360,
                $point->getLatitude()->asDegrees()->getValue(),
            ];
        }

        /*
         * @see https://observablehq.com/@tmcw/understanding-point-in-polygon
         */
        foreach ($pointsToCheck as $pointToCheck) {
            [$x, $y] = $pointToCheck;
            foreach ($this->vertices as $polygon) {
                $vertices = [];
                foreach ($polygon as $ring) {
                    $vertices = array_merge($vertices, $ring);
                }

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
        // Calculates the "centre" (centroid) of a polygon.
        $vertices = $this->vertices[0][0]; // first polygon, outer ring
        $n = count($vertices);
        $area = 0;

        for ($i = 0; $i < ($n - 1); ++$i) {
            $area += $vertices[$i][0] * $vertices[$i + 1][1];
        }
        $area += $vertices[$n - 1][0] * $vertices[0][1];

        for ($i = 0; $i < ($n - 1); ++$i) {
            $area -= $vertices[$i + 1][0] * $vertices[$i][1];
        }
        $area -= $vertices[0][0] * $vertices[$n - 1][1];
        $area /= 2;

        $latitude = 0;
        $longitude = 0;

        for ($i = 0; $i < ($n - 1); ++$i) {
            $latitude += ($vertices[$i][1] + $vertices[$i + 1][1]) * ($vertices[$i][0] * $vertices[$i + 1][1] - $vertices[$i + 1][0] * $vertices[$i][1]);
            $longitude += ($vertices[$i][0] + $vertices[$i + 1][0]) * ($vertices[$i][0] * $vertices[$i + 1][1] - $vertices[$i + 1][0] * $vertices[$i][1]);
        }
        $latitude = new Degree($latitude / 6 / $area);
        $longitude = new Degree($longitude / 6 / $area);

        return [$latitude, $longitude];
    }
}
