<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Point;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use PHPCoord\CoordinateOperation\AutoConversion;
use PHPCoord\CoordinateOperation\ConvertiblePoint;
use PHPCoord\CoordinateOperation\GeocentricValue;
use PHPCoord\CoordinateOperation\GeographicValue;
use PHPCoord\CoordinateOperation\GeoTiffGrid;
use PHPCoord\CoordinateOperation\IGNFXyzVelocityGrid;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateReferenceSystem\Geographic;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateSystem\Axis;
use PHPCoord\Exception\InvalidCoordinateException;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\Geometry\Geodesic;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Rate;
use PHPCoord\UnitOfMeasure\Scale\Scale;
use PHPCoord\UnitOfMeasure\Scale\Unity;
use PHPCoord\UnitOfMeasure\Time\Time;
use PHPCoord\UnitOfMeasure\Time\Year;

use function abs;
use function cos;
use function sin;
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
    protected Length $x;

    /**
     * Y co-ordinate.
     */
    protected Length $y;

    /**
     * Z co-ordinate.
     */
    protected Length $z;

    /**
     * Coordinate reference system.
     */
    protected Geocentric $crs;

    /**
     * Coordinate epoch (date for which the specified coordinates represented this point).
     */
    protected ?DateTimeImmutable $epoch;

    /**
     * Accuracy.
     */
    protected ?Length $accuracy;

    protected function __construct(Geocentric $crs, Length $x, Length $y, Length $z, ?DateTimeInterface $epoch = null, ?Length $accuracy = null)
    {
        $this->crs = $crs;
        $this->x = $x::convert($x, $this->crs->getCoordinateSystem()->getAxisByName(Axis::GEOCENTRIC_X)->getUnitOfMeasureId());
        $this->y = $y::convert($y, $this->crs->getCoordinateSystem()->getAxisByName(Axis::GEOCENTRIC_Y)->getUnitOfMeasureId());
        $this->z = $z::convert($z, $this->crs->getCoordinateSystem()->getAxisByName(Axis::GEOCENTRIC_Z)->getUnitOfMeasureId());

        if ($epoch instanceof DateTime) {
            $epoch = DateTimeImmutable::createFromMutable($epoch);
        }
        $this->epoch = $epoch;
        $this->accuracy = $accuracy;
    }

    /**
     * @param Length $x refer to CRS for preferred unit of measure, but any length unit accepted
     * @param Length $y refer to CRS for preferred unit of measure, but any length unit accepted
     * @param Length $z refer to CRS for preferred unit of measure, but any length unit accepted
     */
    public static function create(Geocentric $crs, Length $x, Length $y, Length $z, ?DateTimeInterface $epoch = null): self
    {
        return new self($crs, $x, $y, $z, $epoch);
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

    public function getAccuracy(): ?Length
    {
        return $this->accuracy;
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

            /** @var GeographicPoint $to */
            $geodesic = new Geodesic($this->getCRS()->getDatum()->getEllipsoid());

            return $geodesic->distance($this->asGeographicValue(), $to->asGeographicValue());
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
        Geographic2D|Geographic3D $to
    ): GeographicPoint {
        $geocentricValue = new GeocentricValue($this->x, $this->y, $this->z, $to->getDatum());
        $asGeographic = $geocentricValue->asGeographicValue();

        return GeographicPoint::create($to, $asGeographic->getLatitude(), $asGeographic->getLongitude(), $to instanceof Geographic3D ? $asGeographic->getHeight() : null, $this->epoch);
    }

    protected function geographic3DForPointMotion(): GeographicPoint
    {
        $geog3D = $this->geographic3DCRSForDatum($this->crs->getDatum());

        return $this->geographicGeocentric($geog3D);
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
        Scale $scaleDifference,
        bool $inReverse = false
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
            new Metre(0),
            $inReverse
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
        Length $ordinate3OfEvaluationPoint,
        bool $inReverse = false
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

        if ($inReverse) {
            $xt = (1 / $M) * ((($xs - $tx - $xp) * (cos($ry) * cos($rz))) + (($ys - $ty - $yp) * (-cos($ry) * sin($rz))) + (($zs - $tz - $zp) * sin($ry))) + $xp;
            $yt = (1 / $M) * ((($xs - $tx - $xp) * (cos($rx) * sin($rz) + sin($rx) * sin($ry) * cos($rz))) + (($ys - $ty - $yp) * (cos($rx) * cos($rz) - sin($rx) * sin($ry) * sin($rz))) + (($zs - $tz - $zp) * (-sin($rx) * cos($ry)))) + $yp;
            $zt = (1 / $M) * ((($xs - $tx - $xp) * (sin($rx) * sin($rz) - cos($rx) * sin($ry) * cos($rz))) + (($ys - $ty - $yp) * (sin($rx) * cos($rz) + cos($rx) * sin($ry) * sin($rz))) + (($zs - $tz - $zp) * (cos($rx) * cos($ry)))) + $zp;
        } else {
            $xt = $M * ((($xs - $xp) * (cos($ry) * cos($rz))) + (($ys - $yp) * (cos($rx) * sin($rz) + sin($rx) * sin($ry) * cos($rz))) + (($zs - $zp) * (sin($rx) * sin($rz) - cos($rx) * sin($ry) * cos($rz)))) + $tx + $xp;
            $yt = $M * ((($xs - $xp) * (-cos($ry) * sin($rz))) + (($ys - $yp) * (cos($rx) * cos($rz) - sin($rx) * sin($ry) * sin($rz))) + (($zs - $zp) * (sin($rx) * cos($rz) + cos($rx) * sin($ry) * sin($rz)))) + $ty + $yp;
            $zt = $M * ((($xs - $xp) * sin($ry)) + (($ys - $yp) * (-sin($rx) * cos($ry))) + (($zs - $zp) * (cos($rx) * cos($ry)))) + $tz + $zp;
        }

        return static::create($to, new Metre($xt), new Metre($yt), new Metre($zt), $this->epoch);
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
        Scale $scaleDifference,
        bool $inReverse = false
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
            new Metre(0),
            $inReverse
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
        Length $ordinate3OfEvaluationPoint,
        bool $inReverse = false
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

        if ($inReverse) {
            $xt = (1 / $M) * ((($xs - $tx - $xp) * (cos(-$ry) * cos(-$rz))) + (($ys - $ty - $yp) * (-cos(-$ry) * sin(-$rz))) + (($zs - $tz - $zp) * sin(-$ry))) + $xp;
            $yt = (1 / $M) * ((($xs - $tx - $xp) * (cos(-$rx) * sin(-$rz) + sin(-$rx) * sin(-$ry) * cos(-$rz))) + (($ys - $ty - $yp) * (cos(-$rx) * cos(-$rz) - sin(-$rx) * sin(-$ry) * sin(-$rz))) + (($zs - $tz - $zp) * (-sin(-$rx) * cos(-$ry)))) + $yp;
            $zt = (1 / $M) * ((($xs - $tx - $xp) * (sin(-$rx) * sin(-$rz) - cos(-$rx) * sin(-$ry) * cos(-$rz))) + (($ys - $ty - $yp) * (sin(-$rx) * cos(-$rz) + cos(-$rx) * sin(-$ry) * sin(-$rz))) + (($zs - $tz - $zp) * (cos(-$rx) * cos(-$ry)))) + $zp;
        } else {
            $xt = $M * ((($xs - $xp) * (cos(-$ry) * cos(-$rz))) + (($ys - $yp) * (cos(-$rx) * sin(-$rz) + sin(-$rx) * sin(-$ry) * cos(-$rz))) + (($zs - $zp) * (sin(-$rx) * sin(-$rz) - cos(-$rx) * sin(-$ry) * cos(-$rz)))) + $tx + $xp;
            $yt = $M * ((($xs - $xp) * (-cos(-$ry) * sin(-$rz))) + (($ys - $yp) * (cos(-$rx) * cos(-$rz) - sin(-$rx) * sin(-$ry) * sin(-$rz))) + (($zs - $zp) * (sin(-$rx) * cos(-$rz) + cos(-$rx) * sin(-$ry) * sin(-$rz)))) + $ty + $yp;
            $zt = $M * ((($xs - $xp) * sin(-$ry)) + (($ys - $yp) * (-sin(-$rx) * cos(-$ry))) + (($zs - $zp) * (cos(-$rx) * cos(-$ry)))) + $tz + $zp;
        }

        return static::create($to, new Metre($xt), new Metre($yt), new Metre($zt), $this->epoch);
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
        Length $zAxisTranslation,
        bool $inReverse = false
    ): self {
        return $this->positionVectorTransformation(
            $to,
            $xAxisTranslation,
            $yAxisTranslation,
            $zAxisTranslation,
            new Radian(0),
            new Radian(0),
            new Radian(0),
            new Unity(0),
            $inReverse
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
        Time $parameterReferenceEpoch,
        bool $inReverse = false
    ): self {
        // Points use PHP DateTimes for ease of use, but transformations use decimal years...
        $pointEpoch = Year::fromDateTime($this->epoch ?? new DateTime());
        $yearsToAdjust = $pointEpoch->subtract($parameterReferenceEpoch)->getValue();
        $xAxisTranslation = $xAxisTranslation->add($rateOfChangeOfXAxisTranslation->getChangePerYear()->multiply($yearsToAdjust));
        $yAxisTranslation = $yAxisTranslation->add($rateOfChangeOfYAxisTranslation->getChangePerYear()->multiply($yearsToAdjust));
        $zAxisTranslation = $zAxisTranslation->add($rateOfChangeOfZAxisTranslation->getChangePerYear()->multiply($yearsToAdjust));
        $xAxisRotation = $xAxisRotation->add($rateOfChangeOfXAxisRotation->getChangePerYear()->multiply($yearsToAdjust));
        $yAxisRotation = $yAxisRotation->add($rateOfChangeOfYAxisRotation->getChangePerYear()->multiply($yearsToAdjust));
        $zAxisRotation = $zAxisRotation->add($rateOfChangeOfZAxisRotation->getChangePerYear()->multiply($yearsToAdjust));
        $scaleDifference = $scaleDifference->add($rateOfChangeOfScaleDifference->getChangePerYear()->multiply($yearsToAdjust));

        return $this->coordinateFrameRotation($to, $xAxisTranslation, $yAxisTranslation, $zAxisTranslation, $xAxisRotation, $yAxisRotation, $zAxisRotation, $scaleDifference, $inReverse);
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
        Time $parameterReferenceEpoch,
        bool $inReverse = false
    ): self {
        // Points use PHP DateTimes for ease of use, but transformations use decimal years...
        $pointEpoch = Year::fromDateTime($this->epoch ?? new DateTime());
        $yearsToAdjust = $pointEpoch->subtract($parameterReferenceEpoch)->getValue();
        $xAxisTranslation = $xAxisTranslation->add($rateOfChangeOfXAxisTranslation->getChangePerYear()->multiply($yearsToAdjust));
        $yAxisTranslation = $yAxisTranslation->add($rateOfChangeOfYAxisTranslation->getChangePerYear()->multiply($yearsToAdjust));
        $zAxisTranslation = $zAxisTranslation->add($rateOfChangeOfZAxisTranslation->getChangePerYear()->multiply($yearsToAdjust));
        $xAxisRotation = $xAxisRotation->add($rateOfChangeOfXAxisRotation->getChangePerYear()->multiply($yearsToAdjust));
        $yAxisRotation = $yAxisRotation->add($rateOfChangeOfYAxisRotation->getChangePerYear()->multiply($yearsToAdjust));
        $zAxisRotation = $zAxisRotation->add($rateOfChangeOfZAxisRotation->getChangePerYear()->multiply($yearsToAdjust));
        $scaleDifference = $scaleDifference->add($rateOfChangeOfScaleDifference->getChangePerYear()->multiply($yearsToAdjust));

        return $this->positionVectorTransformation($to, $xAxisTranslation, $yAxisTranslation, $zAxisTranslation, $xAxisRotation, $yAxisRotation, $zAxisRotation, $scaleDifference, $inReverse);
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
        Time $transformationReferenceEpoch,
        bool $inReverse = false
    ): self {
        if (!$this->epoch) {
            throw new InvalidCoordinateException(sprintf('This transformation is only valid for epoch %s, none given', $transformationReferenceEpoch->getValue()));
        }

        // Points use PHP DateTimes for ease of use, but transformations use decimal years...
        $pointEpoch = Year::fromDateTime($this->epoch ?? new DateTime());

        if ($pointEpoch->getValue() !== $transformationReferenceEpoch->asYears()->getValue()) {
            throw new InvalidCoordinateException(sprintf('This transformation is only valid for epoch %s, got %s', $transformationReferenceEpoch, $pointEpoch));
        }

        return $this->coordinateFrameRotation($to, $xAxisTranslation, $yAxisTranslation, $zAxisTranslation, $xAxisRotation, $yAxisRotation, $zAxisRotation, $scaleDifference, $inReverse);
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
        Time $transformationReferenceEpoch,
        bool $inReverse = false
    ): self {
        if (!$this->epoch) {
            throw new InvalidCoordinateException(sprintf('This transformation is only valid for epoch %s, none given', $transformationReferenceEpoch->getValue()));
        }

        // Points use PHP DateTimes for ease of use, but transformations use decimal years...
        $pointEpoch = Year::fromDateTime($this->epoch);

        if ($pointEpoch->getValue() !== $transformationReferenceEpoch->asYears()->getValue()) {
            throw new InvalidCoordinateException(sprintf('This transformation is only valid for epoch %s, got %s', $transformationReferenceEpoch, $pointEpoch));
        }

        return $this->positionVectorTransformation($to, $xAxisTranslation, $yAxisTranslation, $zAxisTranslation, $xAxisRotation, $yAxisRotation, $zAxisRotation, $scaleDifference, $inReverse);
    }

    /**
     * Point motion (geocentric domain) using XYZ velocities
     * GN 7-2 §4.2.2 / EPSG 1064.
     * @param Rate<Length> $pointMotionVelocityX
     * @param Rate<Length> $pointMotionVelocityY
     * @param Rate<Length> $pointMotionVelocityZ
     */
    public function pointMotionXyzVelocities(
        Geocentric $to,
        Rate $pointMotionVelocityX,
        Rate $pointMotionVelocityY,
        Rate $pointMotionVelocityZ,
        Time $targetEpoch
    ): self {
        if (!$this->epoch) {
            throw new InvalidCoordinateException('Point motion requires a coordinate epoch, none given');
        }

        // Points use PHP DateTimes for ease of use, but transformations use decimal years...
        $pointEpoch = Year::fromDateTime($this->epoch);
        $dt = $targetEpoch->subtract($pointEpoch)->getValue();

        $vx = $pointMotionVelocityX->getChangePerYear();
        $vy = $pointMotionVelocityY->getChangePerYear();
        $vz = $pointMotionVelocityZ->getChangePerYear();

        $xt = $this->x->asMetres()->getValue() + $vx->asMetres()->getValue() * $dt;
        $yt = $this->y->asMetres()->getValue() + $vy->asMetres()->getValue() * $dt;
        $zt = $this->z->asMetres()->getValue() + $vz->asMetres()->getValue() * $dt;

        return static::create($to, new Metre($xt), new Metre($yt), new Metre($zt), $targetEpoch->asYears()->asDateTime());
    }

    /**
     * Point motion (geocentric domain) using NEU velocities
     * GN 7-2 §4.2.4 / EPSG 1146.
     * @param Rate<Length> $pointMotionVelocityNorth
     * @param Rate<Length> $pointMotionVelocityEast
     * @param Rate<Length> $pointMotionVelocityUp
     */
    public function pointMotionNeuVelocities(
        Geocentric $to,
        Rate $pointMotionVelocityNorth,
        Rate $pointMotionVelocityEast,
        Rate $pointMotionVelocityUp,
        Time $targetEpoch
    ): self {
        if (!$this->epoch) {
            throw new InvalidCoordinateException('Point motion requires a coordinate epoch, none given');
        }

        $geo = $this->asGeographicValue();
        $latitude = $geo->getLatitude()->asRadians()->getValue();
        $longitude = $geo->getLongitude()->asRadians()->getValue();

        $vn = $pointMotionVelocityNorth->getChangePerYear()->asMetres()->getValue();
        $ve = $pointMotionVelocityEast->getChangePerYear()->asMetres()->getValue();
        $vu = $pointMotionVelocityUp->getChangePerYear()->asMetres()->getValue();

        $sinPhi = sin($latitude);
        $cosPhi = cos($latitude);
        $sinLambda = sin($longitude);
        $cosLambda = cos($longitude);

        $vx = -$sinPhi * $cosLambda * $vn - $sinLambda * $ve + $cosPhi * $cosLambda * $vu;
        $vy = -$sinPhi * $sinLambda * $vn + $cosLambda * $ve + $cosPhi * $sinLambda * $vu;
        $vz = $cosPhi * $vn + $sinPhi * $vu;

        $vxRate = new Rate(new Metre($vx), new Year(1));
        $vyRate = new Rate(new Metre($vy), new Year(1));
        $vzRate = new Rate(new Metre($vz), new Year(1));

        return $this->pointMotionXyzVelocities($to, $vxRate, $vyRate, $vzRate, $targetEpoch);
    }

    /**
     * Point motion (geocentric domain) using an XYZ velocity grid.
     * Velocities are sampled in latitude and longitude and applied to the original coordinates.
     * Reverse resamples at the estimated position.
     */
    public function pointMotionXyzVelocityGrid(
        Geocentric $to,
        IGNFXyzVelocityGrid $pointMotionVelocityGridFile,
        Time $targetEpoch,
        bool $inReverse = false
    ): self {
        if (!$this->epoch) {
            throw new InvalidCoordinateException('Point motion requires a coordinate epoch, none given');
        }

        $pointEpoch = Year::fromDateTime($this->epoch);
        $dt = $targetEpoch->subtract($pointEpoch)->getValue();
        $x0 = $this->x->asMetres()->getValue();
        $y0 = $this->y->asMetres()->getValue();
        $z0 = $this->z->asMetres()->getValue();

        $geo = $this->asGeographicValue();
        $longitude = $geo->getLongitude()->asDegrees()->getValue();
        $latitude = $geo->getLatitude()->asDegrees()->getValue();
        $vx = new Metre(0);
        $vy = new Metre(0);
        $vz = new Metre(0);

        do {
            $previousX = $vx;
            $previousY = $vy;
            $previousZ = $vz;
            /** @var array{0: Length, 1: Length, 2: Length} $velocities */
            $velocities = $pointMotionVelocityGridFile->getValues($longitude, $latitude);
            $vx = $velocities[0]->asMetres();
            $vy = $velocities[1]->asMetres();
            $vz = $velocities[2]->asMetres();
            $candidate = static::create(
                $to,
                new Metre($x0 + $vx->getValue() * $dt),
                new Metre($y0 + $vy->getValue() * $dt),
                new Metre($z0 + $vz->getValue() * $dt),
                $targetEpoch->asYears()->asDateTime()
            );
            if ($inReverse) {
                $estimated = $candidate->asGeographicValue();
                $longitude = $estimated->getLongitude()->asDegrees()->getValue();
                $latitude = $estimated->getLatitude()->asDegrees()->getValue();
            } else {
                return $candidate;
            }
        } while (
            abs($vx->subtract($previousX)->getValue()) > self::ITERATION_CONVERGENCE_GRID
            || abs($vy->subtract($previousY)->getValue()) > self::ITERATION_CONVERGENCE_GRID
            || abs($vz->subtract($previousZ)->getValue()) > self::ITERATION_CONVERGENCE_GRID
        );

        return $candidate;
    }

    /**
     * Geocentric translations using NEU velocity grid (gtg)
     * EPSG 1144. Interpolate ENU velocity, convert to XYZ, apply V×(t2−t1).
     * Source/target epoch −999 is the EPSG sentinel for “user-defined input” (the point epoch), not year −999.
     */
    public function geocentricTranslationsUsingNeuVelocityGrid(
        Geocentric $to,
        GeoTiffGrid $pointMotionVelocityGridFile,
        Time $sourceEpoch,
        Time $targetEpoch,
        bool $inReverse = false
    ): self {
        $t1 = $this->resolveUserDefinedEpoch($sourceEpoch);
        $t2 = $this->resolveUserDefinedEpoch($targetEpoch);
        if ($inReverse) {
            [$t1, $t2] = [$t2, $t1];
        }

        $geo = $this->asGeographicValue();
        /** @var array{0: Length, 1: Length, 2: Length} $velocities */
        $velocities = $pointMotionVelocityGridFile->getValues(
            $geo->getLongitude()->asDegrees()->getValue(),
            $geo->getLatitude()->asDegrees()->getValue()
        );

        $latitude = $geo->getLatitude()->asRadians()->getValue();
        $longitude = $geo->getLongitude()->asRadians()->getValue();

        $ve = $velocities[0]->asMetres()->getValue();
        $vn = $velocities[1]->asMetres()->getValue();
        $vu = $velocities[2]->asMetres()->getValue();

        $sinPhi = sin($latitude);
        $cosPhi = cos($latitude);
        $sinLambda = sin($longitude);
        $cosLambda = cos($longitude);

        $vx = -$sinPhi * $cosLambda * $vn - $sinLambda * $ve + $cosPhi * $cosLambda * $vu;
        $vy = -$sinPhi * $sinLambda * $vn + $cosLambda * $ve + $cosPhi * $sinLambda * $vu;
        $vz = $cosPhi * $vn + $sinPhi * $vu;

        $dt = $t2->subtract($t1)->getValue();
        $xt = $this->x->asMetres()->getValue() + $vx * $dt;
        $yt = $this->y->asMetres()->getValue() + $vy * $dt;
        $zt = $this->z->asMetres()->getValue() + $vz * $dt;

        return static::create($to, new Metre($xt), new Metre($yt), new Metre($zt), $t2->asYears()->asDateTime());
    }

    /**
     * Geocentric translations (geocen domain) by XYZ grid (gtg)
     * EPSG 1147. Interpolate TX,TY,TZ at the point’s geographic position and add them.
     */
    public function geocentricTranslationsByXyzGrid(
        Geocentric $to,
        GeoTiffGrid $offsetsFile,
        bool $inReverse = false
    ): self {
        if (!$inReverse) {
            $geo = $this->asGeographicValue();
            /** @var array{0: Length, 1: Length, 2: Length} $offsets */
            $offsets = $offsetsFile->getValues(
                $geo->getLongitude()->asDegrees()->getValue(),
                $geo->getLatitude()->asDegrees()->getValue()
            );

            return static::create(
                $to,
                $this->x->add($offsets[0]),
                $this->y->add($offsets[1]),
                $this->z->add($offsets[2]),
                $this->epoch
            );
        }

        $tx = new Metre(0);
        $ty = new Metre(0);
        $tz = new Metre(0);
        $geo = $this->asGeographicValue();
        $longitude = $geo->getLongitude();
        $latitude = $geo->getLatitude();
        $candidate = $this;

        do {
            $prevTx = $tx;
            $prevTy = $ty;
            $prevTz = $tz;
            /** @var array{0: Length, 1: Length, 2: Length} $offsets */
            $offsets = $offsetsFile->getValues(
                $longitude->asDegrees()->getValue(),
                $latitude->asDegrees()->getValue()
            );
            $tx = $offsets[0];
            $ty = $offsets[1];
            $tz = $offsets[2];
            $candidate = static::create(
                $to,
                $this->x->subtract($tx),
                $this->y->subtract($ty),
                $this->z->subtract($tz),
                $this->epoch
            );
            $geo = $candidate->asGeographicValue();
            $longitude = $geo->getLongitude();
            $latitude = $geo->getLatitude();
        } while (
            abs($tx->subtract($prevTx)->asMetres()->getValue()) > self::ITERATION_CONVERGENCE_GRID
            || abs($ty->subtract($prevTy)->asMetres()->getValue()) > self::ITERATION_CONVERGENCE_GRID
            || abs($tz->subtract($prevTz)->asMetres()->getValue()) > self::ITERATION_CONVERGENCE_GRID
        );

        return $candidate;
    }

    /**
     * Geocentric translation grid, then an NEU velocity grid.
     * One operation, so there is no coordinate reference system between the two steps.
     * Reverse runs the velocity grid first.
     */
    public function geocentricTranslationsByXyzGridUsingNeuVelocityGrid(
        Geocentric $to,
        GeoTiffGrid $offsetsFile,
        GeoTiffGrid $pointMotionVelocityGridFile,
        Time $sourceEpoch,
        Time $targetEpoch,
        bool $inReverse = false
    ): self {
        if (!$inReverse) {
            $translated = $this->geocentricTranslationsByXyzGrid($to, $offsetsFile, false);

            return $translated->geocentricTranslationsUsingNeuVelocityGrid($to, $pointMotionVelocityGridFile, $sourceEpoch, $targetEpoch, false);
        }

        $moved = $this->geocentricTranslationsUsingNeuVelocityGrid($to, $pointMotionVelocityGridFile, $sourceEpoch, $targetEpoch, true);

        return $moved->geocentricTranslationsByXyzGrid($to, $offsetsFile, true);
    }

    /**
     * Position vector, then an NEU velocity grid.
     * One operation, so there is no coordinate reference system between the two steps.
     * Reverse runs the velocity grid first.
     */
    public function positionVectorTransformationUsingNeuVelocityGrid(
        Geocentric $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation,
        Angle $xAxisRotation,
        Angle $yAxisRotation,
        Angle $zAxisRotation,
        Scale $scaleDifference,
        GeoTiffGrid $pointMotionVelocityGridFile,
        Time $sourceEpoch,
        Time $targetEpoch,
        bool $inReverse = false
    ): self {
        if (!$inReverse) {
            $shifted = $this->positionVectorTransformation(
                $to,
                $xAxisTranslation,
                $yAxisTranslation,
                $zAxisTranslation,
                $xAxisRotation,
                $yAxisRotation,
                $zAxisRotation,
                $scaleDifference,
                false
            );

            return $shifted->geocentricTranslationsUsingNeuVelocityGrid($to, $pointMotionVelocityGridFile, $sourceEpoch, $targetEpoch, false);
        }

        $moved = $this->geocentricTranslationsUsingNeuVelocityGrid($to, $pointMotionVelocityGridFile, $sourceEpoch, $targetEpoch, true);

        return $moved->positionVectorTransformation(
            $to,
            $xAxisTranslation,
            $yAxisTranslation,
            $zAxisTranslation,
            $xAxisRotation,
            $yAxisRotation,
            $zAxisRotation,
            $scaleDifference,
            true
        );
    }

    /**
     * EPSG epoch −999 means “use the point’s coordinate epoch”.
     */
    private function resolveUserDefinedEpoch(Time $epoch): Time
    {
        if ($epoch->asYears()->getValue() === -999.0) {
            if (!$this->epoch) {
                throw new InvalidCoordinateException('Geocentric translations using a NEU velocity grid require a coordinate epoch when the operation epoch is user-defined');
            }

            return Year::fromDateTime($this->epoch);
        }

        return $epoch;
    }

    public function asGeographicValue(): GeographicValue
    {
        return (new GeocentricValue($this->x, $this->y, $this->z, $this->getCRS()->getDatum()))->asGeographicValue();
    }
}
