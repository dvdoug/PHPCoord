<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use function abs;
use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use PHPCoord\CoordinateOperation\AutoConversion;
use PHPCoord\CoordinateOperation\ConvertiblePoint;
use PHPCoord\CoordinateOperation\GeocentricValue;
use PHPCoord\CoordinateOperation\GeographicValue;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateReferenceSystem\Geographic;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateSystem\Axis;
use PHPCoord\Exception\InvalidCoordinateException;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Rate;
use PHPCoord\UnitOfMeasure\Scale\Scale;
use PHPCoord\UnitOfMeasure\Scale\Unity;
use PHPCoord\UnitOfMeasure\Time\Time;
use PHPCoord\UnitOfMeasure\Time\Year;
use function sprintf;

/**
 * Coordinate representing a point in ECEF geocentric form.
 */
class GeocentricPoint extends Point implements ConvertiblePoint
{
    use AutoConversion;

    /**
     * X co-ordinate.
     */
    protected $x;

    /**
     * Y co-ordinate.
     */
    protected $y;

    /**
     * Z co-ordinate.
     */
    protected $z;

    /**
     * Coordinate reference system.
     */
    protected $crs;

    /**
     * Coordinate epoch (date for which the specified coordinates represented this point).
     */
    protected $epoch;

    protected function __construct(Length $x, Length $y, Length $z, Geocentric $crs, ?DateTimeInterface $epoch = null)
    {
        $this->crs = $crs;
        $this->x = Length::convert($x, $this->getAxisByName(Axis::GEOCENTRIC_X)->getUnitOfMeasureId());
        $this->y = Length::convert($y, $this->getAxisByName(Axis::GEOCENTRIC_Y)->getUnitOfMeasureId());
        $this->z = Length::convert($z, $this->getAxisByName(Axis::GEOCENTRIC_Z)->getUnitOfMeasureId());

        if ($epoch instanceof DateTime) {
            $epoch = DateTimeImmutable::createFromMutable($epoch);
        }
        $this->epoch = $epoch;
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

            /* @var GeocentricPoint $to */
            return static::vincenty($this->asGeographicValue(), $to->asGeographicValue(), $this->getCRS()->getDatum()->getEllipsoid());
        }
    }

    public function __toString(): string
    {
        return "({$this->x}, {$this->y}, {$this->z})";
    }

    /**
     * Geographic/geocentric conversions
     * In applications it is often concatenated with the 3- 7- or 10-parameter transformations 9603, 9606, 9607 or
     * 9636 to form a geographic to geographic transformation.
     */
    public function geographicGeocentric(
        Geographic $to
    ): GeographicPoint {
        $geocentricValue = new GeocentricValue($this->x, $this->y, $this->z, $to->getDatum());
        $asGeographic = $geocentricValue->asGeographicValue();

        return GeographicPoint::create($asGeographic->getLatitude(), $asGeographic->getLongitude(), $to instanceof Geographic3D ? $asGeographic->getHeight() : null, $to, $this->epoch);
    }

    /**
     * Coordinate Frame rotation (geocentric domain)
     * This method is a specific case of the Molodensky-Badekas (CF) method (code 1034) in which the evaluation point
     * is at the geocentre with coordinate values of zero. Note the analogy with the Position Vector method (code 1033)
     * but beware of the differences!
     */
    public function coordinateFrameRotation(
        Geocentric $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation,
        Angle $xAxisRotation,
        Angle $yAxisRotation,
        Angle $zAxisRotation,
        Scale $scaleDifference
    ): self {
        return $this->coordinateFrameMolodenskyBadekas(
            $to,
            $xAxisTranslation,
            $yAxisTranslation,
            $zAxisTranslation,
            $xAxisRotation,
            $yAxisRotation,
            $zAxisRotation,
            $scaleDifference,
            new Metre(0),
            new Metre(0),
            new Metre(0)
        );
    }

    /**
     * Molodensky-Badekas (CF geocentric domain)
     * See method codes 1039 and 9636 for this operation in other coordinate domains and method code 1061 for opposite
     * rotation convention in geocentric domain.
     */
    public function coordinateFrameMolodenskyBadekas(
        Geocentric $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation,
        Angle $xAxisRotation,
        Angle $yAxisRotation,
        Angle $zAxisRotation,
        Scale $scaleDifference,
        Length $ordinate1OfEvaluationPoint,
        Length $ordinate2OfEvaluationPoint,
        Length $ordinate3OfEvaluationPoint
    ): self {
        $xs = $this->x->asMetres()->getValue();
        $ys = $this->y->asMetres()->getValue();
        $zs = $this->z->asMetres()->getValue();
        $tx = $xAxisTranslation->asMetres()->getValue();
        $ty = $yAxisTranslation->asMetres()->getValue();
        $tz = $zAxisTranslation->asMetres()->getValue();
        $rx = $xAxisRotation->asRadians()->getValue();
        $ry = $yAxisRotation->asRadians()->getValue();
        $rz = $zAxisRotation->asRadians()->getValue();
        $M = 1 + $scaleDifference->asUnity()->getValue();
        $xp = $ordinate1OfEvaluationPoint->asMetres()->getValue();
        $yp = $ordinate2OfEvaluationPoint->asMetres()->getValue();
        $zp = $ordinate3OfEvaluationPoint->asMetres()->getValue();

        $xt = $M * ((($xs - $xp) * 1) + (($ys - $yp) * $rz) + (($zs - $zp) * -$ry)) + $tx + $xp;
        $yt = $M * ((($xs - $xp) * -$rz) + (($ys - $yp) * 1) + (($zs - $zp) * $rx)) + $ty + $yp;
        $zt = $M * ((($xs - $xp) * $ry) + (($ys - $yp) * -$rx) + (($zs - $zp) * 1)) + $tz + $zp;

        return static::create(new Metre($xt), new Metre($yt), new Metre($zt), $to, $this->epoch);
    }

    /**
     * Position Vector transformation (geocentric domain)
     * This method is a specific case of the Molodensky-Badekas (PV) method (code 1061) in which the evaluation point
     * is the geocentre with coordinate values of zero. Note the analogy with the Coordinate Frame method (code 1032)
     * but beware of the differences!
     */
    public function positionVectorTransformation(
        Geocentric $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation,
        Angle $xAxisRotation,
        Angle $yAxisRotation,
        Angle $zAxisRotation,
        Scale $scaleDifference
    ): self {
        return $this->positionVectorMolodenskyBadekas(
            $to,
            $xAxisTranslation,
            $yAxisTranslation,
            $zAxisTranslation,
            $xAxisRotation,
            $yAxisRotation,
            $zAxisRotation,
            $scaleDifference,
            new Metre(0),
            new Metre(0),
            new Metre(0)
        );
    }

    /**
     * Molodensky-Badekas (PV geocentric domain)
     * See method codes 1062 and 1063 for this operation in other coordinate domains and method code 1034 for opposite
     * rotation convention in geocentric domain.
     */
    public function positionVectorMolodenskyBadekas(
        Geocentric $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation,
        Angle $xAxisRotation,
        Angle $yAxisRotation,
        Angle $zAxisRotation,
        Scale $scaleDifference,
        Length $ordinate1OfEvaluationPoint,
        Length $ordinate2OfEvaluationPoint,
        Length $ordinate3OfEvaluationPoint
    ): self {
        $xs = $this->x->asMetres()->getValue();
        $ys = $this->y->asMetres()->getValue();
        $zs = $this->z->asMetres()->getValue();
        $tx = $xAxisTranslation->asMetres()->getValue();
        $ty = $yAxisTranslation->asMetres()->getValue();
        $tz = $zAxisTranslation->asMetres()->getValue();
        $rx = $xAxisRotation->asRadians()->getValue();
        $ry = $yAxisRotation->asRadians()->getValue();
        $rz = $zAxisRotation->asRadians()->getValue();
        $M = 1 + $scaleDifference->asUnity()->getValue();
        $xp = $ordinate1OfEvaluationPoint->asMetres()->getValue();
        $yp = $ordinate2OfEvaluationPoint->asMetres()->getValue();
        $zp = $ordinate3OfEvaluationPoint->asMetres()->getValue();

        $xt = $M * ((($xs - $xp) * 1) + (($ys - $yp) * -$rz) + (($zs - $zp) * $ry)) + $tx + $xp;
        $yt = $M * ((($xs - $xp) * $rz) + (($ys - $yp) * 1) + (($zs - $zp) * -$rx)) + $ty + $yp;
        $zt = $M * ((($xs - $xp) * -$ry) + (($ys - $yp) * $rx) + (($zs - $zp) * 1)) + $tz + $zp;

        return static::create(new Metre($xt), new Metre($yt), new Metre($zt), $to, $this->epoch);
    }

    /**
     * Geocentric translations
     * This method allows calculation of geocentric coords in the target system by adding the parameter values to the
     * corresponding coordinates of the point in the source system. See methods 1035 and 9603 for similar tfms
     * operating between other CRSs types.
     */
    public function geocentricTranslation(
        Geocentric $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation
    ): self {
        return $this->positionVectorTransformation(
            $to,
            $xAxisTranslation,
            $yAxisTranslation,
            $zAxisTranslation,
            new Radian(0),
            new Radian(0),
            new Radian(0),
            new Unity(0)
        );
    }

    /**
     * Time-dependent Coordinate Frame rotation (geocen)
     * Note the analogy with the Time-dependent Position Vector transformation (code 1053) but beware of the
     * differences!  The Position Vector convention is used by IAG. See method codes 1057 and 1058 for similar methods
     * operating between other CRS types.
     */
    public function timeDependentCoordinateFrameRotation(
        Geocentric $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation,
        Angle $xAxisRotation,
        Angle $yAxisRotation,
        Angle $zAxisRotation,
        Scale $scaleDifference,
        Rate $rateOfChangeOfXAxisTranslation,
        Rate $rateOfChangeOfYAxisTranslation,
        Rate $rateOfChangeOfZAxisTranslation,
        Rate $rateOfChangeOfXAxisRotation,
        Rate $rateOfChangeOfYAxisRotation,
        Rate $rateOfChangeOfZAxisRotation,
        Rate $rateOfChangeOfScaleDifference,
        Time $parameterReferenceEpoch
    ): self {
        if ($this->epoch === null) {
            throw new InvalidCoordinateException('This transformation requires an epoch, none given');
        }

        // Points use PHP DateTimes for ease of use, but transformations use decimal years...
        $pointEpoch = Year::fromDateTime($this->epoch);
        $yearsToAdjust = $pointEpoch->subtract($parameterReferenceEpoch)->getValue();
        $xAxisTranslation = $xAxisTranslation->add($rateOfChangeOfXAxisTranslation->getChangePerYear()->multiply($yearsToAdjust));
        $yAxisTranslation = $yAxisTranslation->add($rateOfChangeOfYAxisTranslation->getChangePerYear()->multiply($yearsToAdjust));
        $zAxisTranslation = $zAxisTranslation->add($rateOfChangeOfZAxisTranslation->getChangePerYear()->multiply($yearsToAdjust));
        $xAxisRotation = $xAxisRotation->add($rateOfChangeOfXAxisRotation->getChangePerYear()->multiply($yearsToAdjust));
        $yAxisRotation = $yAxisRotation->add($rateOfChangeOfYAxisRotation->getChangePerYear()->multiply($yearsToAdjust));
        $zAxisRotation = $zAxisRotation->add($rateOfChangeOfZAxisRotation->getChangePerYear()->multiply($yearsToAdjust));
        $scaleDifference = $scaleDifference->add($rateOfChangeOfScaleDifference->getChangePerYear()->multiply($yearsToAdjust));

        return $this->coordinateFrameRotation($to, $xAxisTranslation, $yAxisTranslation, $zAxisTranslation, $xAxisRotation, $yAxisRotation, $zAxisRotation, $scaleDifference);
    }

    /**
     * Time-dependent Position Vector tfm (geocentric)
     * Note the analogy with the Time-dependent Coordinate Frame rotation (code 1056) but beware of the differences!
     * The Position Vector convention is used by IAG. See method codes 1054 and 1055 for similar methods operating
     * between other CRS types.
     */
    public function timeDependentPositionVectorTransformation(
        Geocentric $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation,
        Angle $xAxisRotation,
        Angle $yAxisRotation,
        Angle $zAxisRotation,
        Scale $scaleDifference,
        Rate $rateOfChangeOfXAxisTranslation,
        Rate $rateOfChangeOfYAxisTranslation,
        Rate $rateOfChangeOfZAxisTranslation,
        Rate $rateOfChangeOfXAxisRotation,
        Rate $rateOfChangeOfYAxisRotation,
        Rate $rateOfChangeOfZAxisRotation,
        Rate $rateOfChangeOfScaleDifference,
        Time $parameterReferenceEpoch
    ): self {
        if ($this->epoch === null) {
            throw new InvalidCoordinateException('This transformation requires an epoch, none given');
        }

        // Points use PHP DateTimes for ease of use, but transformations use decimal years...
        $pointEpoch = Year::fromDateTime($this->epoch);
        $yearsToAdjust = $pointEpoch->subtract($parameterReferenceEpoch)->getValue();
        $xAxisTranslation = $xAxisTranslation->add($rateOfChangeOfXAxisTranslation->getChangePerYear()->multiply($yearsToAdjust));
        $yAxisTranslation = $yAxisTranslation->add($rateOfChangeOfYAxisTranslation->getChangePerYear()->multiply($yearsToAdjust));
        $zAxisTranslation = $zAxisTranslation->add($rateOfChangeOfZAxisTranslation->getChangePerYear()->multiply($yearsToAdjust));
        $xAxisRotation = $xAxisRotation->add($rateOfChangeOfXAxisRotation->getChangePerYear()->multiply($yearsToAdjust));
        $yAxisRotation = $yAxisRotation->add($rateOfChangeOfYAxisRotation->getChangePerYear()->multiply($yearsToAdjust));
        $zAxisRotation = $zAxisRotation->add($rateOfChangeOfZAxisRotation->getChangePerYear()->multiply($yearsToAdjust));
        $scaleDifference = $scaleDifference->add($rateOfChangeOfScaleDifference->getChangePerYear()->multiply($yearsToAdjust));

        return $this->positionVectorTransformation($to, $xAxisTranslation, $yAxisTranslation, $zAxisTranslation, $xAxisRotation, $yAxisRotation, $zAxisRotation, $scaleDifference);
    }

    /**
     * Time-specific Coordinate Frame rotation (geocen)
     * Note the analogy with the Time-specific Position Vector method (code 1065) but beware of the differences!
     */
    public function timeSpecificCoordinateFrameRotation(
        Geocentric $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation,
        Angle $xAxisRotation,
        Angle $yAxisRotation,
        Angle $zAxisRotation,
        Scale $scaleDifference,
        Time $transformationReferenceEpoch
    ): self {
        if ($this->epoch === null) {
            throw new InvalidCoordinateException(sprintf('This transformation is only valid for epoch %s, none given', $transformationReferenceEpoch->getValue()));
        }

        // Points use PHP DateTimes for ease of use, but transformations use decimal years...
        $pointEpoch = Year::fromDateTime($this->epoch);

        if (abs($pointEpoch->getValue() - $transformationReferenceEpoch->getValue()) > 0.001) {
            throw new InvalidCoordinateException(sprintf('This transformation is only valid for epoch %s, got %s', $transformationReferenceEpoch, $pointEpoch));
        }

        return $this->coordinateFrameRotation($to, $xAxisTranslation, $yAxisTranslation, $zAxisTranslation, $xAxisRotation, $yAxisRotation, $zAxisRotation, $scaleDifference);
    }

    /**
     * Time-specific Position Vector transform (geocen)
     * Note the analogy with the Time-specifc Coordinate Frame method (code 1066) but beware of the differences!
     */
    public function timeSpecificPositionVectorTransformation(
        Geocentric $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation,
        Angle $xAxisRotation,
        Angle $yAxisRotation,
        Angle $zAxisRotation,
        Scale $scaleDifference,
        Time $transformationReferenceEpoch
    ): self {
        if ($this->epoch === null) {
            throw new InvalidCoordinateException(sprintf('This transformation is only valid for epoch %s, none given', $transformationReferenceEpoch->getValue()));
        }

        // Points use PHP DateTimes for ease of use, but transformations use decimal years...
        $pointEpoch = Year::fromDateTime($this->epoch);

        if (abs($pointEpoch->getValue() - $transformationReferenceEpoch->getValue()) > 0.001) {
            throw new InvalidCoordinateException(sprintf('This transformation is only valid for epoch %s, got %s', $transformationReferenceEpoch, $pointEpoch));
        }

        return $this->positionVectorTransformation($to, $xAxisTranslation, $yAxisTranslation, $zAxisTranslation, $xAxisRotation, $yAxisRotation, $zAxisRotation, $scaleDifference);
    }

    public function asGeographicValue(): GeographicValue
    {
        return (new GeocentricValue($this->x, $this->y, $this->z, $this->getCRS()->getDatum()))->asGeographicValue();
    }
}
