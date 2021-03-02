<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use function abs;
use function cos;
use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Scale\Scale;
use function sin;
use function sqrt;

/**
 * Coordinate representing a vertical dimension.
 */
class VerticalPoint extends Point
{
    /**
     * Height.
     */
    protected Length $height;

    /**
     * Coordinate reference system.
     */
    protected Vertical $crs;

    /**
     * Coordinate epoch (date for which the specified coordinates represented this point).
     */
    protected ?DateTimeImmutable $epoch;

    /**
     * Constructor.
     * @param Length $height refer to CRS for preferred unit of measure, but any length unit accepted
     */
    protected function __construct(Length $height, Vertical $crs, ?DateTimeInterface $epoch = null)
    {
        $this->height = Length::convert($height, $crs->getCoordinateSystem()->getAxes()[0]->getUnitOfMeasureId());
        $this->crs = $crs;

        if ($epoch instanceof DateTime) {
            $epoch = DateTimeImmutable::createFromMutable($epoch);
        }
        $this->epoch = $epoch;
    }

    /**
     * Constructor.
     * @param Length $height refer to CRS for preferred unit of measure, but any length unit accepted
     */
    public static function create(Length $height, Vertical $crs, ?DateTimeInterface $epoch = null): self
    {
        return new static($height, $crs, $epoch);
    }

    public function getHeight(): Length
    {
        return $this->height;
    }

    public function getCRS(): Vertical
    {
        return $this->crs;
    }

    public function getCoordinateEpoch(): ?DateTimeImmutable
    {
        return $this->epoch;
    }

    public function calculateDistance(Point $to): Length
    {
        if ($to->getCRS()->getSRID() !== $this->crs->getSRID()) {
            throw new InvalidCoordinateReferenceSystemException('Can only calculate distances between two points in the same CRS');
        }

        /* @var self $to */
        return new Metre(abs($this->height->asMetres()->getValue() - $to->height->asMetres()->getValue()));
    }

    public function __toString(): string
    {
        return "({$this->height})";
    }

    /**
     * Vertical Offset
     * This transformation allows calculation of height (or depth) in the target system by adding the parameter value
     * to the height (or depth)-value of the point in the source system.
     */
    public function verticalOffset(
        Vertical $to,
        Length $verticalOffset
    ): self {
        return static::create($this->height->add($verticalOffset), $to);
    }

    /**
     * Vertical Offset and Slope
     * This transformation allows calculation of height in the target system by applying the parameter values to the
     * height value of the point in the source system.
     */
    public function verticalOffsetAndSlope(
        Vertical $to,
        Angle $ordinate1OfEvaluationPoint,
        Angle $ordinate2OfEvaluationPoint,
        Length $verticalOffset,
        Angle $inclinationInLatitude,
        Angle $inclinationInLongitude,
        string $EPSGCodeForHorizontalCRS,
        GeographicPoint $horizontalPoint
    ): self {
        $latitude = $horizontalPoint->getLatitude()->asRadians()->getValue();
        $longitude = $horizontalPoint->getLongitude()->asRadians()->getValue();
        $latitudeOrigin = $ordinate1OfEvaluationPoint->asRadians()->getValue();
        $longitudeOrigin = $ordinate2OfEvaluationPoint->asRadians()->getValue();
        $a = $horizontalPoint->getCRS()->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e2 = $horizontalPoint->getCRS()->getDatum()->getEllipsoid()->getEccentricitySquared();

        $rhoOrigin = $a * (1 - $e2) / (1 - $e2 * sin($latitudeOrigin) ** 2) ** 1.5;
        $nuOrigin = $a / sqrt(1 - $e2 * (sin($latitudeOrigin) ** 2));

        $latitudeTerm = new Metre($inclinationInLatitude->asRadians()->getValue() * $rhoOrigin * ($latitude - $latitudeOrigin));
        $longitudeTerm = new Metre($inclinationInLongitude->asRadians()->getValue() * $nuOrigin * ($longitude - $longitudeOrigin) * cos($latitude));
        $newVerticalHeight = $this->getHeight()->add($verticalOffset)->add($latitudeTerm)->add($longitudeTerm);

        return self::create($newVerticalHeight, $to);
    }

    /**
     * Height Depth Reversal.
     */
    public function heightDepthReversal(
        Vertical $to
    ): self {
        return static::create($this->height->multiply(-1), $to);
    }

    /**
     * Change of Vertical Unit.
     */
    public function changeOfVerticalUnit(
        Vertical $to,
        Scale $unitConversionScalar
    ) {
        // units are auto-converted, don't need to use the supplied param
        return static::create($this->height, $to, $this->epoch);
    }
}
