<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use function abs;
use function asinh;
use function atan;
use function atan2;
use function atanh;
use function cos;
use function cosh;
use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use function get_class;
use function hypot;
use function implode;
use function is_nan;
use function log;
use const M_E;
use const M_PI;
use function max;
use PHPCoord\CoordinateOperation\AutoConversion;
use PHPCoord\CoordinateOperation\ComplexNumber;
use PHPCoord\CoordinateOperation\ConvertiblePoint;
use PHPCoord\CoordinateOperation\GeocentricValue;
use PHPCoord\CoordinateOperation\GeographicValue;
use PHPCoord\CoordinateOperation\NADCON5Grid;
use PHPCoord\CoordinateOperation\NTv2Grid;
use PHPCoord\CoordinateOperation\OSTNOSGM15Grid;
use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateReferenceSystem\Geographic;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\CoordinateSystem\Axis;
use PHPCoord\CoordinateSystem\Cartesian;
use PHPCoord\Datum\Datum;
use PHPCoord\Datum\Ellipsoid;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\Exception\UnknownAxisException;
use PHPCoord\Geometry\BoundingArea;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Angle\ArcSecond;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Scale\Coefficient;
use PHPCoord\UnitOfMeasure\Scale\Scale;
use PHPCoord\UnitOfMeasure\Scale\Unity;
use function sin;
use function sinh;
use function sprintf;
use function sqrt;
use function tan;
use TypeError;

/**
 * Coordinate representing a point on an ellipsoid.
 */
class GeographicPoint extends Point implements ConvertiblePoint
{
    use AutoConversion;

    /**
     * Latitude.
     */
    protected Angle $latitude;

    /**
     * Longitude.
     */
    protected Angle $longitude;

    /**
     * Height above ellipsoid (N.B. *not* height above ground, sea-level or anything else tangible).
     */
    protected ?Length $height;

    /**
     * Coordinate reference system.
     */
    protected Geographic $crs;

    /**
     * Coordinate epoch (date for which the specified coordinates represented this point).
     */
    protected ?DateTimeImmutable $epoch;

    protected function __construct(Angle $latitude, Angle $longitude, ?Length $height, Geographic $crs, ?DateTimeInterface $epoch = null)
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

        $latitude = $this->normaliseLatitude($latitude);
        $longitude = $this->normaliseLongitude($longitude);

        $this->latitude = $latitude::convert($latitude, $this->crs->getCoordinateSystem()->getAxisByName(Axis::GEODETIC_LATITUDE)->getUnitOfMeasureId());
        $this->longitude = $longitude::convert($longitude, $this->crs->getCoordinateSystem()->getAxisByName(Axis::GEODETIC_LONGITUDE)->getUnitOfMeasureId());

        if ($height) {
            $this->height = $height::convert($height, $this->crs->getCoordinateSystem()->getAxisByName(Axis::ELLIPSOIDAL_HEIGHT)->getUnitOfMeasureId());
        } else {
            $this->height = null;
        }

        if ($epoch instanceof DateTime) {
            $epoch = DateTimeImmutable::createFromMutable($epoch);
        }
        $this->epoch = $epoch;
    }

    /**
     * @param Angle   $latitude  refer to CRS for preferred unit of measure, but any angle unit accepted
     * @param Angle   $longitude refer to CRS for preferred unit of measure, but any angle unit accepted
     * @param ?Length $height    refer to CRS for preferred unit of measure, but any length unit accepted
     */
    public static function create(Angle $latitude, Angle $longitude, ?Length $height = null, Geographic $crs, ?DateTimeInterface $epoch = null): self
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

    protected function normaliseLatitude(Angle $latitude): Angle
    {
        if ($latitude->asDegrees()->getValue() > 90) {
            return new Degree(90);
        }
        if ($latitude->asDegrees()->getValue() < -90) {
            return new Degree(-90);
        }

        return $latitude;
    }

    protected function normaliseLongitude(Angle $longitude): Angle
    {
        while ($longitude->asDegrees()->getValue() > 180) {
            $longitude = $longitude->subtract(new Degree(360));
        }
        while ($longitude->asDegrees()->getValue() <= -180) {
            $longitude = $longitude->add(new Degree(360));
        }

        return $longitude;
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

            /* @var GeographicPoint $to */
            return static::vincenty($this->asGeographicValue(), $to->asGeographicValue(), $this->getCRS()->getDatum()->getEllipsoid());
        }
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
     * Geographic/geocentric conversions
     * In applications it is often concatenated with the 3- 7- or 10-parameter transformations 9603, 9606, 9607 or
     * 9636 to form a geographic to geographic transformation.
     */
    public function geographicGeocentric(
        Geocentric $to
    ): GeocentricPoint {
        $geographicValue = new GeographicValue($this->latitude, $this->longitude, $this->height, $this->crs->getDatum());
        $asGeocentric = $geographicValue->asGeocentricValue();

        return GeocentricPoint::create($asGeocentric->getX(), $asGeocentric->getY(), $asGeocentric->getZ(), $to, $this->epoch);
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

    /**
     * Geocentric translations
     * This method allows calculation of geocentric coords in the target system by adding the parameter values to the
     * corresponding coordinates of the point in the source system. See methods 1031 and 1035 for similar tfms
     * operating between other CRSs types.
     */
    public function geocentricTranslation(
        Geographic $to,
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
     * Abridged Molodensky
     * This transformation is a truncated Taylor series expansion of a transformation between two geographic coordinate
     * systems, modelled as a set of geocentric translations.
     */
    public function abridgedMolodensky(
        Geographic $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation,
        Length $differenceInSemiMajorAxis,
        Scale $differenceInFlattening
    ): self {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $longitude = $this->longitude->asRadians()->getValue();
        $fromHeight = $this->height ? $this->height->asMetres()->getValue() : 0;
        $tx = $xAxisTranslation->asMetres()->getValue();
        $ty = $yAxisTranslation->asMetres()->getValue();
        $tz = $zAxisTranslation->asMetres()->getValue();
        $da = $differenceInSemiMajorAxis->asMetres()->getValue();
        $df = $differenceInFlattening->asUnity()->getValue();

        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e2 = $ellipsoid->getEccentricitySquared();

        $rho = $a * (1 - $e2) / (1 - $e2 * sin($latitude) ** 2) ** (3 / 2);
        $nu = $a / sqrt(1 - $e2 * (sin($latitude) ** 2));

        $f = $ellipsoid->getInverseFlattening();

        $dLatitude = ((-$tx * sin($latitude) * cos($longitude)) - ($ty * sin($latitude) * sin($longitude)) + ($tz * cos($latitude)) + ((($a * $df) + ($ellipsoid->getInverseFlattening() * $da)) * sin(2 * $latitude))) / ($rho * sin((new ArcSecond(1))->asRadians()->getValue()));
        $dLongitude = (-$tx * sin($longitude) + $ty * cos($longitude)) / (($nu * cos($latitude)) * sin((new ArcSecond(1))->asRadians()->getValue()));
        $dHeight = ($tx * cos($latitude) * cos($longitude)) + ($ty * cos($latitude) * sin($longitude)) + ($tz * sin($latitude)) + (($a * $df + $f * $da) * (sin($latitude) ** 2)) - $da;

        $toLatitude = $latitude + (new ArcSecond($dLatitude))->asRadians()->getValue();
        $toLongitude = $longitude + (new ArcSecond($dLongitude))->asRadians()->getValue();
        $toHeight = $fromHeight + $dHeight;

        return static::create(new Radian($toLatitude), new Radian($toLongitude), $to instanceof Geographic3D ? new Metre($toHeight) : null, $to, $this->epoch);
    }

    /**
     * Molodensky
     * See Abridged Molodensky.
     */
    public function molodensky(
        Geographic $to,
        Length $xAxisTranslation,
        Length $yAxisTranslation,
        Length $zAxisTranslation,
        Length $differenceInSemiMajorAxis,
        Scale $differenceInFlattening
    ): self {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $longitude = $this->longitude->asRadians()->getValue();
        $fromHeight = $this->height ? $this->height->asMetres()->getValue() : 0;
        $tx = $xAxisTranslation->asMetres()->getValue();
        $ty = $yAxisTranslation->asMetres()->getValue();
        $tz = $zAxisTranslation->asMetres()->getValue();
        $da = $differenceInSemiMajorAxis->asMetres()->getValue();
        $df = $differenceInFlattening->asUnity()->getValue();

        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $b = $ellipsoid->getSemiMinorAxis()->asMetres()->getValue();
        $e2 = $ellipsoid->getEccentricitySquared();

        $rho = $a * (1 - $e2) / (1 - $e2 * sin($latitude) ** 2) ** (3 / 2);
        $nu = $a / sqrt(1 - $e2 * (sin($latitude) ** 2));

        $f = $ellipsoid->getInverseFlattening();

        $dLatitude = ((-$tx * sin($latitude) * cos($longitude)) - ($ty * sin($latitude) * sin($longitude)) + ($tz * cos($latitude)) + ($da * ($nu * $e2 * sin($latitude) * cos($latitude)) / $a + $df * ($rho * ($a / $b) + $nu * ($b / $a)) * sin($latitude) * cos($latitude))) / (($rho + $fromHeight) * sin((new ArcSecond(1))->asRadians()->getValue()));
        $dLongitude = (-$tx * sin($longitude) + $ty * cos($longitude)) / ((($nu + $fromHeight) * cos($latitude)) * sin((new ArcSecond(1))->asRadians()->getValue()));
        $dHeight = ($tx * cos($latitude) * cos($longitude)) + ($ty * cos($latitude) * sin($longitude)) + ($tz * sin($latitude)) - $da * $a / $nu + $df * $b / $a * $nu * sin($latitude) ** 2;

        $toLatitude = $latitude + (new ArcSecond($dLatitude))->asRadians()->getValue();
        $toLongitude = $longitude + (new ArcSecond($dLongitude))->asRadians()->getValue();
        $toHeight = $fromHeight + $dHeight;

        return static::create(new Radian($toLatitude), new Radian($toLongitude), $to instanceof Geographic3D ? new Metre($toHeight) : null, $to, $this->epoch);
    }

    /**
     * Albers Equal Area.
     */
    public function albersEqualArea(
        Projected $to,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Angle $latitudeOf1stStandardParallel,
        Angle $latitudeOf2ndStandardParallel,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $longitude = $this->longitude->asRadians()->getValue();
        $phiOrigin = $latitudeOfFalseOrigin->asRadians()->getValue();
        $phi1 = $latitudeOf1stStandardParallel->asRadians()->getValue();
        $phi2 = $latitudeOf2ndStandardParallel->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $centralMeridianFirstParallel = cos($phi1) / sqrt(1 - ($e2 * sin($phi1) ** 2));
        $centralMeridianSecondParallel = cos($phi2) / sqrt(1 - ($e2 * sin($phi2) ** 2));

        $alpha = (1 - $e2) * (sin($latitude) / (1 - $e2 * sin($latitude) ** 2) - (1 / 2 / $e) * log((1 - $e * sin($latitude)) / (1 + $e * sin($latitude))));
        $alphaOrigin = (1 - $e2) * (sin($phiOrigin) / (1 - $e2 * sin($phiOrigin) ** 2) - (1 / 2 / $e) * log((1 - $e * sin($phiOrigin)) / (1 + $e * sin($phiOrigin))));
        $alphaFirstParallel = (1 - $e2) * (sin($phi1) / (1 - $e2 * sin($phi1) ** 2) - (1 / 2 / $e) * log((1 - $e * sin($phi1)) / (1 + $e * sin($phi1))));
        $alphaSecondParallel = (1 - $e2) * (sin($phi2) / (1 - $e2 * sin($phi2) ** 2) - (1 / 2 / $e) * log((1 - $e * sin($phi2)) / (1 + $e * sin($phi2))));

        $n = ($centralMeridianFirstParallel ** 2 - $centralMeridianSecondParallel ** 2) / ($alphaSecondParallel - $alphaFirstParallel);
        $C = $centralMeridianFirstParallel ** 2 + $n * $alphaFirstParallel;
        $theta = $n * $this->normaliseLongitude($this->longitude->subtract($longitudeOfFalseOrigin))->asRadians()->getValue();
        $rho = $a * sqrt($C - $n * $alpha) / $n;
        $rhoOrigin = ($a * sqrt($C - $n * $alphaOrigin)) / $n;

        $easting = $eastingAtFalseOrigin->asMetres()->getValue() + ($rho * sin($theta));
        $northing = $northingAtFalseOrigin->asMetres()->getValue() + $rhoOrigin - ($rho * cos($theta));

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * American Polyconic.
     */
    public function americanPolyconic(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;

        $M = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitude - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitude) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitude) - (35 * $e6 / 3072) * sin(6 * $latitude));
        $MO = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitudeOrigin - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitudeOrigin) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitudeOrigin) - (35 * $e6 / 3072) * sin(6 * $latitudeOrigin));

        if ($latitude === 0.0) {
            $easting = $falseEasting->asMetres()->getValue() + $a * $this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue();
            $northing = $falseNorthing->asMetres()->getValue() - $MO;
        } else {
            $L = $this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue() * sin($latitude);
            $nu = $a / sqrt(1 - $e2 * sin($latitude) ** 2);

            $easting = $falseEasting->asMetres()->getValue() + $nu * 1 / tan($latitude) * sin($L);
            $northing = $falseNorthing->asMetres()->getValue() + $M - $MO + $nu * 1 / tan($latitude) * (1 - cos($L));
        }

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Bonne.
     */
    public function bonne(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;

        $m = cos($latitude) / sqrt(1 - $e2 * sin($latitude) ** 2);
        $mO = cos($latitudeOrigin) / sqrt(1 - $e2 * sin($latitudeOrigin) ** 2);

        $M = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitude - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitude) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitude) - (35 * $e6 / 3072) * sin(6 * $latitude));
        $MO = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitudeOrigin - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitudeOrigin) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitudeOrigin) - (35 * $e6 / 3072) * sin(6 * $latitudeOrigin));

        $rho = $a * $mO / sin($latitudeOrigin) + $MO - $M;
        $tau = $a * $m * $this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue() / $rho;

        $easting = $falseEasting->asMetres()->getValue() + ($rho * sin($tau));
        $northing = $falseNorthing->asMetres()->getValue() + (($a * $mO / sin($latitudeOrigin) - $rho * cos($tau)));

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Bonne South Orientated.
     */
    public function bonneSouthOrientated(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;

        $m = cos($latitude) / sqrt(1 - $e2 * sin($latitude) ** 2);
        $mO = cos($latitudeOrigin) / sqrt(1 - $e2 * sin($latitudeOrigin) ** 2);

        $M = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitude - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitude) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitude) - (35 * $e6 / 3072) * sin(6 * $latitude));
        $MO = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitudeOrigin - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitudeOrigin) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitudeOrigin) - (35 * $e6 / 3072) * sin(6 * $latitudeOrigin));

        $rho = $a * $mO / sin($latitudeOrigin) + $MO - $M;
        $tau = $a * $m * $this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue() / $rho;

        $westing = $falseEasting->asMetres()->getValue() - ($rho * sin($tau));
        $southing = $falseNorthing->asMetres()->getValue() - (($a * $mO / sin($latitudeOrigin) - $rho * cos($tau)));

        return ProjectedPoint::create(new Metre(-$westing), new Metre(-$southing), new Metre($westing), new Metre($southing), $to, $this->epoch);
    }

    /**
     * Cassini-Soldner.
     */
    public function cassiniSoldner(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;

        $M = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitude - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitude) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitude) - (35 * $e6 / 3072) * sin(6 * $latitude));
        $MO = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitudeOrigin - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitudeOrigin) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitudeOrigin) - (35 * $e6 / 3072) * sin(6 * $latitudeOrigin));

        $A = $this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue() * cos($latitude);
        $T = tan($latitude) ** 2;
        $C = $e2 * cos($latitude) ** 2 / (1 - $e2);
        $nu = $a / sqrt(1 - $e2 * (sin($latitude) ** 2));
        $X = $M - $MO + $nu * tan($latitude) * ($A ** 2 / 2 + (5 - $T + 6 * $C) * $A ** 4 / 24);

        $easting = $falseEasting->asMetres()->getValue() + $nu * ($A - $T * $A ** 3 / 6 - (8 - $T + 8 * $C) * $T * $A ** 5 / 120);
        $northing = $falseNorthing->asMetres()->getValue() + $X;

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Hyperbolic Cassini-Soldner.
     */
    public function hyperbolicCassiniSoldner(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;

        $M = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitude - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitude) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitude) - (35 * $e6 / 3072) * sin(6 * $latitude));
        $MO = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitudeOrigin - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitudeOrigin) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitudeOrigin) - (35 * $e6 / 3072) * sin(6 * $latitudeOrigin));

        $A = $this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue() * cos($latitude);
        $T = tan($latitude) ** 2;
        $C = $e2 * cos($latitude) ** 2 / (1 - $e2);
        $nu = $a / sqrt(1 - $e2 * (sin($latitude) ** 2));
        $rho = $a * (1 - $e2) / (1 - $e2 * sin($latitude) ** 2) ** (3 / 2);
        $X = $M - $MO + $nu * tan($latitude) * ($A ** 2 / 2 + (5 - $T + 6 * $C) * $A ** 4 / 24);

        $easting = $falseEasting->asMetres()->getValue() + $nu * ($A - $T * $A ** 3 / 6 - (8 - $T + 8 * $C) * $T * $A ** 5 / 120);
        $northing = $falseNorthing->asMetres()->getValue() + $X - ($X ** 3 / (6 * $rho * $nu));

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Colombia Urban.
     */
    public function columbiaUrban(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing,
        Length $projectionPlaneOriginHeight
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $heightOrigin = $projectionPlaneOriginHeight->asMetres()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e2 = $ellipsoid->getEccentricitySquared();

        $rhoOrigin = $a * (1 - $e2) / (1 - $e2 * sin($latitudeOrigin) ** 2) ** (3 / 2);
        $rhoMid = $a * (1 - $e2) / (1 - $e2 * sin(($latitude + $latitudeOrigin) / 2) ** 2) ** (3 / 2);

        $nu = $a / sqrt(1 - $e2 * (sin($latitude) ** 2));
        $nuOrigin = $a / sqrt(1 - $e2 * (sin($latitudeOrigin) ** 2));

        $A = 1 + $heightOrigin / $nuOrigin;
        $B = tan($latitudeOrigin) / (2 * $rhoOrigin * $nuOrigin);
        $G = 1 + $heightOrigin / $rhoMid;

        $easting = $falseEasting->asMetres()->getValue() + $A * $nu * cos($latitude) * $this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue();
        $northing = $falseNorthing->asMetres()->getValue() + $G * $rhoOrigin * (($latitude - $latitudeOrigin) + ($B * $this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue() ** 2 * $nu ** 2 * cos($latitude) ** 2));

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Equal Earth.
     */
    public function equalEarth(
        Projected $to,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $q = (1 - $e2) * ((sin($latitude) / (1 - $e2 * sin($latitude) ** 2)) - (1 / (2 * $e) * log((1 - $e * sin($latitude)) / (1 + $e * sin($latitude)))));
        $qP = (1 - $e2) * ((1 / (1 - $e2)) - (1 / (2 * $e) * log((1 - $e) / (1 + $e))));
        $beta = self::asin($q / $qP);
        $theta = self::asin(sin($beta) * sqrt(3) / 2);
        $Rq = $a * sqrt($qP / 2);

        $easting = $falseEasting->asMetres()->getValue() + ($Rq * 2 * $this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue() * cos($theta)) / (sqrt(3) * (1.340264 - 0.243318 * $theta ** 2 + $theta ** 6 * (0.006251 + 0.034164 * $theta ** 2)));
        $northing = $falseNorthing->asMetres()->getValue() + $Rq * $theta * (1.340264 - 0.081106 * $theta ** 2 + $theta ** 6 * (0.000893 + 0.003796 * $theta ** 2));

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Equidistant Cylindrical
     * See method code 1029 for spherical development. See also Pseudo Plate Carree, method code 9825.
     */
    public function equidistantCylindrical(
        Projected $to,
        Angle $latitudeOf1stStandardParallel,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $latitudeFirstParallel = $latitudeOf1stStandardParallel->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;
        $e8 = $e ** 8;
        $e10 = $e ** 10;
        $e12 = $e ** 12;
        $e14 = $e ** 14;

        $nu1 = $a / sqrt(1 - $e2 * sin($latitudeFirstParallel) ** 2);

        $M = $a * (
            (1 - 1 / 4 * $e2 - 3 / 64 * $e4 - 5 / 256 * $e6 - 175 / 16384 * $e8 - 441 / 65536 * $e10 - 4851 / 1048576 * $e12 - 14157 / 4194304 * $e14) * $latitude +
            (-3 / 8 * $e2 - 3 / 32 * $e4 - 45 / 1024 * $e6 - 105 / 4096 * $e8 - 2205 / 131072 * $e10 - 6237 / 524288 * $e12 - 297297 / 33554432 * $e14) * sin(2 * $latitude) +
            (15 / 256 * $e4 + 45 / 1024 * $e ** 6 + 525 / 16384 * $e ** 8 + 1575 / 65536 * $e10 + 155925 / 8388608 * $e12 + 495495 / 33554432 * $e14) * sin(4 * $latitude) +
            (-35 / 3072 * $e6 - 175 / 12288 * $e8 - 3675 / 262144 * $e10 - 13475 / 1048576 * $e12 - 385385 / 33554432 * $e14) * sin(6 * $latitude) +
            (315 / 131072 * $e8 + 2205 / 524288 * $e10 + 43659 / 8388608 * $e12 + 189189 / 33554432 * $e14) * sin(8 * $latitude) +
            (-693 / 1310720 * $e10 - 6537 / 5242880 * $e12 - 297297 / 167772160 * $e14) * sin(10 * $latitude) +
            (1001 / 8388608 * $e12 + 11011 / 33554432 * $e14) * sin(12 * $latitude) +
            (-6435 / 234881024 * $e ** 14) * sin(14 * $latitude)
        );

        $easting = $falseEasting->asMetres()->getValue() + $nu1 * cos($latitudeFirstParallel) * $this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue();
        $northing = $falseNorthing->asMetres()->getValue() + $M;

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Guam Projection
     * Simplified form of Oblique Azimuthal Equidistant projection method.
     */
    public function guamProjection(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;

        $M = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitude - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitude) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitude) - (35 * $e6 / 3072) * sin(6 * $latitude));
        $MO = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitudeOrigin - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitudeOrigin) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitudeOrigin) - (35 * $e6 / 3072) * sin(6 * $latitudeOrigin));
        $x = ($a * $this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue() * cos($latitude)) / sqrt(1 - $e2 * sin($latitude) ** 2);

        $easting = $falseEasting->asMetres()->getValue() + $x;
        $northing = $falseNorthing->asMetres()->getValue() + $M - $MO + ($x ** 2 * tan($latitude) * sqrt(1 - $e2 * sin($latitude) ** 2) / (2 * $a));

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Krovak.
     */
    public function krovak(
        Projected $to,
        Angle $latitudeOfProjectionCentre,
        Angle $longitudeOfOrigin,
        Angle $coLatitudeOfConeAxis,
        Angle $latitudeOfPseudoStandardParallel,
        Scale $scaleFactorOnPseudoStandardParallel,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $longitudeOffset = $to->getDatum()->getPrimeMeridian()->getGreenwichLongitude()->asRadians()->getValue() - $this->getCRS()->getDatum()->getPrimeMeridian()->getGreenwichLongitude()->asRadians()->getValue();
        $latitude = $this->latitude->asRadians()->getValue();
        $longitude = $this->longitude->asRadians()->getValue() - $longitudeOffset;
        $latitudeC = $latitudeOfProjectionCentre->asRadians()->getValue();
        $longitudeO = $longitudeOfOrigin->asRadians()->getValue();
        $alphaC = $coLatitudeOfConeAxis->asRadians()->getValue();
        $latitudeP = $latitudeOfPseudoStandardParallel->asRadians()->getValue();
        $kP = $scaleFactorOnPseudoStandardParallel->asUnity()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $A = $a * sqrt(1 - $e2) / (1 - $e2 * sin($latitudeC) ** 2);
        $B = sqrt(1 + $e2 * cos($latitudeC) ** 4 / (1 - $e2));
        $upsilonO = self::asin(sin($latitudeC) / $B);
        $tO = tan(M_PI / 4 + $upsilonO / 2) * ((1 + $e * sin($latitudeC)) / (1 - $e * sin($latitudeC))) ** ($e * $B / 2) / (tan(M_PI / 4 + $latitudeC / 2) ** $B);
        $n = sin($latitudeP);
        $rO = $kP * $A / tan($latitudeP);

        $U = 2 * (atan($tO * tan($latitude / 2 + M_PI / 4) ** $B / ((1 + $e * sin($latitude)) / (1 - $e * sin($latitude))) ** ($e * $B / 2)) - M_PI / 4);
        $V = $B * ($longitudeO - $longitude);
        $T = self::asin(cos($alphaC) * sin($U) + sin($alphaC) * cos($U) * cos($V));
        $D = atan2(cos($U) * sin($V) / cos($T), ((cos($alphaC) * sin($T) - sin($U)) / (sin($alphaC) * cos($T))));
        $theta = $n * $D;
        $r = $rO * tan(M_PI / 4 + $latitudeP / 2) ** $n / tan($T / 2 + M_PI / 4) ** $n;
        $X = $r * cos($theta);
        $Y = $r * sin($theta);

        $westing = $Y + $falseEasting->asMetres()->getValue();
        $southing = $X + $falseNorthing->asMetres()->getValue();

        return ProjectedPoint::create(new Metre(-$westing), new Metre(-$southing), new Metre($westing), new Metre($southing), $to, $this->epoch);
    }

    /**
     * Krovak Modified
     * Incorporates a polynomial transformation which is defined to be exact and for practical purposes is considered
     * to be a map projection.
     */
    public function krovakModified(
        Projected $to,
        Angle $latitudeOfProjectionCentre,
        Angle $longitudeOfOrigin,
        Angle $coLatitudeOfConeAxis,
        Angle $latitudeOfPseudoStandardParallel,
        Scale $scaleFactorOnPseudoStandardParallel,
        Length $falseEasting,
        Length $falseNorthing,
        Length $ordinate1OfEvaluationPoint,
        Length $ordinate2OfEvaluationPoint,
        Coefficient $C1,
        Coefficient $C2,
        Coefficient $C3,
        Coefficient $C4,
        Coefficient $C5,
        Coefficient $C6,
        Coefficient $C7,
        Coefficient $C8,
        Coefficient $C9,
        Coefficient $C10
    ): ProjectedPoint {
        $asKrovak = $this->krovak($to, $latitudeOfProjectionCentre, $longitudeOfOrigin, $coLatitudeOfConeAxis, $latitudeOfPseudoStandardParallel, $scaleFactorOnPseudoStandardParallel, new Metre(0), new Metre(0));

        $westing = $asKrovak->getWesting()->asMetres()->getValue();
        $southing = $asKrovak->getSouthing()->asMetres()->getValue();
        $c1 = $C1->asUnity()->getValue();
        $c2 = $C2->asUnity()->getValue();
        $c3 = $C3->asUnity()->getValue();
        $c4 = $C4->asUnity()->getValue();
        $c5 = $C5->asUnity()->getValue();
        $c6 = $C6->asUnity()->getValue();
        $c7 = $C7->asUnity()->getValue();
        $c8 = $C8->asUnity()->getValue();
        $c9 = $C9->asUnity()->getValue();
        $c10 = $C10->asUnity()->getValue();

        $Xr = $southing - $ordinate1OfEvaluationPoint->asMetres()->getValue();
        $Yr = $westing - $ordinate2OfEvaluationPoint->asMetres()->getValue();

        $dX = $c1 + $c3 * $Xr - $c4 * $Yr - 2 * $c6 * $Xr * $Yr + $c5 * ($Xr ** 2 - $Yr ** 2) + $c7 * $Xr * ($Xr ** 2 - 3 * $Yr ** 2) - $c8 * $Yr * (3 * $Xr ** 2 - $Yr ** 2) + 4 * $c9 * $Xr * $Yr * ($Xr ** 2 - $Yr ** 2) + $c10 * ($Xr ** 4 + $Yr ** 4 - 6 * $Xr ** 2 * $Yr ** 2);
        $dY = $c2 + $c3 * $Yr + $c4 * $Xr + 2 * $c5 * $Xr * $Yr + $c6 * ($Xr ** 2 - $Yr ** 2) + $c8 * $Xr * ($Xr ** 2 - 3 * $Yr ** 2) + $c7 * $Yr * (3 * $Xr ** 2 - $Yr ** 2) - 4 * $c10 * $Xr * $Yr * ($Xr ** 2 - $Yr ** 2) + $c9 * ($Xr ** 4 + $Yr ** 4 - 6 * $Xr ** 2 * $Yr ** 2);

        $westing += $falseEasting->asMetres()->getValue() - $dY;
        $southing += $falseNorthing->asMetres()->getValue() - $dX;

        return ProjectedPoint::create(new Metre(-$westing), new Metre(-$southing), new Metre($westing), new Metre($southing), $to, $this->epoch);
    }

    /**
     * Lambert Azimuthal Equal Area
     * This is the ellipsoidal form of the projection.
     */
    public function lambertAzimuthalEqualArea(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $q = (1 - $e2) * ((sin($latitude) / (1 - $e2 * sin($latitude) ** 2)) - ((1 / (2 * $e)) * log((1 - $e * sin($latitude)) / (1 + $e * sin($latitude)))));
        $qO = (1 - $e2) * ((sin($latitudeOrigin) / (1 - $e2 * sin($latitudeOrigin) ** 2)) - ((1 / (2 * $e)) * log((1 - $e * sin($latitudeOrigin)) / (1 + $e * sin($latitudeOrigin)))));
        $qP = (1 - $e2) * ((1 / (1 - $e2)) - ((1 / (2 * $e)) * log((1 - $e) / (1 + $e))));
        $beta = self::asin($q / $qP);
        $betaO = self::asin($qO / $qP);
        $Rq = $a * sqrt($qP / 2);
        $B = $Rq * sqrt(2 / (1 + sin($betaO) * sin($beta) + (cos($betaO) * cos($beta) * cos($this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue()))));
        $D = $a * (cos($latitudeOrigin) / sqrt(1 - $e2 * sin($latitudeOrigin) ** 2)) / ($Rq * cos($betaO));

        $easting = $falseEasting->asMetres()->getValue() + (($B * $D) * (cos($beta) * sin($this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue())));
        $northing = $falseNorthing->asMetres()->getValue() + ($B / $D) * ((cos($betaO) * sin($beta)) - (sin($betaO) * cos($beta) * cos($this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue())));

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Lambert Azimuthal Equal Area (Spherical)
     * This is the spherical form of the projection.  See coordinate operation method Lambert Azimuthal Equal Area
     * (code 9820) for ellipsoidal form.  Differences of several tens of metres result from comparison of the two
     * methods.
     */
    public function lambertAzimuthalEqualAreaSpherical(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();

        $k = sqrt(2 / (1 + sin($latitudeOrigin) * sin($latitude) + cos($latitudeOrigin) * cos($latitude) * cos($this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue())));

        $easting = $falseEasting->asMetres()->getValue() + ($a * $k * cos($latitude) * sin($this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue()));
        $northing = $falseNorthing->asMetres()->getValue() + ($a * $k * (cos($latitudeOrigin) * sin($latitude) - sin($latitudeOrigin) * cos($latitude) * cos($this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue())));

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Lambert Conic Conformal (1SP).
     */
    public function lambertConicConformal1SP(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $kO = $scaleFactorAtNaturalOrigin->asUnity()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $mO = cos($latitudeOrigin) / sqrt(1 - $e2 * sin($latitudeOrigin) ** 2);
        $tO = tan(M_PI / 4 - $latitudeOrigin / 2) / ((1 - $e * sin($latitudeOrigin)) / (1 + $e * sin($latitudeOrigin))) ** ($e / 2);
        $t = tan(M_PI / 4 - $latitude / 2) / ((1 - $e * sin($latitude)) / (1 + $e * sin($latitude))) ** ($e / 2);
        $n = sin($latitudeOrigin);
        $F = $mO / ($n * $tO ** $n);
        $rO = $a * $F * $tO ** $n * $kO;
        $r = $a * $F * $t ** $n * $kO;
        $theta = $n * $this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue();

        $easting = $falseEasting->asMetres()->getValue() + $r * sin($theta);
        $northing = $falseNorthing->asMetres()->getValue() + $rO - $r * cos($theta);

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Lambert Conic Conformal (1SP) Variant B.
     */
    public function lambertConicConformal1SPVariantB(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $latitudeNaturalOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $latitudeFalseOrigin = $latitudeOfFalseOrigin->asRadians()->getValue();
        $kO = $scaleFactorAtNaturalOrigin->asUnity()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $mO = cos($latitudeNaturalOrigin) / sqrt(1 - $e2 * sin($latitudeNaturalOrigin) ** 2);
        $tO = tan(M_PI / 4 - $latitudeNaturalOrigin / 2) / ((1 - $e * sin($latitudeNaturalOrigin)) / (1 + $e * sin($latitudeNaturalOrigin))) ** ($e / 2);
        $tF = tan(M_PI / 4 - $latitudeFalseOrigin / 2) / ((1 - $e * sin($latitudeFalseOrigin)) / (1 + $e * sin($latitudeFalseOrigin))) ** ($e / 2);
        $t = tan(M_PI / 4 - $latitude / 2) / ((1 - $e * sin($latitude)) / (1 + $e * sin($latitude))) ** ($e / 2);
        $n = sin($latitudeNaturalOrigin);
        $F = $mO / ($n * $tO ** $n);
        $rF = $a * $F * $tF ** $n * $kO;
        $r = $a * $F * $t ** $n * $kO;
        $theta = $n * $this->normaliseLongitude($this->longitude->subtract($longitudeOfFalseOrigin))->asRadians()->getValue();

        $easting = $eastingAtFalseOrigin->asMetres()->getValue() + $r * sin($theta);
        $northing = $northingAtFalseOrigin->asMetres()->getValue() + $rF - $r * cos($theta);

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Lambert Conic Conformal (2SP Belgium)
     * In 2000 this modification was replaced through use of the regular Lambert Conic Conformal (2SP) method [9802]
     * with appropriately modified parameter values.
     */
    public function lambertConicConformal2SPBelgium(
        Projected $to,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Angle $latitudeOf1stStandardParallel,
        Angle $latitudeOf2ndStandardParallel,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $phiF = $latitudeOfFalseOrigin->asRadians()->getValue();
        $phi1 = $latitudeOf1stStandardParallel->asRadians()->getValue();
        $phi2 = $latitudeOf2ndStandardParallel->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $m1 = cos($phi1) / sqrt(1 - $e2 * sin($phi1) ** 2);
        $m2 = cos($phi2) / sqrt(1 - $e2 * sin($phi2) ** 2);
        $t = tan(M_PI / 4 - $latitude / 2) / ((1 - $e * sin($latitude)) / (1 + $e * sin($latitude))) ** ($e / 2);
        $t1 = tan(M_PI / 4 - $phi1 / 2) / ((1 - $e * sin($phi1)) / (1 + $e * sin($phi1))) ** ($e / 2);
        $t2 = tan(M_PI / 4 - $phi2 / 2) / ((1 - $e * sin($phi2)) / (1 + $e * sin($phi2))) ** ($e / 2);
        $tF = tan(M_PI / 4 - $phiF / 2) / ((1 - $e * sin($phiF)) / (1 + $e * sin($phiF))) ** ($e / 2);
        $n = (log($m1) - log($m2)) / (log($t1) - log($t2));
        $F = $m1 / ($n * $t1 ** $n);
        $r = $a * $F * $t ** $n;
        $rF = $a * $F * $tF ** $n;
        if (is_nan($rF)) {
            $rF = 0;
        }
        $theta = ($n * $this->normaliseLongitude($this->longitude->subtract($longitudeOfFalseOrigin))->asRadians()->getValue()) - (new ArcSecond(29.2985))->asRadians()->getValue();

        $easting = $eastingAtFalseOrigin->asMetres()->getValue() + $r * sin($theta);
        $northing = $northingAtFalseOrigin->asMetres()->getValue() + $rF - $r * cos($theta);

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Lambert Conic Conformal (2SP Michigan).
     */
    public function lambertConicConformal2SPMichigan(
        Projected $to,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Angle $latitudeOf1stStandardParallel,
        Angle $latitudeOf2ndStandardParallel,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin,
        Scale $ellipsoidScalingFactor
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $phiF = $latitudeOfFalseOrigin->asRadians()->getValue();
        $phi1 = $latitudeOf1stStandardParallel->asRadians()->getValue();
        $phi2 = $latitudeOf2ndStandardParallel->asRadians()->getValue();
        $K = $ellipsoidScalingFactor->asUnity()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $m1 = cos($phi1) / sqrt(1 - $e2 * sin($phi1) ** 2);
        $m2 = cos($phi2) / sqrt(1 - $e2 * sin($phi2) ** 2);
        $t = tan(M_PI / 4 - $latitude / 2) / ((1 - $e * sin($latitude)) / (1 + $e * sin($latitude))) ** ($e / 2);
        $t1 = tan(M_PI / 4 - $phi1 / 2) / ((1 - $e * sin($phi1)) / (1 + $e * sin($phi1))) ** ($e / 2);
        $t2 = tan(M_PI / 4 - $phi2 / 2) / ((1 - $e * sin($phi2)) / (1 + $e * sin($phi2))) ** ($e / 2);
        $tF = tan(M_PI / 4 - $phiF / 2) / ((1 - $e * sin($phiF)) / (1 + $e * sin($phiF))) ** ($e / 2);
        $n = (log($m1) - log($m2)) / (log($t1) - log($t2));
        $F = $m1 / ($n * $t1 ** $n);
        $r = $a * $K * $F * $t ** $n;
        $rF = $a * $K * $F * $tF ** $n;
        $theta = $n * $this->normaliseLongitude($this->longitude->subtract($longitudeOfFalseOrigin))->asRadians()->getValue();

        $easting = $eastingAtFalseOrigin->asMetres()->getValue() + $r * sin($theta);
        $northing = $northingAtFalseOrigin->asMetres()->getValue() + $rF - $r * cos($theta);

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Lambert Conic Conformal (2SP).
     */
    public function lambertConicConformal2SP(
        Projected $to,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Angle $latitudeOf1stStandardParallel,
        Angle $latitudeOf2ndStandardParallel,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $phiF = $latitudeOfFalseOrigin->asRadians()->getValue();
        $phi1 = $latitudeOf1stStandardParallel->asRadians()->getValue();
        $phi2 = $latitudeOf2ndStandardParallel->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $m1 = cos($phi1) / sqrt(1 - $e2 * sin($phi1) ** 2);
        $m2 = cos($phi2) / sqrt(1 - $e2 * sin($phi2) ** 2);
        $t = tan(M_PI / 4 - $latitude / 2) / ((1 - $e * sin($latitude)) / (1 + $e * sin($latitude))) ** ($e / 2);
        $t1 = tan(M_PI / 4 - $phi1 / 2) / ((1 - $e * sin($phi1)) / (1 + $e * sin($phi1))) ** ($e / 2);
        $t2 = tan(M_PI / 4 - $phi2 / 2) / ((1 - $e * sin($phi2)) / (1 + $e * sin($phi2))) ** ($e / 2);
        $tF = tan(M_PI / 4 - $phiF / 2) / ((1 - $e * sin($phiF)) / (1 + $e * sin($phiF))) ** ($e / 2);
        $n = (log($m1) - log($m2)) / (log($t1) - log($t2));
        $F = $m1 / ($n * $t1 ** $n);
        $r = $a * $F * $t ** $n;
        $rF = $a * $F * $tF ** $n;
        $theta = $n * $this->normaliseLongitude($this->longitude->subtract($longitudeOfFalseOrigin))->asRadians()->getValue();

        $easting = $eastingAtFalseOrigin->asMetres()->getValue() + $r * sin($theta);
        $northing = $northingAtFalseOrigin->asMetres()->getValue() + $rF - $r * cos($theta);

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Lambert Conic Conformal (West Orientated).
     */
    public function lambertConicConformalWestOrientated(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $kO = $scaleFactorAtNaturalOrigin->asUnity()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $mO = cos($latitudeOrigin) / sqrt(1 - $e2 * sin($latitudeOrigin) ** 2);
        $tO = tan(M_PI / 4 - $latitudeOrigin / 2) / ((1 - $e * sin($latitudeOrigin)) / (1 + $e * sin($latitudeOrigin))) ** ($e / 2);
        $t = tan(M_PI / 4 - $latitude / 2) / ((1 - $e * sin($latitude)) / (1 + $e * sin($latitude))) ** ($e / 2);
        $n = sin($latitudeOrigin);
        $F = $mO / ($n * $tO ** $n);
        $rO = $a * $F * $tO ** $n ** $kO;
        $r = $a * $F * $t ** $n ** $kO;
        $theta = $n * $this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue();

        $westing = $falseEasting->asMetres()->getValue() - $r * sin($theta);
        $northing = $falseNorthing->asMetres()->getValue() + $rO - $r * cos($theta);

        return ProjectedPoint::create(new Metre(-$westing), new Metre($northing), new Metre($westing), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Lambert Conic Near-Conformal
     * The Lambert Near-Conformal projection is derived from the Lambert Conformal Conic projection by truncating the
     * series expansion of the projection formulae.
     */
    public function lambertConicNearConformal(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $kO = $scaleFactorAtNaturalOrigin->asUnity()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e2 = $ellipsoid->getEccentricitySquared();
        $f = $ellipsoid->getInverseFlattening();

        $n = $f / (2 - $f);
        $rhoO = $a * (1 - $e2) / (1 - $e2 * sin($latitudeOrigin) ** 2) ** (3 / 2);
        $nuO = $a / sqrt(1 - $e2 * (sin($latitudeOrigin) ** 2));
        $A = 1 / (6 * $rhoO * $nuO);
        $APrime = $a * (1 - $n + 5 * ($n ** 2 - $n ** 3) / 4 + 81 * ($n ** 4 - $n ** 5) / 64);
        $BPrime = 3 * $a * ($n - $n ** 2 + 7 * ($n ** 3 - $n ** 4) / 8 + 55 * $n ** 5 / 64) / 2;
        $CPrime = 15 * $a * ($n ** 2 - $n ** 3 + 3 * ($n ** 4 - $n ** 5) / 4) / 16;
        $DPrime = 35 * $a * ($n ** 3 - $n ** 4 + 11 * $n ** 5 / 16) / 48;
        $EPrime = 315 * $a * ($n ** 4 - $n ** 5) / 512;
        $rO = $kO * $nuO / tan($latitudeOrigin);
        $sO = $APrime * $latitudeOrigin - $BPrime * sin(2 * $latitudeOrigin) + $CPrime * sin(4 * $latitudeOrigin) - $DPrime * sin(6 * $latitudeOrigin) + $EPrime * sin(8 * $latitudeOrigin);
        $s = $APrime * $latitude - $BPrime * sin(2 * $latitude) + $CPrime * sin(4 * $latitude) - $DPrime * sin(6 * $latitude) + $EPrime * sin(8 * $latitude);
        $m = $s - $sO;
        $M = $kO * ($m + $A * $m ** 3);
        $r = $rO - $M;
        $theta = $this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue() * sin($latitudeOrigin);

        $easting = $falseEasting->asMetres()->getValue() + $r * sin($theta);
        $northing = $falseNorthing->asMetres()->getValue() + $M + $r * sin($theta) * tan($theta / 2);

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Lambert Cylindrical Equal Area
     * This is the ellipsoidal form of the projection.
     */
    public function lambertCylindricalEqualArea(
        Projected $to,
        Angle $latitudeOf1stStandardParallel,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $latitudeFirstParallel = $latitudeOf1stStandardParallel->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $k = cos($latitudeFirstParallel) / sqrt(1 - $e2 * sin($latitudeFirstParallel) ** 2);
        $q = (1 - $e2) * ((sin($latitude) / (1 - $e2 * sin($latitude) ** 2)) - (1 / (2 * $e)) * log((1 - $e * sin($latitude)) / (1 + $e * sin($latitude))));

        $x = $a * $k * $this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue();
        $y = $a * $q / (2 * $k);

        $easting = $falseEasting->asMetres()->getValue() + $x;
        $northing = $falseNorthing->asMetres()->getValue() + $y;

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Modified Azimuthal Equidistant
     * Modified form of Oblique Azimuthal Equidistant projection method developed for Polynesian islands. For the
     * distances over which these projections are used (under 800km) this modification introduces no significant error.
     */
    public function modifiedAzimuthalEquidistant(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $nuO = $a / sqrt(1 - $e2 * sin($latitudeOrigin) ** 2);
        $nu = $a / sqrt(1 - $e2 * sin($latitude) ** 2);
        $psi = atan((1 - $e2) * tan($latitude) + ($e2 * $nuO * sin($latitudeOrigin)) / ($nu * cos($latitude)));
        $alpha = atan2(sin($this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue()), (cos($latitudeOrigin) * tan($psi) - sin($latitudeOrigin) * cos($this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue())));
        $G = $e * sin($latitudeOrigin) / sqrt(1 - $e2);
        $H = $e * cos($latitudeOrigin) * cos($alpha) / sqrt(1 - $e2);

        if (sin($alpha) === 0.0) {
            $s = self::asin(cos($latitudeOrigin) * sin($psi) - sin($latitudeOrigin) * cos($alpha)) * cos($alpha) / abs(cos($alpha));
        } else {
            $s = self::asin(sin($this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue()) * cos($psi) / sin($alpha));
        }

        $c = $nuO * $s * ((1 - $s ** 2 * $H ** 2 * (1 - $H ** 2) / 6) + (($s ** 3 / 8) * $G * $H * (1 - 2 * $H ** 2)) + ($s ** 4 / 120) * ($H ** 2 * (4 - 7 * $H ** 2) - 3 * $G ** 2 * (1 - 7 * $H ** 2)) - (($s ** 5 / 48) * $G * $H));

        $easting = $falseEasting->asMetres()->getValue() + $c * sin($alpha);
        $northing = $falseNorthing->asMetres()->getValue() + $c * cos($alpha);

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Oblique Stereographic
     * This is not the same as the projection method of the same name in USGS Professional Paper no. 1395, "Map
     * Projections - A Working Manual" by John P. Snyder.
     */
    public function obliqueStereographic(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $kO = $scaleFactorAtNaturalOrigin->asUnity()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $rhoOrigin = $a * (1 - $e2) / (1 - $e2 * sin($latitudeOrigin) ** 2) ** (3 / 2);
        $nuOrigin = $a / sqrt(1 - $e2 * (sin($latitudeOrigin) ** 2));
        $R = sqrt($rhoOrigin * $nuOrigin);

        $n = sqrt(1 + ($e2 * cos($latitudeOrigin) ** 4 / (1 - $e2)));
        $S1 = (1 + sin($latitudeOrigin)) / (1 - sin($latitudeOrigin));
        $S2 = (1 - $e * sin($latitudeOrigin)) / (1 + $e * sin($latitudeOrigin));
        $w1 = ($S1 * ($S2 ** $e)) ** $n;
        $c = (($n + sin($latitudeOrigin)) * (1 - ($w1 - 1) / ($w1 + 1))) / (($n - sin($latitudeOrigin)) * (1 + ($w1 - 1) / ($w1 + 1)));
        $w2 = $c * $w1;
        $chiOrigin = self::asin(($w2 - 1) / ($w2 + 1));

        $lambda = $n * $this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue() + $longitudeOrigin;

        $Sa = (1 + sin($latitude)) / (1 - sin($latitude));
        $Sb = (1 - $e * sin($latitude)) / (1 + $e * sin($latitude));
        $w = $c * ($Sa * ($Sb ** $e)) ** $n;
        $chi = self::asin(($w - 1) / ($w + 1));

        $B = (1 + sin($chi) * sin($chiOrigin) + cos($chi) * cos($chiOrigin) * cos($lambda - $longitudeOrigin));

        $easting = $falseEasting->asMetres()->getValue() + 2 * $R * $kO * cos($chi) * sin($lambda - $longitudeOrigin) / $B;
        $northing = $falseNorthing->asMetres()->getValue() + 2 * $R * $kO * (sin($chi) * cos($chiOrigin) - cos($chi) * sin($chiOrigin) * cos($lambda - $longitudeOrigin)) / $B;

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Polar Stereographic (variant A)
     * Latitude of natural origin must be either 90 degrees or -90 degrees (or equivalent in alternative angle unit).
     */
    public function polarStereographicVariantA(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $kO = $scaleFactorAtNaturalOrigin->asUnity()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();

        if ($latitudeOrigin < 0) {
            $t = tan(M_PI / 4 + $latitude / 2) / (((1 + $e * sin($latitude)) / (1 - $e * sin($latitude))) ** ($e / 2));
        } else {
            $t = tan(M_PI / 4 - $latitude / 2) * (((1 + $e * sin($latitude)) / (1 - $e * sin($latitude))) ** ($e / 2));
        }
        $rho = 2 * $a * $kO * $t / sqrt((1 + $e) ** (1 + $e) * (1 - $e) ** (1 - $e));

        $theta = $this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue();
        $dE = $rho * sin($theta);
        $dN = $rho * cos($theta);

        $easting = $falseEasting->asMetres()->getValue() + $dE;
        if ($latitudeOrigin < 0) {
            $northing = $falseNorthing->asMetres()->getValue() + $dN;
        } else {
            $northing = $falseNorthing->asMetres()->getValue() - $dN;
        }

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Polar Stereographic (variant B).
     */
    public function polarStereographicVariantB(
        Projected $to,
        Angle $latitudeOfStandardParallel,
        Angle $longitudeOfOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $firstStandardParallel = $latitudeOfStandardParallel->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        if ($firstStandardParallel < 0) {
            $tF = tan(M_PI / 4 + $firstStandardParallel / 2) / (((1 + $e * sin($firstStandardParallel)) / (1 - $e * sin($firstStandardParallel))) ** ($e / 2));
            $t = tan(M_PI / 4 + $latitude / 2) / (((1 + $e * sin($latitude)) / (1 - $e * sin($latitude))) ** ($e / 2));
        } else {
            $tF = tan(M_PI / 4 - $firstStandardParallel / 2) * (((1 + $e * sin($firstStandardParallel)) / (1 - $e * sin($firstStandardParallel))) ** ($e / 2));
            $t = tan(M_PI / 4 - $latitude / 2) * (((1 + $e * sin($latitude)) / (1 - $e * sin($latitude))) ** ($e / 2));
        }
        $mF = cos($firstStandardParallel) / sqrt(1 - $e2 * sin($firstStandardParallel) ** 2);
        $kO = $mF * sqrt((1 + $e) ** (1 + $e) * (1 - $e) ** (1 - $e)) / (2 * $tF);

        $rho = 2 * $a * $kO * $t / sqrt((1 + $e) ** (1 + $e) * (1 - $e) ** (1 - $e));

        $theta = $this->normaliseLongitude($this->longitude->subtract($longitudeOfOrigin))->asRadians()->getValue();
        $dE = $rho * sin($theta);
        $dN = $rho * cos($theta);

        $easting = $falseEasting->asMetres()->getValue() + $dE;
        if ($firstStandardParallel < 0) {
            $northing = $falseNorthing->asMetres()->getValue() + $dN;
        } else {
            $northing = $falseNorthing->asMetres()->getValue() - $dN;
        }

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Polar Stereographic (variant C).
     */
    public function polarStereographicVariantC(
        Projected $to,
        Angle $latitudeOfStandardParallel,
        Angle $longitudeOfOrigin,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $firstStandardParallel = $latitudeOfStandardParallel->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        if ($firstStandardParallel < 0) {
            $tF = tan(M_PI / 4 + $firstStandardParallel / 2) / (((1 + $e * sin($firstStandardParallel)) / (1 - $e * sin($firstStandardParallel))) ** ($e / 2));
            $t = tan(M_PI / 4 + $latitude / 2) / (((1 + $e * sin($latitude)) / (1 - $e * sin($latitude))) ** ($e / 2));
        } else {
            $tF = tan(M_PI / 4 - $firstStandardParallel / 2) * (((1 + $e * sin($firstStandardParallel)) / (1 - $e * sin($firstStandardParallel))) ** ($e / 2));
            $t = tan(M_PI / 4 - $latitude / 2) * (((1 + $e * sin($latitude)) / (1 - $e * sin($latitude))) ** ($e / 2));
        }
        $mF = cos($firstStandardParallel) / sqrt(1 - $e2 * sin($firstStandardParallel) ** 2);

        $rhoF = $a * $mF;
        $rho = $rhoF * $t / $tF;

        $theta = $this->normaliseLongitude($this->longitude->subtract($longitudeOfOrigin))->asRadians()->getValue();
        $dE = $rho * sin($theta);
        $dN = $rho * cos($theta);

        $easting = $eastingAtFalseOrigin->asMetres()->getValue() + $dE;
        if ($firstStandardParallel < 0) {
            $northing = $northingAtFalseOrigin->asMetres()->getValue() - $rhoF + $dN;
        } else {
            $northing = $northingAtFalseOrigin->asMetres()->getValue() + $rhoF - $dN;
        }

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Popular Visualisation Pseudo Mercator
     * Applies spherical formulas to the ellipsoid. As such does not have the properties of a true Mercator projection.
     */
    public function popularVisualisationPseudoMercator(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();

        $easting = $falseEasting->asMetres()->getValue() + $a * ($this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue());
        $northing = $falseNorthing->asMetres()->getValue() + $a * log(tan(M_PI / 4 + $latitude / 2));

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Mercator (variant A)
     * Note that in these formulas the parameter latitude of natural origin (latO) is not used. However for this
     * Mercator (variant A) method the EPSG dataset includes this parameter, which must have a value of zero, for
     * completeness in CRS labelling.
     */
    public function mercatorVariantA(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $kO = $scaleFactorAtNaturalOrigin->asUnity()->getValue();

        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();

        $easting = $falseEasting->asMetres()->getValue() + $a * $kO * $this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue();
        $northing = $falseNorthing->asMetres()->getValue() + $a * $kO * log(tan(M_PI / 4 + $latitude / 2) * ((1 - $e * sin($latitude)) / (1 + $e * sin($latitude))) ** ($e / 2));

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Mercator (variant B)
     * Used for most nautical charts.
     */
    public function mercatorVariantB(
        Projected $to,
        Angle $latitudeOf1stStandardParallel,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $firstStandardParallel = $latitudeOf1stStandardParallel->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $kO = cos($firstStandardParallel) / sqrt(1 - $e2 * sin($firstStandardParallel) ** 2);

        $easting = $falseEasting->asMetres()->getValue() + $a * $kO * $this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue();
        $northing = $falseNorthing->asMetres()->getValue() + $a * $kO * log(tan(M_PI / 4 + $latitude / 2) * ((1 - $e * sin($latitude)) / (1 + $e * sin($latitude))) ** ($e / 2));

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Longitude rotation
     * This transformation allows calculation of the longitude of a point in the target system by adding the parameter
     * value to the longitude value of the point in the source system.
     */
    public function longitudeRotation(
        Geographic $to,
        Angle $longitudeOffset
    ): self {
        $newLongitude = $this->longitude->add($longitudeOffset);

        return static::create($this->latitude, $newLongitude, $this->height, $to, $this->epoch);
    }

    /**
     * Hotine Oblique Mercator (variant A).
     */
    public function obliqueMercatorHotineVariantA(
        Projected $to,
        Angle $latitudeOfProjectionCentre,
        Angle $longitudeOfProjectionCentre,
        Angle $azimuthOfInitialLine,
        Angle $angleFromRectifiedToSkewGrid,
        Scale $scaleFactorOnInitialLine,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $longitude = $this->longitude->asRadians()->getValue();
        $latC = $latitudeOfProjectionCentre->asRadians()->getValue();
        $lonC = $longitudeOfProjectionCentre->asRadians()->getValue();
        $alphaC = $azimuthOfInitialLine->asRadians()->getValue();
        $kC = $scaleFactorOnInitialLine->asUnity()->getValue();
        $gammaC = $angleFromRectifiedToSkewGrid->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $B = sqrt(1 + ($e2 * cos($latC) ** 4 / (1 - $e2)));
        $A = $a * $B * $kC * sqrt(1 - $e2) / (1 - $e2 * sin($latC) ** 2);
        $tO = tan(M_PI / 4 - $latC / 2) / ((1 - $e * sin($latC)) / (1 + $e * sin($latC))) ** ($e / 2);
        $D = $B * sqrt((1 - $e2)) / (cos($latC) * sqrt(1 - $e2 * sin($latC) ** 2));
        $DD = max(1, $D ** 2);
        $F = $D + sqrt($DD - 1) * static::sign($latC);
        $H = $F * ($tO) ** $B;
        $G = ($F - 1 / $F) / 2;
        $gammaO = self::asin(sin($alphaC) / $D);
        $lonO = $lonC - (self::asin($G * tan($gammaO))) / $B;

        $t = tan(M_PI / 4 - $latitude / 2) / ((1 - $e * sin($latitude)) / (1 + $e * sin($latitude))) ** ($e / 2);
        $Q = $H / $t ** $B;
        $S = ($Q - 1 / $Q) / 2;
        $T = ($Q + 1 / $Q) / 2;
        $V = sin($B * ($longitude - $lonO));
        $U = (-$V * cos($gammaO) + $S * sin($gammaO)) / $T;
        $v = $A * log((1 - $U) / (1 + $U)) / (2 * $B);
        $u = $A * atan2(($S * cos($gammaO) + $V * sin($gammaO)), cos($B * ($longitude - $lonO))) / $B;

        $easting = $v * cos($gammaC) + $u * sin($gammaC) + $falseEasting->asMetres()->getValue();
        $northing = $u * cos($gammaC) - $v * sin($gammaC) + $falseNorthing->asMetres()->getValue();

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Hotine Oblique Mercator (variant B).
     */
    public function obliqueMercatorHotineVariantB(
        Projected $to,
        Angle $latitudeOfProjectionCentre,
        Angle $longitudeOfProjectionCentre,
        Angle $azimuthOfInitialLine,
        Angle $angleFromRectifiedToSkewGrid,
        Scale $scaleFactorOnInitialLine,
        Length $eastingAtProjectionCentre,
        Length $northingAtProjectionCentre
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $longitude = $this->longitude->asRadians()->getValue();
        $latC = $latitudeOfProjectionCentre->asRadians()->getValue();
        $lonC = $longitudeOfProjectionCentre->asRadians()->getValue();
        $alphaC = $azimuthOfInitialLine->asRadians()->getValue();
        $kC = $scaleFactorOnInitialLine->asUnity()->getValue();
        $gammaC = $angleFromRectifiedToSkewGrid->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $B = sqrt(1 + ($e2 * cos($latC) ** 4 / (1 - $e2)));
        $A = $a * $B * $kC * sqrt(1 - $e2) / (1 - $e2 * sin($latC) ** 2);
        $tO = tan(M_PI / 4 - $latC / 2) / ((1 - $e * sin($latC)) / (1 + $e * sin($latC))) ** ($e / 2);
        $D = $B * sqrt((1 - $e2)) / (cos($latC) * sqrt(1 - $e2 * sin($latC) ** 2));
        $DD = max(1, $D ** 2);
        $F = $D + sqrt($DD - 1) * static::sign($latC);
        $H = $F * ($tO) ** $B;
        $G = ($F - 1 / $F) / 2;
        $gammaO = self::asin(sin($alphaC) / $D);
        $lonO = $lonC - (self::asin($G * tan($gammaO))) / $B;
        $vC = 0;
        if ($alphaC === M_PI / 2) {
            $uC = $A * ($lonC - $lonO);
        } else {
            $uC = ($A / $B) * atan2(sqrt($DD - 1), cos($alphaC)) * static::sign($latC);
        }

        $t = tan(M_PI / 4 - $latitude / 2) / ((1 - $e * sin($latitude)) / (1 + $e * sin($latitude))) ** ($e / 2);
        $Q = $H / $t ** $B;
        $S = ($Q - 1 / $Q) / 2;
        $T = ($Q + 1 / $Q) / 2;
        $V = sin($B * ($longitude - $lonO));
        $U = (-$V * cos($gammaO) + $S * sin($gammaO)) / $T;
        $v = $A * log((1 - $U) / (1 + $U)) / (2 * $B);

        if ($alphaC === M_PI / 2) {
            if ($longitude === $lonC) {
                $u = 0;
            } else {
                $u = ($A * atan(($S * cos($gammaO) + $V * sin($gammaO)) / cos($B * ($longitude - $lonO))) / $B) - (abs($uC) * static::sign($latC) * static::sign($lonC - $longitude));
            }
        } else {
            $u = ($A * atan2(($S * cos($gammaO) + $V * sin($gammaO)), cos($B * ($longitude - $lonO))) / $B) - (abs($uC) * static::sign($latC));
        }

        $easting = $v * cos($gammaC) + $u * sin($gammaC) + $eastingAtProjectionCentre->asMetres()->getValue();
        $northing = $u * cos($gammaC) - $v * sin($gammaC) + $northingAtProjectionCentre->asMetres()->getValue();

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Laborde Oblique Mercator.
     */
    public function obliqueMercatorLaborde(
        Projected $to,
        Angle $latitudeOfProjectionCentre,
        Angle $longitudeOfProjectionCentre,
        Angle $azimuthOfInitialLine,
        Scale $scaleFactorOnInitialLine,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $latC = $latitudeOfProjectionCentre->asRadians()->getValue();
        $alphaC = $azimuthOfInitialLine->asRadians()->getValue();
        $kC = $scaleFactorOnInitialLine->asUnity()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $B = sqrt(1 + ($e2 * cos($latC) ** 4 / (1 - $e2)));
        $latS = self::asin(sin($latC) / $B);
        $R = $a * $kC * (sqrt(1 - $e2) / (1 - $e2 * sin($latC) ** 2));
        $C = log(tan(M_PI / 4 + $latS / 2)) - $B * log(tan(M_PI / 4 + $latC / 2) * ((1 - $e * sin($latC)) / (1 + $e * sin($latC))) ** ($e / 2));

        $L = $B * $this->normaliseLongitude($this->longitude->subtract($longitudeOfProjectionCentre))->asRadians()->getValue();
        $q = $C + $B * log(tan(M_PI / 4 + $latitude / 2) * ((1 - $e * sin($latitude)) / (1 + $e * sin($latitude))) ** ($e / 2));
        $P = 2 * atan(M_E ** $q) - M_PI / 2;
        $U = cos($P) * cos($L) * cos($latS) + sin($P) * sin($latS);
        $V = cos($P) * cos($L) * sin($latS) - sin($P) * cos($latS);
        $W = cos($P) * sin($L);
        $d = hypot($U, $V);
        if ($d === 0.0) {
            $LPrime = 0;
            $PPrime = static::sign($W) * M_PI / 2;
        } else {
            $LPrime = 2 * atan($V / ($U + $d));
            $PPrime = atan($W / $d);
        }
        $H = new ComplexNumber(-$LPrime, log(tan(M_PI / 4 + $PPrime / 2)));
        $G = (new ComplexNumber(1 - cos(2 * $alphaC), sin(2 * $alphaC)))->divide(new ComplexNumber(12, 0));

        $easting = $falseEasting->asMetres()->getValue() + $R * $H->pow(3)->multiply($G)->add($H)->getImaginary();
        $northing = $falseNorthing->asMetres()->getValue() + $R * $H->pow(3)->multiply($G)->add($H)->getReal();

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Transverse Mercator.
     */
    public function transverseMercator(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $latitude = $this->latitude->asRadians()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $kO = $scaleFactorAtNaturalOrigin->asUnity()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $f = $ellipsoid->getInverseFlattening();

        $n = $f / (2 - $f);
        $B = ($a / (1 + $n)) * (1 + $n ** 2 / 4 + $n ** 4 / 64);

        $h1 = $n / 2 - (2 / 3) * $n ** 2 + (5 / 16) * $n ** 3 + (41 / 180) * $n ** 4;
        $h2 = (13 / 48) * $n ** 2 - (3 / 5) * $n ** 3 + (557 / 1440) * $n ** 4;
        $h3 = (61 / 240) * $n ** 3 - (103 / 140) * $n ** 4;
        $h4 = (49561 / 161280) * $n ** 4;

        if ($latitudeOrigin === 0.0) {
            $mO = 0;
        } elseif ($latitudeOrigin === M_PI / 2) {
            $mO = $B * M_PI / 2;
        } elseif ($latitudeOrigin === -M_PI / 2) {
            $mO = $B * -M_PI / 2;
        } else {
            $qO = asinh(tan($latitudeOrigin)) - ($e * atanh($e * sin($latitudeOrigin)));
            $betaO = atan(sinh($qO));
            $xiO0 = self::asin(sin($betaO));
            $xiO1 = $h1 * sin(2 * $xiO0);
            $xiO2 = $h2 * sin(4 * $xiO0);
            $xiO3 = $h3 * sin(6 * $xiO0);
            $xiO4 = $h4 * sin(8 * $xiO0);
            $xiO = $xiO0 + $xiO1 + $xiO2 + $xiO3 + $xiO4;
            $mO = $B * $xiO;
        }

        $Q = asinh(tan($latitude)) - ($e * atanh($e * sin($latitude)));
        $beta = atan(sinh($Q));
        $eta0 = atanh(cos($beta) * sin($this->normaliseLongitude($this->longitude->subtract($longitudeOfNaturalOrigin))->asRadians()->getValue()));
        $xi0 = self::asin(sin($beta) * cosh($eta0));
        $xi1 = $h1 * sin(2 * $xi0) * cosh(2 * $eta0);
        $eta1 = $h1 * cos(2 * $xi0) * sinh(2 * $eta0);
        $xi2 = $h2 * sin(4 * $xi0) * cosh(4 * $eta0);
        $eta2 = $h2 * cos(4 * $xi0) * sinh(4 * $eta0);
        $xi3 = $h3 * sin(6 * $xi0) * cosh(6 * $eta0);
        $eta3 = $h3 * cos(6 * $xi0) * sinh(6 * $eta0);
        $xi4 = $h4 * sin(8 * $xi0) * cosh(8 * $eta0);
        $eta4 = $h4 * cos(8 * $xi0) * sinh(8 * $eta0);
        $xi = $xi0 + $xi1 + $xi2 + $xi3 + $xi4;
        $eta = $eta0 + $eta1 + $eta2 + $eta3 + $eta4;

        $easting = $falseEasting->asMetres()->getValue() + $kO * $B * $eta;
        $northing = $falseNorthing->asMetres()->getValue() + $kO * ($B * $xi - $mO);

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Transverse Mercator Zoned Grid System
     * If locations fall outwith the fixed zones the general Transverse Mercator method (code 9807) must be used for
     * each zone.
     */
    public function transverseMercatorZonedGrid(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $initialLongitude,
        Angle $zoneWidth,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $W = $zoneWidth->asDegrees()->getValue();
        $Z = (int) ($this->longitude->subtract($initialLongitude)->asDegrees()->getValue() / $W) % (int) (360 / $W) + 1;

        $longitudeOrigin = $initialLongitude->add(new Degree($Z * $W - $W / 2));
        $falseEasting = $falseEasting->add(new Metre($Z * 1000000));

        return $this->transverseMercator($to, $latitudeOfNaturalOrigin, $longitudeOrigin, $scaleFactorAtNaturalOrigin, $falseEasting, $falseNorthing);
    }

    /**
     * New Zealand Map Grid.
     */
    public function newZealandMapGrid(
        Projected $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): ProjectedPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();

        $deltaLatitudeToOrigin = Angle::convert($this->latitude->subtract($latitudeOfNaturalOrigin), Angle::EPSG_ARC_SECOND)->getValue();
        $deltaLongitudeToOrigin = $this->longitude->subtract($longitudeOfNaturalOrigin)->asRadians();

        $deltaPsi = 0;
        $deltaPsi += 0.6399175073 * ($deltaLatitudeToOrigin * 0.00001) ** 1;
        $deltaPsi += -0.1358797613 * ($deltaLatitudeToOrigin * 0.00001) ** 2;
        $deltaPsi += 0.063294409 * ($deltaLatitudeToOrigin * 0.00001) ** 3;
        $deltaPsi += -0.02526853 * ($deltaLatitudeToOrigin * 0.00001) ** 4;
        $deltaPsi += 0.0117879 * ($deltaLatitudeToOrigin * 0.00001) ** 5;
        $deltaPsi += -0.0055161 * ($deltaLatitudeToOrigin * 0.00001) ** 6;
        $deltaPsi += 0.0026906 * ($deltaLatitudeToOrigin * 0.00001) ** 7;
        $deltaPsi += -0.001333 * ($deltaLatitudeToOrigin * 0.00001) ** 8;
        $deltaPsi += 0.00067 * ($deltaLatitudeToOrigin * 0.00001) ** 9;
        $deltaPsi += -0.00034 * ($deltaLatitudeToOrigin * 0.00001) ** 10;

        $zeta = new ComplexNumber($deltaPsi, $deltaLongitudeToOrigin->getValue());

        $B1 = new ComplexNumber(0.7557853228, 0.0);
        $B2 = new ComplexNumber(0.249204646, 0.003371507);
        $B3 = new ComplexNumber(-0.001541739, 0.041058560);
        $B4 = new ComplexNumber(-0.10162907, 0.01727609);
        $B5 = new ComplexNumber(-0.26623489, -0.36249218);
        $B6 = new ComplexNumber(-0.6870983, -1.1651967);
        $z = new ComplexNumber(0, 0);
        $z = $z->add($B1->multiply($zeta->pow(1)));
        $z = $z->add($B2->multiply($zeta->pow(2)));
        $z = $z->add($B3->multiply($zeta->pow(3)));
        $z = $z->add($B4->multiply($zeta->pow(4)));
        $z = $z->add($B5->multiply($zeta->pow(5)));
        $z = $z->add($B6->multiply($zeta->pow(6)));

        $easting = $falseEasting->asMetres()->getValue() + $z->getImaginary() * $a;
        $northing = $falseNorthing->asMetres()->getValue() + $z->getReal() * $a;

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Madrid to ED50 polynomial.
     */
    public function madridToED50Polynomial(
        Geographic2D $to,
        Scale $A0,
        Scale $A1,
        Scale $A2,
        Scale $A3,
        Angle $B00,
        Scale $B0,
        Scale $B1,
        Scale $B2,
        Scale $B3
    ): self {
        $dLatitude = new ArcSecond($A0->add($A1->multiply($this->latitude->getValue()))->add($A2->multiply($this->longitude->getValue()))->add($A3->multiply($this->height ? $this->height->getValue() : 0))->getValue());
        $dLongitude = $B00->add(new ArcSecond($B0->add($B1->multiply($this->latitude->getValue()))->add($B2->multiply($this->longitude->getValue()))->add($B3->multiply($this->height ? $this->height->getValue() : 0))->getValue()));

        return self::create($this->latitude->add($dLatitude), $this->longitude->add($dLongitude), null, $to, $this->epoch);
    }

    /**
     * Geographic3D to 2D conversion.
     */
    public function threeDToTwoD(
        Geographic $to
    ): self {
        if ($to instanceof Geographic2D) {
            return static::create($this->latitude, $this->longitude, null, $to, $this->epoch);
        }

        return static::create($this->latitude, $this->longitude, new Metre(0), $to, $this->epoch);
    }

    /**
     * Geographic2D offsets.
     * This transformation allows calculation of coordinates in the target system by adding the parameter value to the
     * coordinate values of the point in the source system.
     */
    public function geographic2DOffsets(
        Geographic $to,
        Angle $latitudeOffset,
        Angle $longitudeOffset
    ): self {
        $toLatitude = $this->latitude->add($latitudeOffset);
        $toLongitude = $this->longitude->add($longitudeOffset);

        return static::create($toLatitude, $toLongitude, null, $to, $this->epoch);
    }

    /*
     * Geographic2D with Height Offsets.
     * This transformation allows calculation of coordinates in the target system by adding the parameter value to the
     * coordinate values of the point in the source system.
     */
    public function geographic2DWithHeightOffsets(
        Compound $to,
        Angle $latitudeOffset,
        Angle $longitudeOffset,
        Length $geoidUndulation
    ): CompoundPoint {
        $toLatitude = $this->latitude->add($latitudeOffset);
        $toLongitude = $this->longitude->add($longitudeOffset);
        $toHeight = $this->height->add($geoidUndulation);

        $horizontal = static::create($toLatitude, $toLongitude, null, $to->getHorizontal(), $this->epoch);
        $vertical = VerticalPoint::create($toHeight, $to->getVertical(), $this->epoch);

        return CompoundPoint::create($horizontal, $vertical, $to, $this->epoch);
    }

    /**
     * General polynomial.
     * @param Coefficient[] $powerCoefficients
     */
    public function generalPolynomial(
        Geographic $to,
        Angle $ordinate1OfEvaluationPointInSourceCRS,
        Angle $ordinate2OfEvaluationPointInSourceCRS,
        Angle $ordinate1OfEvaluationPointInTargetCRS,
        Angle $ordinate2OfEvaluationPointInTargetCRS,
        Scale $scalingFactorForSourceCRSCoordDifferences,
        Scale $scalingFactorForTargetCRSCoordDifferences,
        Scale $A0,
        Scale $B0,
        array $powerCoefficients
    ): self {
        $xs = $this->latitude->getValue();
        $ys = $this->longitude->getValue();

        $t = $this->generalPolynomialUnitless(
            $xs,
            $ys,
            $ordinate1OfEvaluationPointInSourceCRS,
            $ordinate2OfEvaluationPointInSourceCRS,
            $ordinate1OfEvaluationPointInTargetCRS,
            $ordinate2OfEvaluationPointInTargetCRS,
            $scalingFactorForSourceCRSCoordDifferences,
            $scalingFactorForTargetCRSCoordDifferences,
            $A0,
            $B0,
            $powerCoefficients
        );

        $xtUnit = $to->getCoordinateSystem()->getAxes()[0]->getUnitOfMeasureId();
        $ytUnit = $to->getCoordinateSystem()->getAxes()[1]->getUnitOfMeasureId();

        return static::create(
            Angle::makeUnit($t['xt'], $xtUnit),
            Angle::makeUnit($t['yt'], $ytUnit),
            $this->height,
            $to,
            $this->epoch
        );
    }

    /**
     * Reversible polynomial.
     * @param Coefficient[] $powerCoefficients
     */
    public function reversiblePolynomial(
        Geographic $to,
        Angle $ordinate1OfEvaluationPoint,
        Angle $ordinate2OfEvaluationPoint,
        Scale $scalingFactorForCoordDifferences,
        Scale $A0,
        Scale $B0,
        $powerCoefficients
    ): self {
        $xs = $this->latitude->getValue();
        $ys = $this->longitude->getValue();

        $t = $this->reversiblePolynomialUnitless(
            $xs,
            $ys,
            $ordinate1OfEvaluationPoint,
            $ordinate2OfEvaluationPoint,
            $scalingFactorForCoordDifferences,
            $A0,
            $B0,
            $powerCoefficients
        );

        $xtUnit = $to->getCoordinateSystem()->getAxes()[0]->getUnitOfMeasureId();
        $ytUnit = $to->getCoordinateSystem()->getAxes()[1]->getUnitOfMeasureId();

        return static::create(
            Angle::makeUnit($t['xt'], $xtUnit),
            Angle::makeUnit($t['yt'], $ytUnit),
            $this->height,
            $to,
            $this->epoch
        );
    }

    /**
     * Axis Order Reversal.
     */
    public function axisReversal(
        Geographic $to
    ): self {
        // axes are read in from the CRS, this is a book-keeping adjustment only
        return static::create($this->latitude, $this->longitude, $this->height, $to, $this->epoch);
    }

    /**
     * Ordnance Survey National Transformation
     * Geodetic transformation between ETRS89 (or WGS 84) and OSGB36 / National Grid.  Uses ETRS89 / National Grid as
     * an intermediate coordinate system for bi-linear interpolation of gridded grid coordinate differences.
     */
    public function OSTN15(
        Projected $to,
        OSTNOSGM15Grid $eastingAndNorthingDifferenceFile
    ): ProjectedPoint {
        $osgb36NationalGrid = Projected::fromSRID(Projected::EPSG_OSGB36_BRITISH_NATIONAL_GRID);
        $etrs89NationalGrid = new Projected(
            'ETRS89 / National Grid',
            Cartesian::fromSRID(Cartesian::EPSG_2D_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_M),
            Datum::fromSRID(Datum::EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_SYSTEM_1989_ENSEMBLE),
            $osgb36NationalGrid->getBoundingArea()
        );

        $projected = $this->transverseMercator($etrs89NationalGrid, new Degree(49), new Degree(-2), new Unity(0.9996012717), new Metre(400000), new Metre(-100000));

        return $eastingAndNorthingDifferenceFile->applyForwardHorizontalAdjustment($projected);
    }

    /**
     * Geog3D to Geog2D+GravityRelatedHeight (OSGM-GB).
     * Uses ETRS89 / National Grid as an intermediate coordinate system for bi-linear interpolation of gridded grid
     * coordinate differences.
     */
    public function geographic3DTo2DPlusGravityHeightOSGM15(
        Compound $to,
        OSTNOSGM15Grid $geoidHeightCorrectionModelFile,
        string $EPSGCodeForInterpolationCRS
    ): CompoundPoint {
        $osgb36NationalGrid = Projected::fromSRID(Projected::EPSG_OSGB36_BRITISH_NATIONAL_GRID);
        $etrs89NationalGrid = new Projected(
            'ETRS89 / National Grid',
            Cartesian::fromSRID(Cartesian::EPSG_2D_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_M),
            Datum::fromSRID(Datum::EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_SYSTEM_1989_ENSEMBLE),
            $osgb36NationalGrid->getBoundingArea()
        );

        $projected = $this->transverseMercator($etrs89NationalGrid, new Degree(49), new Degree(-2), new Unity(0.9996012717), new Metre(400000), new Metre(-100000));

        $horizontalPoint = self::create(
            $this->latitude,
            $this->longitude,
            null,
            $to->getHorizontal(),
            $this->getCoordinateEpoch()
        );

        $verticalPoint = VerticalPoint::create(
            $this->height->subtract($geoidHeightCorrectionModelFile->getVerticalAdjustment($projected)),
            $to->getVertical(),
            $this->getCoordinateEpoch()
        );

        return CompoundPoint::create(
            $horizontalPoint,
            $verticalPoint,
            $to,
            $this->getCoordinateEpoch()
        );
    }

    /**
     * Geographic3D to GravityRelatedHeight (OSGM-GB).
     * Uses ETRS89 / National Grid as an intermediate coordinate system for bi-linear interpolation of gridded grid
     * coordinate differences.
     */
    public function geographic3DToGravityHeightOSGM15(
        Vertical $to,
        OSTNOSGM15Grid $geoidHeightCorrectionModelFile
    ): VerticalPoint {
        $osgb36NationalGrid = Projected::fromSRID(Projected::EPSG_OSGB36_BRITISH_NATIONAL_GRID);
        $etrs89NationalGrid = new Projected(
            'ETRS89 / National Grid',
            Cartesian::fromSRID(Cartesian::EPSG_2D_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_M),
            Datum::fromSRID(Datum::EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_SYSTEM_1989_ENSEMBLE),
            $osgb36NationalGrid->getBoundingArea()
        );

        $projected = $this->transverseMercator($etrs89NationalGrid, new Degree(49), new Degree(-2), new Unity(0.9996012717), new Metre(400000), new Metre(-100000));

        return VerticalPoint::create(
            $this->height->subtract($geoidHeightCorrectionModelFile->getVerticalAdjustment($projected)),
            $to,
            $this->getCoordinateEpoch()
        );
    }

    /**
     * NADCON5.
     * Geodetic transformation operating on geographic coordinate differences by bi-quadratic interpolation.  Input
     * expects longitudes to be positive east in range 0-360° (0° = Greenwich).
     */
    public function NADCON5(
        Geographic $to,
        NADCON5Grid $latitudeDifferenceFile,
        NADCON5Grid $longitudeDifferenceFile,
        ?NADCON5Grid $ellipsoidalHeightDifferenceFile = null,
        bool $inReverse
    ): self {
        /*
         * Ideally most of this logic (especially reverse case) would be in the NADCON5Grid class like the other grids,
         * but NADCON5 uses different files for latitude/longitude/height that need to be combined at runtime so that
         * isn't possible.
         */
        if (!$inReverse) {
            $latitudeAdjustment = new ArcSecond($latitudeDifferenceFile->getForwardAdjustment($this));
            $longitudeAdjustment = new ArcSecond($longitudeDifferenceFile->getForwardAdjustment($this));
            $heightAdjustment = $this->getHeight() && $ellipsoidalHeightDifferenceFile ? new Metre($ellipsoidalHeightDifferenceFile->getForwardAdjustment($this)) : null;

            return self::create($this->latitude->add($latitudeAdjustment), $this->longitude->add($longitudeAdjustment), $heightAdjustment ? $this->height->add($heightAdjustment) : null, $to, $this->getCoordinateEpoch());
        }

        $iteration = $this;

        do {
            $prevIteration = $iteration;
            $latitudeAdjustment = new ArcSecond($latitudeDifferenceFile->getForwardAdjustment($iteration));
            $longitudeAdjustment = new ArcSecond($longitudeDifferenceFile->getForwardAdjustment($iteration));
            $heightAdjustment = $this->getHeight() && $ellipsoidalHeightDifferenceFile ? new Metre($ellipsoidalHeightDifferenceFile->getForwardAdjustment($iteration)) : null;
            $iteration = self::create($this->latitude->subtract($latitudeAdjustment), $this->longitude->subtract($longitudeAdjustment), $heightAdjustment ? $this->height->subtract($heightAdjustment) : null, $to, $this->getCoordinateEpoch());
        } while (abs($iteration->latitude->subtract($prevIteration->latitude)->getValue()) > self::ITERATION_CONVERGENCE_GRID && abs($iteration->longitude->subtract($prevIteration->longitude)->getValue()) > self::ITERATION_CONVERGENCE_GRID && ($this->height === null || abs($iteration->height->subtract($prevIteration->height)->getValue()) > self::ITERATION_CONVERGENCE_GRID));

        return $iteration;
    }

    /**
     * NTv2
     * Geodetic transformation operating on geographic coordinate differences by bi-linear interpolation.  Supersedes
     * NTv1 (transformation method code 9614).  Input expects longitudes to be positive west.
     */
    public function NTv2(
        Geographic $to,
        NTv2Grid $latitudeAndLongitudeDifferenceFile,
        bool $inReverse
    ): self {
        if (!$inReverse) {
            return $latitudeAndLongitudeDifferenceFile->applyForwardAdjustment($this, $to);
        } else {
            return $latitudeAndLongitudeDifferenceFile->applyReverseAdjustment($this, $to);
        }
    }

    public function asGeographicValue(): GeographicValue
    {
        return new GeographicValue($this->latitude, $this->longitude, $this->height, $this->crs->getDatum());
    }

    public function asUTMPoint(): UTMPoint
    {
        $hemisphere = $this->getLatitude()->asDegrees()->getValue() >= 0 ? UTMPoint::HEMISPHERE_NORTH : UTMPoint::HEMISPHERE_SOUTH;
        $latitudeOfNaturalOrigin = new Degree(0);
        $initialLongitude = new Degree(-180);
        $scaleFactorAtNaturalOrigin = new Unity(0.9996);
        $falseEasting = new Metre(500000);
        $falseNorthing = $hemisphere === UTMPoint::HEMISPHERE_NORTH ? new Metre(0) : new Metre(10000000);
        $Z = (int) ($this->longitude->subtract($initialLongitude)->asDegrees()->getValue() / 6) % (360 / 6) + 1;
        $longitudeOrigin = $initialLongitude->add(new Degree($Z * 6 - 3));

        $projectedCRS = new Projected(
            'UTM/' . $this->crs->getSRID(),
            Cartesian::fromSRID(Cartesian::EPSG_2D_AXES_EASTING_NORTHING_E_N_ORIENTATIONS_EAST_NORTH_UOM_M),
            $this->crs->getDatum(),
            BoundingArea::createWorld() // this is a dummy CRS for the transform only, details don't matter
        );

        $asProjected = $this->transverseMercator($projectedCRS, $latitudeOfNaturalOrigin, $longitudeOrigin, $scaleFactorAtNaturalOrigin, $falseEasting, $falseNorthing);

        return new UTMPoint($asProjected->getEasting(), $asProjected->getNorthing(), $Z, $hemisphere, $this->crs, $this->epoch);
    }
}
