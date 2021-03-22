<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry;

use function count;
use function end;
use PHPCoord\CoordinateOperation\GeographicValue;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use function reset;

/**
 * @internal for now
 */
class GeographicPolygon
{
    protected array $vertices;

    protected bool $crossesAntimeridian;

    protected function __construct(array $vertices, bool $crossesAntimeridian)
    {
        $this->vertices = $vertices;
        $this->crossesAntimeridian = $crossesAntimeridian;

        if ($this->crossesAntimeridian) { //convert polygon to be antimeridian based
            foreach ($this->vertices as &$vertex) {
                $vertex[0] += 180;
                if ($vertex[0] > 180) {
                    $vertex[0] -= 360;
                }
            }
        }
    }

    /**
     * @param array<array<int,int>> $vertices [[long,lat], [long,lat]...]
     */
    public static function createFromArray(array $vertices, bool $crossesAntimeridian): self
    {
        return new self($vertices, $crossesAntimeridian);
    }

    public static function createWorld(): self
    {
        return new self([[-180, -90], [-180, 90], [180, 90], [180, -90]], false);
    }

    public function containsPoint(GeographicValue $point): bool
    {
        if ($this->crossesAntimeridian) {
            $longitude = $point->getLongitude()->add(new Degree(180));
            $point = new GeographicValue($point->getLatitude(), $longitude, $point->getHeight(), $point->getDatum());
        }

        /*
         * @see https://observablehq.com/@tmcw/understanding-point-in-polygon
         */
        $x = $point->getLongitude()->asDegrees()->getValue();
        $y = $point->getLatitude()->asDegrees()->getValue();

        $n = count($this->vertices);
        $inside = false;
        for ($i = 0, $j = $n - 1; $i < $n; $j = $i++) {
            $xi = $this->vertices[$i][0];
            $yi = $this->vertices[$i][1];
            $xj = $this->vertices[$j][0];
            $yj = $this->vertices[$j][1];

            $intersect = (($yi > $y) !== ($yj > $y)) // horizontal ray from $y, intersects if vertices are on opposite sides of it
                && ($x < ($xj - $xi) * ($y - $yi) / ($yj - $yi) + $xi);
            if ($intersect) {
                $inside = !$inside;
            }
        }

        return $inside;
    }

    /**
     * Calculate the "centre" of a polygon.
     * @return array<Angle,Angle>
     */
    public function getCentre(): array
    {
        $vertices = $this->vertices;
        if (end($vertices) !== reset($vertices)) {
            $vertices[] = $vertices[0]; // last coordinate === first coordinate
        }
        $n = count($vertices);
        $area = $this->getArea();
        $latitude = 0;
        $longitude = 0;

        for ($i = 0; $i < ($n - 1); ++$i) {
            $latitude += ($vertices[$i][1] + $vertices[$i + 1][1]) * ($vertices[$i][0] * $vertices[$i + 1][1] - $vertices[$i + 1][0] * $vertices[$i][1]);
            $longitude += ($vertices[$i][0] + $vertices[$i + 1][0]) * ($vertices[$i][0] * $vertices[$i + 1][1] - $vertices[$i + 1][0] * $vertices[$i][1]);
        }
        $latitude = new Degree($latitude / 6 / $area);
        $longitude = new Degree($longitude / 6 / $area);
        if ($this->crossesAntimeridian) {
            $longitude = $longitude->add(new Degree(180));
        }

        return [$latitude, $longitude];
    }

    public function getArea(): float
    {
        // Shoelace formula
        $area = 0;
        $n = count($this->vertices);

        for ($i = 0; $i < ($n - 1); ++$i) {
            $area += $this->vertices[$i][0] * $this->vertices[$i + 1][1];
        }
        $area += $this->vertices[$n - 1][0] * $this->vertices[0][1];

        for ($i = 0; $i < ($n - 1); ++$i) {
            $area -= $this->vertices[$i + 1][0] * $this->vertices[$i][1];
        }
        $area -= $this->vertices[0][0] * $this->vertices[$n - 1][1];

        return $area / 2;
    }
}
