<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use function cos;
use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use PHPCoord\CoordinateOperation\AutoConversion;
use PHPCoord\CoordinateOperation\ConvertiblePoint;
use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use function sin;
use function sqrt;

/**
 * Coordinate representing a point expressed in 2 different CRSs (2D horizontal + 1D Vertical).
 */
class CompoundPoint extends Point implements ConvertiblePoint
{
    use AutoConversion;

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

    /**
     * Vertical Offset and Slope
     * This transformation allows calculation of height in the target system by applying the parameter values to the
     * height value of the point in the source system.
     */
    public function verticalOffsetAndSlope(
        Compound $to,
        Angle $ordinate1OfEvaluationPoint,
        Angle $ordinate2OfEvaluationPoint,
        Length $verticalOffset,
        Angle $inclinationInLatitude,
        Angle $inclinationInLongitude,
        int $horizontalCRSCode
    ): self {
        $latitude = $this->horizontalPoint->getLatitude()->asRadians()->getValue();
        $longitude = $this->horizontalPoint->getLongitude()->asRadians()->getValue();
        $latitudeOrigin = $ordinate1OfEvaluationPoint->asRadians()->getValue();
        $longitudeOrigin = $ordinate2OfEvaluationPoint->asRadians()->getValue();
        $a = $this->horizontalPoint->getCRS()->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e2 = $this->horizontalPoint->getCRS()->getDatum()->getEllipsoid()->getEccentricitySquared();

        $rhoOrigin = $a * (1 - $e2) / (1 - $e2 * sin($latitudeOrigin) ** 2) ** 1.5;
        $nuOrigin = $a / sqrt(1 - $e2 * (sin($latitudeOrigin) ** 2));

        $latitudeTerm = new Metre($inclinationInLatitude->asRadians()->getValue() * $rhoOrigin * ($latitude - $latitudeOrigin));
        $longitudeTerm = new Metre($inclinationInLongitude->asRadians()->getValue() * $nuOrigin * ($longitude - $longitudeOrigin) * cos($latitude));
        $newVerticalHeight = $this->verticalPoint->getHeight()->add($verticalOffset)->add($latitudeTerm)->add($longitudeTerm);

        $newVerticalPoint = VerticalPoint::create($newVerticalHeight, $to->getVertical());

        return static::create($this->horizontalPoint, $newVerticalPoint, $to);
    }
}
