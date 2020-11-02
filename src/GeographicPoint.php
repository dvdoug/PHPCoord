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
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateSystem\Axis;
use PHPCoord\Datum\Ellipsoid;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\Exception\UnknownAxisException;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Angle\ArcSecond;
use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Scale\Scale;
use PHPCoord\UnitOfMeasure\Scale\Unity;
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
        $latitude = $this->latitude->asRadians()->getValue();
        $longitude = $this->longitude->asRadians()->getValue();
        $fromHeight = $this->height ? $this->height->asMetres()->getValue() : 0;
        $tx = $xAxisTranslation->asMetres()->getValue();
        $ty = $yAxisTranslation->asMetres()->getValue();
        $tz = $zAxisTranslation->asMetres()->getValue();
        $da = $differenceInSemiMajorAxis->asMetres()->getValue();
        $df = $differenceInFlattening->asUnity()->getValue();

        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();

        $rho = $a * (1 - $e2) / (1 - $e2 * sin($latitude) ** 2) ** (3 / 2);
        $nu = $a / sqrt(1 - $e2 * (sin($latitude) ** 2));

        $f = $this->crs->getDatum()->getEllipsoid()->getInverseFlattening();

        $dLatitude = ((-$tx * sin($latitude) * cos($longitude)) - ($ty * sin($latitude) * sin($longitude)) + ($tz * cos($latitude)) + ((($a * $df) + ($this->crs->getDatum()->getEllipsoid()->getInverseFlattening() * $da)) * sin(2 * $latitude))) / ($rho * sin((new ArcSecond(1))->asRadians()->getValue()));
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
        $latitude = $this->latitude->asRadians()->getValue();
        $longitude = $this->longitude->asRadians()->getValue();
        $fromHeight = $this->height ? $this->height->asMetres()->getValue() : 0;
        $tx = $xAxisTranslation->asMetres()->getValue();
        $ty = $yAxisTranslation->asMetres()->getValue();
        $tz = $zAxisTranslation->asMetres()->getValue();
        $da = $differenceInSemiMajorAxis->asMetres()->getValue();
        $df = $differenceInFlattening->asUnity()->getValue();

        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $b = $this->crs->getDatum()->getEllipsoid()->getSemiMinorAxis()->asMetres()->getValue();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();

        $rho = $a * (1 - $e2) / (1 - $e2 * sin($latitude) ** 2) ** (3 / 2);
        $nu = $a / sqrt(1 - $e2 * (sin($latitude) ** 2));

        $f = $this->crs->getDatum()->getEllipsoid()->getInverseFlattening();

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
        $latitude = $this->latitude->asRadians()->getValue();
        $longitude = $this->longitude->asRadians()->getValue();
        $phiOrigin = $latitudeOfFalseOrigin->asRadians()->getValue();
        $phi1 = $latitudeOf1stStandardParallel->asRadians()->getValue();
        $phi2 = $latitudeOf2ndStandardParallel->asRadians()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e = $this->crs->getDatum()->getEllipsoid()->getEccentricity();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();

        $centralMeridianFirstParallel = cos($phi1) / sqrt(1 - ($e2 * sin($phi1) ** 2));
        $centralMeridianSecondParallel = cos($phi2) / sqrt(1 - ($e2 * sin($phi2) ** 2));

        $alpha = (1 - $e2) * (sin($latitude) / (1 - $e2 * sin($latitude) ** 2) - (1 / 2 / $e) * log((1 - $e * sin($latitude)) / (1 + $e * sin($latitude))));
        $alphaOrigin = (1 - $e2) * (sin($phiOrigin) / (1 - $e2 * sin($phiOrigin) ** 2) - (1 / 2 / $e) * log((1 - $e * sin($phiOrigin)) / (1 + $e * sin($phiOrigin))));
        $alphaFirstParallel = (1 - $e2) * (sin($phi1) / (1 - $e2 * sin($phi1) ** 2) - (1 / 2 / $e) * log((1 - $e * sin($phi1)) / (1 + $e * sin($phi1))));
        $alphaSecondParallel = (1 - $e2) * (sin($phi2) / (1 - $e2 * sin($phi2) ** 2) - (1 / 2 / $e) * log((1 - $e * sin($phi2)) / (1 + $e * sin($phi2))));

        $n = ($centralMeridianFirstParallel ** 2 - $centralMeridianSecondParallel ** 2) / ($alphaSecondParallel - $alphaFirstParallel);
        $C = $centralMeridianFirstParallel ** 2 + $n * $alphaFirstParallel;
        $theta = $n * ($longitude - $longitudeOfFalseOrigin->asRadians()->getValue());
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
        $latitude = $this->latitude->asRadians()->getValue();
        $longitude = $this->longitude->asRadians()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e = $this->crs->getDatum()->getEllipsoid()->getEccentricity();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;

        $M = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitude - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitude) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitude) - (35 * $e6 / 3072) * sin(6 * $latitude));
        $MO = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitudeOrigin - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitudeOrigin) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitudeOrigin) - (35 * $e6 / 3072) * sin(6 * $latitudeOrigin));

        if ($latitude === 0.0) {
            $easting = $falseEasting->asMetres()->getValue() + $a * ($longitude - $longitudeOrigin);
            $northing = $falseNorthing->asMetres()->getValue() - $MO;
        } else {
            $L = ($longitude - $longitudeOrigin) * sin($latitude);
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
        $latitude = $this->latitude->asRadians()->getValue();
        $longitude = $this->longitude->asRadians()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e = $this->crs->getDatum()->getEllipsoid()->getEccentricity();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;

        $m = cos($latitude) / sqrt(1 - $e2 * sin($latitude) ** 2);
        $mO = cos($latitudeOrigin) / sqrt(1 - $e2 * sin($latitudeOrigin) ** 2);

        $M = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitude - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitude) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitude) - (35 * $e6 / 3072) * sin(6 * $latitude));
        $MO = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitudeOrigin - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitudeOrigin) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitudeOrigin) - (35 * $e6 / 3072) * sin(6 * $latitudeOrigin));

        $rho = $a * $mO / sin($latitudeOrigin) + $MO - $M;
        $tau = $a * $m * ($longitude - $longitudeOrigin) / $rho;

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
        $latitude = $this->latitude->asRadians()->getValue();
        $longitude = $this->longitude->asRadians()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e = $this->crs->getDatum()->getEllipsoid()->getEccentricity();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;

        $m = cos($latitude) / sqrt(1 - $e2 * sin($latitude) ** 2);
        $mO = cos($latitudeOrigin) / sqrt(1 - $e2 * sin($latitudeOrigin) ** 2);

        $M = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitude - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitude) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitude) - (35 * $e6 / 3072) * sin(6 * $latitude));
        $MO = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitudeOrigin - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitudeOrigin) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitudeOrigin) - (35 * $e6 / 3072) * sin(6 * $latitudeOrigin));

        $rho = $a * $mO / sin($latitudeOrigin) + $MO - $M;
        $tau = $a * $m * ($longitude - $longitudeOrigin) / $rho;

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
        $latitude = $this->latitude->asRadians()->getValue();
        $longitude = $this->longitude->asRadians()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e = $this->crs->getDatum()->getEllipsoid()->getEccentricity();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;

        $M = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitude - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitude) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitude) - (35 * $e6 / 3072) * sin(6 * $latitude));
        $MO = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitudeOrigin - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitudeOrigin) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitudeOrigin) - (35 * $e6 / 3072) * sin(6 * $latitudeOrigin));

        $A = ($longitude - $longitudeOrigin) * cos($latitude);
        $T = tan($latitude) ** 2;
        $C = $e2 * cos($latitude) ** 2 / (1 - $e2);
        $nu = $a / sqrt(1 - $e2 * (sin($latitude) ** 2));
        $X = $M - $MO + $nu * tan($latitude) * ($A ** 2 / 2 + (5 - $T + 6 * $C) * $A ** 4 / 24);

        $easting = $falseEasting->asMetres()->getValue() + $nu * ($A - $T * $A ** 3 / 6 - (8 - $T + 8 * $C) * $T * $A ** 5 / 120);
        $northing = $falseNorthing->asMetres()->getValue() + $X;

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
        $latitude = $this->latitude->asRadians()->getValue();
        $longitude = $this->longitude->asRadians()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $heightOrigin = $projectionPlaneOriginHeight->asMetres()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();

        $rho = $a * (1 - $e2) / (1 - $e2 * sin($latitude) ** 2) ** (3 / 2);
        $rhoOrigin = $a * (1 - $e2) / (1 - $e2 * sin($latitudeOrigin) ** 2) ** (3 / 2);
        $rhoMid = $a * (1 - $e2) / (1 - $e2 * sin(($latitude + $latitudeOrigin) / 2) ** 2) ** (3 / 2);

        $nu = $a / sqrt(1 - $e2 * (sin($latitude) ** 2));
        $nuOrigin = $a / sqrt(1 - $e2 * (sin($latitudeOrigin) ** 2));

        $A = 1 + $heightOrigin / $nuOrigin;
        $B = tan($latitudeOrigin) / (2 * $rhoOrigin * $nuOrigin);
        $G = 1 + $heightOrigin / $rhoMid;

        $easting = $falseEasting->asMetres()->getValue() + $A * $nu * cos($latitude) * ($longitude - $longitudeOrigin);
        $northing = $falseNorthing->asMetres()->getValue() + $G * $rhoOrigin * (($latitude - $latitudeOrigin) + ($B * ($longitude - $longitudeOrigin) ** 2 * $nu ** 2 * cos($latitude) ** 2));

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
        $latitude = $this->latitude->asRadians()->getValue();
        $longitude = $this->longitude->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e = $this->crs->getDatum()->getEllipsoid()->getEccentricity();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();

        $q = (1 - $e2) * ((sin($latitude) / (1 - $e2 * sin($latitude) ** 2)) - (1 / (2 * $e) * log((1 - $e * sin($latitude)) / (1 + $e * sin($latitude)))));
        $qP = (1 - $e2) * ((1 / (1 - $e2)) - (1 / (2 * $e) * log((1 - $e) / (1 + $e))));
        $beta = asin($q / $qP);
        $theta = asin(sin($beta) * sqrt(3) / 2);
        $Rq = $a * sqrt($qP / 2);

        $easting = $falseEasting->asMetres()->getValue() + ($Rq * 2 * ($longitude - $longitudeOrigin) * cos($theta)) / (sqrt(3) * (1.340264 - 0.243318 * $theta ** 2 + $theta ** 6 * (0.006251 + 0.034164 * $theta ** 2)));
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
        $latitude = $this->latitude->asRadians()->getValue();
        $longitude = $this->longitude->asRadians()->getValue();
        $latitudeFirstParallel = $latitudeOf1stStandardParallel->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e = $this->crs->getDatum()->getEllipsoid()->getEccentricity();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();
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

        $easting = $falseEasting->asMetres()->getValue() + $nu1 * cos($latitudeFirstParallel) * ($longitude - $longitudeOrigin);
        $northing = $falseNorthing->asMetres()->getValue() + $M;

        return ProjectedPoint::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
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
}
