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
use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\UnitOfMeasure\Length\Length;

/**
 * Coordinate representing a point expressed in 2 different CRSs (2D horizontal + 1D Vertical).
 */
class CompoundPoint extends Point
{
    /**
     * Horizontal point.
     * @var GeocentricPoint|GeographicPoint|ProjectedPoint
     */
    protected Point $horizontalPoint;

    /**
     * Vertical point.
     */
    protected VerticalPoint $verticalPoint;

    /**
     * Coordinate reference system.
     */
    protected Compound $crs;

    /**
     * Coordinate epoch (date for which the specified coordinates represented this point).
     */
    protected ?DateTimeImmutable $epoch;

    /**
     * Constructor.
     * @param GeocentricPoint|GeographicPoint|ProjectedPoint $horizontalPoint
     */
    protected function __construct(Point $horizontalPoint, VerticalPoint $verticalPoint, Compound $crs, ?DateTimeInterface $epoch = null)
    {
        $this->horizontalPoint = $horizontalPoint;
        $this->verticalPoint = $verticalPoint;
        $this->crs = $crs;

        if ($epoch instanceof DateTime) {
            $epoch = DateTimeImmutable::createFromMutable($epoch);
        }
        $this->epoch = $epoch;
    }

    /**
     * @param GeocentricPoint|GeographicPoint|ProjectedPoint $horizontalPoint
     */
    public static function create(Point $horizontalPoint, VerticalPoint $verticalPoint, Compound $crs, ?DateTimeInterface $epoch = null)
    {
        return new static($horizontalPoint, $verticalPoint, $crs, $epoch);
    }

    public function getHorizontalPoint(): Point
    {
        return $this->horizontalPoint;
    }

    public function getVerticalPoint(): VerticalPoint
    {
        return $this->verticalPoint;
    }

    public function getCRS(): Compound
    {
        return $this->crs;
    }

    public function getCoordinateEpoch(): ?DateTimeImmutable
    {
        return $this->epoch;
    }

    /**
     * Calculate distance between two points.
     */
    public function calculateDistance(Point $to): Length
    {
        if ($to->getCRS()->getSRID() !== $this->crs->getSRID()) {
            throw new InvalidCoordinateReferenceSystemException('Can only calculate distances between two points in the same CRS');
        }

        /* @var CompoundPoint $to */
        return $this->horizontalPoint->calculateDistance($to->horizontalPoint);
    }

    public function __toString(): string
    {
        return "({$this->horizontalPoint}, {$this->verticalPoint})";
    }
}
