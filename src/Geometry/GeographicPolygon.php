<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry;

use function count;
use InvalidArgumentException;
use function max;
use function min;
use PHPCoord\CoordinateOperation\GeographicValue;
use PHPCoord\UnitOfMeasure\Angle\Degree;

/**
 * @internal for now
 */
class GeographicPolygon
{
    protected $vertices;

    protected $crossesAntimeridian;

    protected function __construct(array $vertices, bool $crossesAntimeridian)
    {
        if (count($vertices) !== 4) {
            throw new InvalidArgumentException('A bounding box must have exactly 4 vertices (be rectangular)');
        }
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
     * @param array<Degree,Degree> $vertices [[long,lat], [long,lat]...]
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

        [$lon1, $lat1] = $this->vertices[0];
        [$lon2, $lat2] = $this->vertices[2];
        $west = min($lon1, $lon2);
        $east = max($lon1, $lon2);
        $south = min($lat1, $lat2);
        $north = max($lat1, $lat2);

        $latitude = $point->getLatitude()->asDegrees()->getValue();
        $longitude = $point->getLongitude()->asDegrees()->getValue();

        return $latitude <= $north && $latitude >= $south && $longitude >= $west && $longitude <= $east;
    }

    public function getCentre(): array
    {
        [$west, $south] = $this->vertices[0];
        [$east, $north] = $this->vertices[2];

        $latitude = new Degree(($north + $south) / 2);
        $longitude = new Degree(($west + $east) / 2);
        if ($this->crossesAntimeridian) {
            $longitude = $longitude->subtract(new Degree(180));
        }

        return [$latitude, $longitude];
    }
}
