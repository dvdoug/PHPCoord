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
use PHPCoord\CoordinateOperation\GeocentricValue;
use PHPCoord\CoordinateOperation\GeographicValue;
use PHPCoord\CoordinateReferenceSystem\Geographic;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateSystem\Axis;
use PHPCoord\Datum\Ellipsoid;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\Exception\UnknownAxisException;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Scale\Scale;
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;
use TypeError;

/**
 * Coordinate representing a point on an ellipsoid.
 */
class GeographicPoint extends Point
{
    /**
     * Latitude.
     * @var Angle
     */
    protected $latitude;

    /**
     * Longitude.
     * @var Angle
     */
    protected $longitude;

    /**
     * Height above ellipsoid (N.B. *not* height above ground, sea-level or anything else tangible).
     * @var ?Length
     */
    protected $height;

    /**
     * Coordinate reference system.
     * @var Geographic
     */
    protected $crs;

    /**
     * Coordinate epoch (date for which the specified coordinates represented this point).
     * @var DateTimeImmutable
     */
    protected $epoch;

    protected function __construct(Angle $latitude, Angle $longitude, ?Length $height, Geographic $crs, ?DateTimeInterface $epoch)
    {
        if (!$crs instanceof Geographic2D && !$crs instanceof Geographic3D) {
            throw new TypeError(sprintf("A geographic point must be associated with a geographic CRS, but a '%s' CRS was given", get_class($crs)));
        }

        if ($crs instanceof Geographic2D && $height !== null) {
            throw new InvalidCoordinateReferenceSystemException('A 2D geographic point must not include a height');
        }

        if ($crs instanceof Geographic3D && $height === null) {
            throw new InvalidCoordinateReferenceSystemException('A 3D geographic point must include a height, none given');
        }

        $this->crs = $crs;

        $this->latitude = UnitOfMeasureFactory::convertAngle($latitude, $this->getAxisByName(Axis::GEODETIC_LATITUDE)->getUnitOfMeasureId());
        $this->longitude = UnitOfMeasureFactory::convertAngle($longitude, $this->getAxisByName(Axis::GEODETIC_LONGITUDE)->getUnitOfMeasureId());

        if ($height) {
            $this->height = UnitOfMeasureFactory::convertLength($height, $this->getAxisByName(Axis::ELLIPSOIDAL_HEIGHT)->getUnitOfMeasureId());
        }

        if ($epoch instanceof DateTime) {
            $epoch = DateTimeImmutable::createFromMutable($epoch);
        }
        if ($epoch) {
            $this->epoch = $epoch;
        }
    }

    /**
     * @param Angle   $latitude  refer to CRS for preferred unit of measure, but any angle unit accepted
     * @param Angle   $longitude refer to CRS for preferred unit of measure, but any angle unit accepted
     * @param ?Length $height    refer to CRS for preferred unit of measure, but any length unit accepted
     */
    public static function create(Angle $latitude, Angle $longitude, ?Length $height, Geographic $crs, ?DateTimeInterface $epoch = null): self
    {
        return new static($latitude, $longitude, $height, $crs, $epoch);
    }

    public function getLatitude(): Angle
    {
        return $this->latitude;
    }

    public function getLongitude(): Angle
    {
        return $this->longitude;
    }

    public function getHeight(): ?Length
    {
        return $this->height;
    }

    public function getCRS(): Geographic
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
        if ($to->getCRS()->getEpsgCode() !== $this->crs->getEpsgCode()) {
            throw new InvalidArgumentException('Can only calculate distances between two points in the same CRS');
        }

        //Mean radius definition taken from Wikipedia
        /** @var Ellipsoid $ellipsoid */
        $ellipsoid = $this->getCRS()->getDatum()->getEllipsoid();
        $radius = ((2 * $ellipsoid->getSemiMajorAxis()->asMetres()->getValue()) + $ellipsoid->getSemiMinorAxis()->asMetres()->getValue()) / 3;

        return new Metre(acos(sin($this->latitude->asRadians()->getValue()) * sin($to->latitude->asRadians()->getValue()) + cos($this->latitude->asRadians()->getValue()) * cos($to->latitude->asRadians()->getValue()) * cos($to->longitude->asRadians()->getValue() - $this->longitude->asRadians()->getValue())) * $radius);
    }

    public function __toString(): string
    {
        $values = [];
        foreach ($this->getCRS()->getCoordinateSystem()->getAxes() as $axis) {
            if ($axis->getName() === Axis::GEODETIC_LATITUDE) {
                $values[] = $this->latitude;
            } elseif ($axis->getName() === Axis::GEODETIC_LONGITUDE) {
                $values[] = $this->longitude;
            } elseif ($axis->getName() === Axis::ELLIPSOIDAL_HEIGHT) {
                $values[] = $this->height;
            } else {
                throw new UnknownAxisException(); // @codeCoverageIgnore
            }
        }

        return '(' . implode(', ', $values) . ')';
    }

    /**
     * Coordinate Frame rotation (geog2D/geog3D domain)
     * Note the analogy with the Position Vector tfm (codes 9606/1037) but beware of the differences!  The Position Vector
     * convention is used by IAG and recommended by ISO 19111. See methods 1032/1038/9607 for similar tfms operating
     * between other CRS types.
     */
    public function coordinateFrameRotation(
        Geographic $to,
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
     * Molodensky-Badekas (CF geog2D/geog3D domain)
     * See method codes 1034 and 1039/9636 for this operation in other coordinate domains and method code 1062/1063 for the
     * opposite rotation convention in geographic 2D domain.
     */
    public function coordinateFrameMolodenskyBadekas(
        Geographic $to,
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
        $geographicValue = new GeographicValue($this->latitude, $this->longitude, $this->height, $this->crs->getDatum());
        $asGeocentric = $geographicValue->asGeocentricValue();

        $xs = $asGeocentric->getX()->asMetres()->getValue();
        $ys = $asGeocentric->getY()->asMetres()->getValue();
        $zs = $asGeocentric->getZ()->asMetres()->getValue();
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
        $newGeocentric = new GeocentricValue(new Metre($xt), new Metre($yt), new Metre($zt), $to->getDatum());
        $newGeographic = $newGeocentric->asGeographicValue();

        return static::create($newGeographic->getLatitude(), $newGeographic->getLongitude(), $to instanceof Geographic3D ? $newGeographic->getHeight() : null, $to, $this->epoch);
    }

    /**
     * Position Vector transformation (geog2D/geog3D domain)
     * Note the analogy with the Coordinate Frame rotation (code 9607/1038) but beware of the differences!  The Position
     * Vector convention is used by IAG and recommended by ISO 19111. See methods 1033/1037/9606 for similar tfms
     * operating between other CRS types.
     */
    public function positionVectorTransformation(
        Geographic $to,
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
     * Molodensky-Badekas (PV geog2D/geog3D domain)
     * See method codes 1061 and 1062/1063 for this operation in other coordinate domains and method code 1039/9636 for opposite
     * rotation in geographic 2D/3D domain.
     */
    public function positionVectorMolodenskyBadekas(
        Geographic $to,
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
        $geographicValue = new GeographicValue($this->latitude, $this->longitude, $this->height, $this->crs->getDatum());
        $asGeocentric = $geographicValue->asGeocentricValue();

        $xs = $asGeocentric->getX()->asMetres()->getValue();
        $ys = $asGeocentric->getY()->asMetres()->getValue();
        $zs = $asGeocentric->getZ()->asMetres()->getValue();
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
        $newGeocentric = new GeocentricValue(new Metre($xt), new Metre($yt), new Metre($zt), $to->getDatum());
        $newGeographic = $newGeocentric->asGeographicValue();

        return static::create($newGeographic->getLatitude(), $newGeographic->getLongitude(), $to instanceof Geographic3D ? $newGeographic->getHeight() : null, $to, $this->epoch);
    }
}
