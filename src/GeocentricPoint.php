<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use InvalidArgumentException;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateSystem\Axis;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/**
 * Coordinate representing a point in ECEF geocentric form.
 */
class GeocentricPoint extends Point
{
    /**
     * X co-ordinate.
     * @var Length
     */
    protected $x;

    /**
     * Y co-ordinate.
     * @var Length
     */
    protected $y;

    /**
     * Z co-ordinate.
     * @var Length
     */
    protected $z;

    /**
     * Coordinate reference system.
     * @var Geocentric
     */
    protected $crs;

    /**
     * Coordinate epoch (date for which the specified coordinates represented this point).
     * @var DateTimeImmutable
     */
    protected $epoch;

    protected function __construct(Length $x, Length $y, Length $z, Geocentric $crs, ?DateTimeInterface $epoch)
    {
        $this->crs = $crs;
        $this->x = UnitOfMeasureFactory::convertLength($x, $this->getAxisByName(Axis::GEOCENTRIC_X)->getUnitOfMeasureId());
        $this->y = UnitOfMeasureFactory::convertLength($y, $this->getAxisByName(Axis::GEOCENTRIC_Y)->getUnitOfMeasureId());
        $this->z = UnitOfMeasureFactory::convertLength($z, $this->getAxisByName(Axis::GEOCENTRIC_Z)->getUnitOfMeasureId());

        if ($epoch instanceof DateTime) {
            $epoch = DateTimeImmutable::createFromMutable($epoch);
        }
        if ($epoch) {
            $this->epoch = $epoch;
        }
    }

    /**
     * @param Length $x refer to CRS for preferred unit of measure, but any length unit accepted
     * @param Length $y refer to CRS for preferred unit of measure, but any length unit accepted
     * @param Length $z refer to CRS for preferred unit of measure, but any length unit accepted
     */
    public static function create(Length $x, Length $y, Length $z, Geocentric $crs, ?DateTimeInterface $epoch = null): self
    {
        return new static($x, $y, $z, $crs, $epoch);
    }

    public function getX(): Length
    {
        return $this->x;
    }

    public function getY(): Length
    {
        return $this->y;
    }

    public function getZ(): Length
    {
        return $this->z;
    }

    public function getCRS(): Geocentric
    {
        return $this->crs;
    }

    public function getCoordinateEpoch(): ?DateTimeImmutable
    {
        return $this->epoch;
    }

    /**
     * Calculate surface distance between two points.
     * Note: this implementation is currently not accurate over long distances, it is the straight line distance, not
     * the surface distance.
     */
    public function calculateDistance(Point $to): Length
    {
        if ($to->getCRS()->getEpsgCode() !== $this->crs->getEpsgCode()) {
            throw new InvalidArgumentException('Can only calculate distances between two points in the same CRS');
        }

        /* @var GeocentricPoint $to */
        return new Metre(
            sqrt(
                ($to->getX()->getValue() - $this->x->getValue()) ** 2 +
                ($to->getY()->getValue() - $this->y->getValue()) ** 2 +
                ($to->getZ()->getValue() - $this->z->getValue()) ** 2
            )
        );
    }

    public function __toString(): string
    {
        return "({$this->x}, {$this->y}, {$this->z})";
    }
}
