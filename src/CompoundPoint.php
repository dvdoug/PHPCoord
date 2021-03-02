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
use PHPCoord\CoordinateOperation\AutoConversion;
use PHPCoord\CoordinateOperation\ConvertiblePoint;
use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\Exception\UnknownConversionException;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Length\Length;

/**
 * Coordinate representing a point expressed in 2 different CRSs (2D horizontal + 1D Vertical).
 */
class CompoundPoint extends Point implements ConvertiblePoint
{
    use AutoConversion {
        convert as protected autoConvert;
    }

    /**
     * Horizontal point.
     * @var GeographicPoint|ProjectedPoint
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
     * @param GeographicPoint|ProjectedPoint $horizontalPoint
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
     * @param GeographicPoint|ProjectedPoint $horizontalPoint
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
        try {
            if ($to instanceof ConvertiblePoint) {
                $to = $to->convert($this->crs);
            }
        } finally {
            if ($to->getCRS()->getSRID() !== $this->crs->getSRID()) {
                throw new InvalidCoordinateReferenceSystemException('Can only calculate distances between two points in the same CRS');
            }

            /* @var CompoundPoint $to */
            return $this->horizontalPoint->calculateDistance($to->horizontalPoint);
        }
    }

    public function convert(CoordinateReferenceSystem $to, bool $ignoreBoundaryRestrictions = false): Point
    {
        try {
            return $this->autoConvert($to, $ignoreBoundaryRestrictions);
        } catch (UnknownConversionException $e) {
            if ($this->getHorizontalPoint() instanceof ConvertiblePoint) {
                // if 2D target, try again with just the horizontal component
                if (($to instanceof Geographic2D || $to instanceof Projected)) {
                    return $this->getHorizontalPoint()->convert($to, $ignoreBoundaryRestrictions);
                }

                // try separate horizontal + vertical conversions and stitch results together
                if ($to instanceof Compound) {
                    $newHorizontalPoint = $this->getHorizontalPoint()->convert($to->getHorizontal());

                    if ($this->getCRS()->getVertical()->getSRID() !== $to->getVertical()->getSRID()) {
                        $path = $this->findOperationPath($this->getCRS()->getVertical(), $to->getVertical(), $ignoreBoundaryRestrictions);

                        if ($path) {
                            $newVerticalPoint = $this->getVerticalPoint();
                            foreach ($path as $step) {
                                $target = CoordinateReferenceSystem::fromSRID($step['in_reverse'] ? $step['source_crs'] : $step['target_crs']);
                                $newVerticalPoint = $newVerticalPoint->performOperation($step['operation'], $target, $step['in_reverse'], ['horizontalPoint' => $newHorizontalPoint]);
                            }

                            return static::create($newHorizontalPoint, $newVerticalPoint, $to, $this->epoch);
                        }
                    }
                }
            }
            throw $e;
        }
    }

    public function __toString(): string
    {
        return "({$this->horizontalPoint}, {$this->verticalPoint})";
    }

    /**
     * Geographic2D with Height Offsets.
     * This transformation allows calculation of coordinates in the target system by adding the parameter value to the
     * coordinate values of the point in the source system.
     */
    public function geographic2DWithHeightOffsets(
        Geographic3D $to,
        Angle $latitudeOffset,
        Angle $longitudeOffset,
        Length $geoidUndulation
    ): GeographicPoint {
        $toLatitude = $this->getHorizontalPoint()->getLatitude()->add($latitudeOffset);
        $toLongitude = $this->getHorizontalPoint()->getLongitude()->add($longitudeOffset);
        $toHeight = $this->getVerticalPoint()->getHeight()->add($geoidUndulation);

        return GeographicPoint::create($toLatitude, $toLongitude, $toHeight, $to, $this->epoch);
    }
}
