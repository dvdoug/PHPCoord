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
use PHPCoord\CoordinateOperation\GeographicGeoidHeightGrid;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
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
    protected function __construct(Vertical $crs, Length $height, ?DateTimeInterface $epoch = null)
    {
        $this->height = $height::convert($height, $crs->getCoordinateSystem()->getAxes()[0]->getUnitOfMeasureId());
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
    public static function create(Vertical $crs, Length $height, ?DateTimeInterface $epoch = null): self
    {
        return new static($crs, $height, $epoch);
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
    public function offset(
        Vertical $to,
        Length $verticalOffset
    ): self {
        return static::create($to, $this->height->add($verticalOffset));
    }

    /**
     * Vertical Offset and Slope
     * This transformation allows calculation of height in the target system by applying the parameter values to the
     * height value of the point in the source system.
     */
    public function offsetAndSlope(
        Vertical $to,
        Angle $ordinate1OfEvaluationPoint,
        Angle $ordinate2OfEvaluationPoint,
        Length $verticalOffset,
        Angle $inclinationInLatitude,
        Angle $inclinationInLongitude,
        string $EPSGCodeForHorizontalCRS,
        GeographicPoint $horizontalPoint
    ): self {
        $ellipsoid = $horizontalPoint->getCRS()->getDatum()->getEllipsoid();
        $latitude = $horizontalPoint->getLatitude()->asRadians()->getValue();
        $longitude = $horizontalPoint->getLongitude()->asRadians()->getValue();
        $latitudeOrigin = $ordinate1OfEvaluationPoint->asRadians()->getValue();
        $longitudeOrigin = $ordinate2OfEvaluationPoint->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e2 = $ellipsoid->getEccentricitySquared();

        $rhoOrigin = $a * (1 - $e2) / (1 - $e2 * sin($latitudeOrigin) ** 2) ** 1.5;
        $nuOrigin = $a / sqrt(1 - $e2 * (sin($latitudeOrigin) ** 2));

        $latitudeTerm = new Metre($inclinationInLatitude->asRadians()->getValue() * $rhoOrigin * ($latitude - $latitudeOrigin));
        $longitudeTerm = new Metre($inclinationInLongitude->asRadians()->getValue() * $nuOrigin * ($longitude - $longitudeOrigin) * cos($latitude));
        $newVerticalHeight = $this->getHeight()->add($verticalOffset)->add($latitudeTerm)->add($longitudeTerm);

        return self::create($to, $newVerticalHeight);
    }

    /**
     * Height Depth Reversal.
     */
    public function heightDepthReversal(
        Vertical $to
    ): self {
        return static::create($to, $this->height->multiply(-1));
    }

    /**
     * Change of Vertical Unit.
     */
    public function changeOfVerticalUnit(
        Vertical $to
    ): self {
        // units are auto-converted, don't need to use the supplied param
        return static::create($to, $this->height, $this->epoch);
    }

    /**
     * Zero-tide height to mean-tide height (EVRF2019)
     * The offset of -0.08593 is applied to force EVRF2019 mean-tide height to be equal to EVRF2019 height at the
     * EVRF2019 nominal origin at Amsterdams Peil.
     */
    public function zeroTideHeightToMeanTideHeightEVRF2019(
        Vertical $to,
        bool $inReverse,
        GeographicPoint $horizontalPoint
    ): self {
        $latitude = $horizontalPoint->getLatitude()->asRadians()->getValue();
        $delta = new Metre((0.29541 * sin($latitude) ** 2 + 0.00042 * sin($latitude) ** 4 - 0.0994) - 0.08593);

        if ($inReverse) {
            $delta = $delta->multiply(-1);
        }

        return static::create($to, $this->height->add($delta));
    }

    /**
     * Vertical Offset by Grid Interpolation.
     */
    public function offsetFromGrid(
        Vertical $to,
        GeographicGeoidHeightGrid $offsetsFile,
        bool $inReverse,
        GeographicPoint $horizontalPoint
    ): self {
        $offset = $offsetsFile->getHeightAdjustment($horizontalPoint);

        if ($inReverse) {
            $offset = $offset->multiply(-1);
        }

        return static::create($to, $this->height->add($offset));
    }
}
