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
use PHPCoord\CoordinateOperation\ComplexNumber;
use PHPCoord\CoordinateOperation\ConvertiblePoint;
use PHPCoord\CoordinateOperation\OSTNOSGM15Grid;
use PHPCoord\CoordinateReferenceSystem\Compound;
use PHPCoord\CoordinateReferenceSystem\Geocentric;
use PHPCoord\CoordinateReferenceSystem\Geographic2D;
use PHPCoord\CoordinateReferenceSystem\Geographic3D;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\CoordinateSystem\Axis;
use PHPCoord\CoordinateSystem\Cartesian;
use PHPCoord\Exception\InvalidAxesException;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\Exception\UnknownAxisException;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Angle\ArcSecond;
use PHPCoord\UnitOfMeasure\Angle\Degree;
use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Scale\Coefficient;
use PHPCoord\UnitOfMeasure\Scale\Scale;
use PHPCoord\UnitOfMeasure\Scale\Unity;

use function abs;
use function asinh;
use function atan;
use function atan2;
use function atanh;
use function cos;
use function cosh;
use function count;
use function hypot;
use function implode;
use function is_nan;
use function log;
use function max;
use function sin;
use function sinh;
use function sqrt;
use function substr;
use function tan;
use function tanh;
use function assert;

use const M_E;
use const M_PI;
use const M_PI_2;

/**
 * Coordinate representing a point on a map projection.
 */
class ProjectedPoint extends Point implements ConvertiblePoint
{
    use AutoConversion {
        convert as protected autoConvert;
    }

    /**
     * Easting.
     */
    protected Length $easting;

    /**
     * Northing.
     */
    protected Length $northing;

    /**
     * Westing.
     */
    protected Length $westing;

    /**
     * Southing.
     */
    protected Length $southing;

    /**
     * Height.
     */
    protected ?Length $height;

    /**
     * Coordinate reference system.
     */
    protected Projected $crs;

    /**
     * Coordinate epoch (date for which the specified coordinates represented this point).
     */
    protected ?DateTimeImmutable $epoch;

    protected function __construct(Projected $crs, ?Length $easting, ?Length $northing, ?Length $westing, ?Length $southing, ?DateTimeInterface $epoch, ?Length $height)
    {
        if (count($crs->getCoordinateSystem()->getAxes()) === 2 && $height !== null) {
            throw new InvalidCoordinateReferenceSystemException('A 2D projected point must not include a height');
        }

        if (count($crs->getCoordinateSystem()->getAxes()) === 3 && $height === null) {
            throw new InvalidCoordinateReferenceSystemException('A 3D projected point must include a height, none given');
        }

        $this->crs = $crs;
        $cs = $this->crs->getCoordinateSystem();

        $eastingAxis = $cs->hasAxisByName(Axis::EASTING) ? $cs->getAxisByName(Axis::EASTING) : null;
        $westingAxis = $cs->hasAxisByName(Axis::WESTING) ? $cs->getAxisByName(Axis::WESTING) : null;
        $northingAxis = $cs->hasAxisByName(Axis::NORTHING) ? $cs->getAxisByName(Axis::NORTHING) : null;
        $southingAxis = $cs->hasAxisByName(Axis::SOUTHING) ? $cs->getAxisByName(Axis::SOUTHING) : null;

        if ($easting && $eastingAxis) {
            $this->easting = $easting::convert($easting, $eastingAxis->getUnitOfMeasureId());
            $this->westing = $this->easting->multiply(-1);
        } elseif ($westing && $westingAxis) {
            $this->westing = $westing::convert($westing, $westingAxis->getUnitOfMeasureId());
            $this->easting = $this->westing->multiply(-1);
        } else {
            throw new InvalidAxesException($crs->getCoordinateSystem()->getAxes());
        }

        if ($northing && $northingAxis) {
            $this->northing = $northing::convert($northing, $northingAxis->getUnitOfMeasureId());
            $this->southing = $this->northing->multiply(-1);
        } elseif ($southing && $southingAxis) {
            $this->southing = $southing::convert($southing, $southingAxis->getUnitOfMeasureId());
            $this->northing = $this->southing->multiply(-1);
        } else {
            throw new InvalidAxesException($crs->getCoordinateSystem()->getAxes());
        }

        if ($epoch instanceof DateTime) {
            $epoch = DateTimeImmutable::createFromMutable($epoch);
        }
        $this->epoch = $epoch;

        $this->height = $height;
    }

    public static function create(Projected $crs, ?Length $easting, ?Length $northing, ?Length $westing, ?Length $southing, ?DateTimeInterface $epoch = null, ?Length $height = null): self
    {
        return match ($crs->getSRID()) {
            Projected::EPSG_OSGB36_BRITISH_NATIONAL_GRID => new BritishNationalGridPoint($easting, $northing, $epoch),
            Projected::EPSG_TM75_IRISH_GRID => new IrishGridPoint($easting, $northing, $epoch),
            Projected::EPSG_IRENET95_IRISH_TRANSVERSE_MERCATOR => new IrishTransverseMercatorPoint($easting, $northing, $epoch),
            default => new self($crs, $easting, $northing, $westing, $southing, $epoch, $height),
        };
    }

    public static function createFromEastingNorthing(Projected $crs, Length $easting, Length $northing, ?DateTimeInterface $epoch = null, ?Length $height = null): self
    {
        return static::create($crs, $easting, $northing, null, null, $epoch, $height);
    }

    public static function createFromWestingNorthing(Projected $crs, Length $westing, Length $northing, ?DateTimeInterface $epoch = null, ?Length $height = null): self
    {
        return static::create($crs, null, $northing, $westing, null, $epoch, $height);
    }

    public static function createFromWestingSouthing(Projected $crs, Length $westing, Length $southing, ?DateTimeInterface $epoch = null, ?Length $height = null): self
    {
        return static::create($crs, null, null, $westing, $southing, $epoch, $height);
    }

    public function getEasting(): Length
    {
        return $this->easting;
    }

    public function getNorthing(): Length
    {
        return $this->northing;
    }

    public function getWesting(): Length
    {
        return $this->westing;
    }

    public function getSouthing(): Length
    {
        return $this->southing;
    }

    public function getHeight(): ?Length
    {
        return $this->height;
    }

    public function getCRS(): Projected
    {
        return $this->crs;
    }

    public function getCoordinateEpoch(): ?DateTimeImmutable
    {
        return $this->epoch;
    }

    /**
     * Calculate distance between two points.
     * Because this is a simple grid, we can use Pythagoras.
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

            /** @var ProjectedPoint $to */
            return new Metre(
                sqrt(
                    ($to->getEasting()->getValue() - $this->getEasting()->getValue()) ** 2 +
                    ($to->getNorthing()->getValue() - $this->getNorthing()->getValue()) ** 2
                )
            );
        }
    }

    public function asGeographicPoint(): GeographicPoint
    {
        $geographicPoint = $this->performOperation($this->crs->getDerivingConversion(), $this->crs->getBaseCRS(), true);
        assert($geographicPoint instanceof GeographicPoint);

        return $geographicPoint;
    }

    public function convert(Compound|Geocentric|Geographic2D|Geographic3D|Projected|Vertical $to, bool $ignoreBoundaryRestrictions = false): Point
    {
        if ($to->getSRID() === $this->crs->getBaseCRS()->getSRID()) {
            return $this->performOperation($this->crs->getDerivingConversion(), $this->crs->getBaseCRS(), true);
        }

        return $this->autoConvert($to, $ignoreBoundaryRestrictions);
    }

    public function __toString(): string
    {
        $values = [];
        foreach ($this->getCRS()->getCoordinateSystem()->getAxes() as $axis) {
            if ($axis->getName() === Axis::EASTING) {
                $values[] = $this->easting;
            } elseif ($axis->getName() === Axis::NORTHING) {
                $values[] = $this->northing;
            } elseif ($axis->getName() === Axis::WESTING) {
                $values[] = $this->westing;
            } elseif ($axis->getName() === Axis::SOUTHING) {
                $values[] = $this->southing;
            } elseif ($axis->getName() === Axis::ELLIPSOIDAL_HEIGHT) {
                $values[] = $this->height;
            } else {
                throw new UnknownAxisException(); // @codeCoverageIgnore
            }
        }

        return '(' . implode(', ', $values) . ')';
    }

    /**
     * Affine parametric transformation.
     */
    public function affineParametricTransform(
        Projected $to,
        Length $A0,
        Coefficient $A1,
        Coefficient $A2,
        Length $B0,
        Coefficient $B1,
        Coefficient $B2,
        bool $inReverse
    ): self {
        $xs = $this->easting->getValue(); // native unit to metre conversion already embedded in the scale factor
        $ys = $this->northing->getValue(); // native unit to metre conversion already embedded in the scale factor

        if ($inReverse) {
            $D = ($A1->getValue() * $B2->getValue()) - ($A2->getValue() * $B1->getValue());
            $a0 = (($A2->getValue() * $B0->asMetres()->getValue()) - ($B2->getValue() * $A0->asMetres()->getValue())) / $D;
            $b0 = (($B1->getValue() * $A0->asMetres()->getValue()) - ($A1->getValue() * $B0->asMetres()->getValue())) / $D;
            $a1 = $B2->getValue() / $D;
            $a2 = -$A2->getValue() / $D;
            $b1 = -$B1->getValue() / $D;
            $b2 = $A1->getValue() / $D;
        } else {
            $a0 = $A0->asMetres()->getValue();
            $a1 = $A1->getValue();
            $a2 = $A2->getValue();
            $b0 = $B0->asMetres()->getValue();
            $b1 = $B1->getValue();
            $b2 = $B2->getValue();
        }

        $xt = $a0 + ($a1 * $xs) + ($a2 * $ys);
        $yt = $b0 + ($b1 * $xs) + ($b2 * $ys);

        return static::create($to, new Metre($xt), new Metre($yt), new Metre(-$xt), new Metre(-$yt), $this->epoch);
    }

    /**
     * Albers Equal Area.
     */
    public function albersEqualArea(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Angle $latitudeOf1stStandardParallel,
        Angle $latitudeOf2ndStandardParallel,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $eastingAtFalseOrigin->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $northingAtFalseOrigin->asMetres()->getValue();
        $phiOrigin = $latitudeOfFalseOrigin->asRadians()->getValue();
        $phi1 = $latitudeOf1stStandardParallel->asRadians()->getValue();
        $phi2 = $latitudeOf2ndStandardParallel->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;

        $centralMeridianFirstParallel = cos($phi1) / sqrt(1 - $e2 * sin($phi1) ** 2);
        $centralMeridianSecondParallel = cos($phi2) / sqrt(1 - $e2 * sin($phi2) ** 2);

        $alphaOrigin = (1 - $e2) * (sin($phiOrigin) / (1 - $e2 * sin($phiOrigin) ** 2) - (1 / 2 / $e) * log((1 - $e * sin($phiOrigin)) / (1 + $e * sin($phiOrigin))));
        $alphaFirstParallel = (1 - $e2) * (sin($phi1) / (1 - $e2 * sin($phi1) ** 2) - (1 / 2 / $e) * log((1 - $e * sin($phi1)) / (1 + $e * sin($phi1))));
        $alphaSecondParallel = (1 - $e2) * (sin($phi2) / (1 - $e2 * sin($phi2) ** 2) - (1 / 2 / $e) * log((1 - $e * sin($phi2)) / (1 + $e * sin($phi2))));

        $n = ($centralMeridianFirstParallel ** 2 - $centralMeridianSecondParallel ** 2) / ($alphaSecondParallel - $alphaFirstParallel);
        $C = $centralMeridianFirstParallel ** 2 + $n * $alphaFirstParallel;
        $rhoOrigin = $a * sqrt($C - $n * $alphaOrigin) / $n;
        $rhoPrime = hypot($easting, $rhoOrigin - $northing);
        $alphaPrime = ($C - $rhoPrime ** 2 * $n ** 2 / $a ** 2) / $n;
        $betaPrime = self::asin($alphaPrime / (1 - (1 - $e2) / 2 / $e * log((1 - $e) / (1 + $e))));
        if ($n > 0) {
            $theta = atan2($easting, $rhoOrigin - $northing);
        } else {
            $theta = atan2(-$easting, $northing - $rhoOrigin);
        }

        $latitude = $betaPrime + (($e2 / 3 + 31 * $e4 / 180 + 517 * $e6 / 5040) * sin(2 * $betaPrime)) + ((23 * $e4 / 360 + 251 * $e6 / 3780) * sin(4 * $betaPrime)) + ((761 * $e6 / 45360) * sin(6 * $betaPrime));
        $longitude = $longitudeOfFalseOrigin->asRadians()->getValue() + ($theta / $n);

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * American Polyconic.
     */
    public function americanPolyconic(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;

        $i = (1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256);
        $ii = (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024);
        $iii = (15 * $e4 / 256 + 45 * $e6 / 1024);
        $iv = (35 * $e6 / 3072);

        $MO = $a * ($i * $latitudeOrigin - $ii * sin(2 * $latitudeOrigin) + $iii * sin(4 * $latitudeOrigin) - $iv * sin(6 * $latitudeOrigin));

        if ($MO === $northing) {
            $latitude = 0;
            $longitude = $longitudeOrigin + $easting / $a;
        } else {
            $A = ($MO + $northing) / $a;
            $B = $A ** 2 + $easting ** 2 / $a ** 2;

            $latitude = $A;
            $C = sqrt(1 - $e2 * sin($latitude) ** 2) * tan($latitude);
            do {
                $latitudeN = $latitude;
                $Ma = $i * $latitude - $ii * sin(2 * $latitude) + $iii * sin(4 * $latitude) - $iv * sin(6 * $latitude);
                $MnPrime = $i - 2 * $ii * cos(2 * $latitude) + 4 * $iii * cos(4 * $latitude) - 6 * $iv * cos(6 * $latitude);
                $latitude = $latitude - ($A * ($C * $Ma + 1) - $Ma - $C * ($Ma ** 2 + $B) / 2) / ($e2 * sin(2 * $latitude) * ($Ma ** 2 + $B - 2 * $A * $Ma) / 4 * $C + ($A - $Ma) * ($C * $MnPrime - (2 / sin(2 * $latitude))) - $MnPrime);
                $C = sqrt(1 - $e2 * sin($latitude) ** 2) * tan($latitude);
            } while (abs($latitude - $latitudeN) >= static::ITERATION_CONVERGENCE_FORMULA);

            $longitude = $longitudeOrigin + self::asin($easting * $C / $a) / sin($latitude);
        }

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Bonne.
     */
    public function bonne(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;

        $mO = cos($latitudeOrigin) / sqrt(1 - $e2 * sin($latitudeOrigin) ** 2);
        $MO = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitudeOrigin - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitudeOrigin) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitudeOrigin) - (35 * $e6 / 3072) * sin(6 * $latitudeOrigin));
        $rho = hypot($easting, $a * $mO / sin($latitudeOrigin) - $northing) * static::sign($latitudeOrigin);

        $M = $a * $mO / sin($latitudeOrigin) + $MO - $rho;
        $mu = $M / ($a * (1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256));
        $e1 = (1 - sqrt(1 - $e2)) / (1 + sqrt(1 - $e2));

        $latitude = $mu + ((3 * $e1 / 2) - (27 * $e1 ** 3 / 32)) * sin(2 * $mu) + ((21 * $e1 ** 2 / 16) - (55 * $e1 ** 4 / 32)) * sin(4 * $mu) + (151 * $e1 ** 3 / 96) * sin(6 * $mu) + (1097 * $e1 ** 4 / 512) * sin(8 * $mu);
        $m = cos($latitude) / sqrt(1 - $e2 * sin($latitude) ** 2);

        if ($m === 0.0) {
            $longitude = $longitudeOrigin; // pole
        } elseif ($latitudeOrigin >= 0) {
            $longitude = $longitudeOrigin + $rho * atan2($easting, $a * $mO / sin($latitudeOrigin) - $northing) / $a / $m;
        } else {
            $longitude = $longitudeOrigin + $rho * atan2(-$easting, -($a * $mO / sin($latitudeOrigin) - $northing)) / $a / $m;
        }

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Bonne South Orientated.
     */
    public function bonneSouthOrientated(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $westing = $falseEasting->asMetres()->getValue() - $this->westing->asMetres()->getValue();
        $southing = $falseNorthing->asMetres()->getValue() - $this->southing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;

        $mO = cos($latitudeOrigin) / sqrt(1 - $e2 * sin($latitudeOrigin) ** 2);
        $MO = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitudeOrigin - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitudeOrigin) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitudeOrigin) - (35 * $e6 / 3072) * sin(6 * $latitudeOrigin));
        $rho = hypot($westing, $a * $mO / sin($latitudeOrigin) - $southing) * static::sign($latitudeOrigin);

        $M = $a * $mO / sin($latitudeOrigin) + $MO - $rho;
        $mu = $M / ($a * (1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256));
        $e1 = (1 - sqrt(1 - $e2)) / (1 + sqrt(1 - $e2));

        $latitude = $mu + ((3 * $e1 / 2) - (27 * $e1 ** 3 / 32)) * sin(2 * $mu) + ((21 * $e1 ** 2 / 16) - (55 * $e1 ** 4 / 32)) * sin(4 * $mu) + (151 * $e1 ** 3 / 96) * sin(6 * $mu) + (1097 * $e1 ** 4 / 512) * sin(8 * $mu);
        $m = cos($latitude) / sqrt(1 - $e2 * sin($latitude) ** 2);

        if ($m === 0.0) {
            $longitude = $longitudeOrigin; // pole
        } elseif ($latitudeOrigin >= 0) {
            $longitude = $longitudeOrigin + $rho * atan2($westing, $a * $mO / sin($latitudeOrigin) - $southing) / $a / $m;
        } else {
            $longitude = $longitudeOrigin + $rho * atan2(-$westing, -($a * $mO / sin($latitudeOrigin) - $southing)) / $a / $m;
        }

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Cartesian Grid Offsets
     * This transformation allows calculation of coordinates in the target system by adding the parameter value to the
     * coordinate values of the point in the source system.
     */
    public function offsets(
        Projected $to,
        Length $eastingOffset,
        Length $northingOffset
    ): self {
        $easting = $this->easting->asMetres()->getValue() + $eastingOffset->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() + $northingOffset->asMetres()->getValue();

        return static::create($to, new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $this->epoch);
    }

    /**
     * Cassini-Soldner.
     */
    public function cassiniSoldner(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;

        $MO = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitudeOrigin - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitudeOrigin) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitudeOrigin) - (35 * $e6 / 3072) * sin(6 * $latitudeOrigin));

        $e1 = (1 - sqrt(1 - $e2)) / (1 + sqrt(1 - $e2));
        $M = $MO + $northing;
        $mu = $M / ($a * (1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256));
        $latitudeCentralMeridian = $mu + (3 * $e1 / 2 - 27 * $e1 ** 3 / 32) * sin(2 * $mu) + (21 * $e1 ** 2 / 16 - 55 * $e1 ** 4 / 32) * sin(4 * $mu) + (151 * $e1 ** 3 / 96) * sin(6 * $mu) + (1097 * $e1 ** 4 / 512) * sin(8 * $mu);

        $nu = $a / sqrt(1 - $e2 * sin($latitudeCentralMeridian) ** 2);
        $rho = $a * (1 - $e2) / (1 - $e2 * sin($latitudeCentralMeridian) ** 2) ** 1.5;

        $T = tan($latitudeCentralMeridian) ** 2;
        $D = $easting / $nu;

        $latitude = $latitudeCentralMeridian - ($nu * tan($latitudeCentralMeridian) / $rho) * ($D ** 2 / 2 - (1 + 3 * $T) * $D ** 4 / 24);
        $longitude = $longitudeOrigin + ($D - $T * $D ** 3 / 3 + (1 + 3 * $T) * $T * $D ** 5 / 15) / cos($latitudeCentralMeridian);

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Hyperbolic Cassini-Soldner.
     */
    public function hyperbolicCassiniSoldner(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;

        $MO = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitudeOrigin - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitudeOrigin) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitudeOrigin) - (35 * $e6 / 3072) * sin(6 * $latitudeOrigin));
        $e1 = (1 - sqrt(1 - $e2)) / (1 + sqrt(1 - $e2));

        $latitude1 = $latitudeOrigin + $northing / 1567446;

        $nu = $a / sqrt(1 - $e2 * sin($latitude1) ** 2);
        $rho = $a * (1 - $e2) / (1 - $e2 * sin($latitude1) ** 2) ** 1.5;

        $qPrime = $northing ** 3 / (6 * $rho * $nu);
        $q = ($northing + $qPrime) ** 3 / (6 * $rho * $nu);
        $M = $MO + $northing + $q;

        $mu = $M / ($a * (1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256));
        $latitudeCentralMeridian = $mu + (3 * $e1 / 2 - 27 * $e1 ** 3 / 32) * sin(2 * $mu) + (21 * $e1 ** 2 / 16 - 55 * $e1 ** 4 / 32) * sin(4 * $mu) + (151 * $e1 ** 3 / 96) * sin(6 * $mu) + (1097 * $e1 ** 4 / 512) * sin(8 * $mu);

        $T = tan($latitudeCentralMeridian) ** 2;
        $D = $easting / $nu;

        $latitude = $latitudeCentralMeridian - ($nu * tan($latitudeCentralMeridian) / $rho) * ($D ** 2 / 2 - (1 + 3 * $T) * $D ** 4 / 24);
        $longitude = $longitudeOrigin + ($D - $T * $D ** 3 / 3 + (1 + 3 * $T) * $T * $D ** 5 / 15) / cos($latitudeCentralMeridian);

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Colombia Urban.
     */
    public function columbiaUrban(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing,
        Length $projectionPlaneOriginHeight
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $heightOrigin = $projectionPlaneOriginHeight->asMetres()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e2 = $ellipsoid->getEccentricitySquared();

        $rhoOrigin = $a * (1 - $e2) / (1 - $e2 * sin($latitudeOrigin) ** 2) ** 1.5;

        $nuOrigin = $a / sqrt(1 - $e2 * (sin($latitudeOrigin) ** 2));

        $B = tan($latitudeOrigin) / (2 * $rhoOrigin * $nuOrigin);
        $C = 1 + $heightOrigin / $a;
        $D = $rhoOrigin * (1 + $heightOrigin / ($a * (1 - $e2)));

        $latitude = $latitudeOrigin + ($northing / $D) - $B * ($easting / $C) ** 2;
        $nu = $a / sqrt(1 - $e2 * (sin($latitude) ** 2));
        $longitude = $longitudeOrigin + $easting / ($C * $nu * cos($latitude));

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Equal Earth.
     */
    public function equalEarth(
        Geographic2D|Geographic3D $to,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;

        $qP = (1 - $e2) * ((1 / (1 - $e2)) - (1 / (2 * $e) * log((1 - $e) / (1 + $e))));
        $Rq = $a * sqrt($qP / 2);

        $theta = $northing / $Rq;
        do {
            $thetaN = $theta;
            $correctionFactor = ($theta * (1.340264 - 0.081106 * $theta ** 2 + $theta ** 6 * (0.000893 + 0.003796 * $theta ** 2)) - $northing / $Rq) / (1.340264 - 0.243318 * $theta ** 2 + $theta ** 6 * (0.006251 + 0.034164 * $theta ** 2));
            $theta -= $correctionFactor;
        } while (abs($theta - $thetaN) >= static::ITERATION_CONVERGENCE_FORMULA);

        $beta = self::asin(2 * sin($theta) / sqrt(3));

        $latitude = $beta + (($e2 / 3 + 31 * $e4 / 180 + 517 * $e6 / 5040) * sin(2 * $beta)) + ((23 * $e4 / 360 + 251 * $e6 / 3780) * sin(4 * $beta)) + ((761 * $e6 / 45360) * sin(6 * $beta));
        $longitude = $longitudeOrigin + sqrt(3) * $easting * (1.340264 - 0.243318 * $theta ** 2 + $theta ** 6 * (0.006251 + 0.034164 * $theta ** 2)) / (2 * $Rq * cos($theta));

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Equidistant Cylindrical
     * See method code 1029 for spherical development. See also Pseudo Plate Carree, method code 9825.
     */
    public function equidistantCylindrical(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOf1stStandardParallel,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeFirstParallel = $latitudeOf1stStandardParallel->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;
        $e8 = $e ** 8;
        $e10 = $e ** 10;
        $e12 = $e ** 12;
        $e14 = $e ** 14;

        $n = (1 - sqrt(1 - $e2)) / (1 + sqrt(1 - $e2));
        $n2 = $n ** 2;
        $n3 = $n ** 3;
        $n4 = $n ** 4;
        $n5 = $n ** 5;
        $n6 = $n ** 6;
        $n7 = $n ** 7;
        $mu = $northing / ($a * (1 - 1 / 4 * $e2 - 3 / 64 * $e4 - 5 / 256 * $e6 - 175 / 16384 * $e8 - 441 / 65536 * $e10 - 4851 / 1048576 * $e12 - 14157 / 4194304 * $e14));

        $latitude = $mu + (3 / 2 * $n - 27 / 32 * $n3 + 269 / 512 * $n5 - 6607 / 24576 * $n7) * sin(2 * $mu)
            + (21 / 16 * $n2 - 55 / 32 * $n4 + 6759 / 4096 * $n6) * sin(4 * $mu)
            + (151 / 96 * $n3 - 417 / 128 * $n5 + 87963 / 20480 * $n7) * sin(6 * $mu)
            + (1097 / 512 * $n4 - 15543 / 2560 * $n6) * sin(8 * $mu)
            + (8011 / 2560 * $n5 - 69119 / 6144 * $n7) * sin(10 * $mu)
            + (293393 / 61440 * $n6) * sin(12 * $mu)
            + (6845701 / 860160 * $n7) * sin(14 * $mu);

        $longitude = $longitudeOrigin + $easting * sqrt(1 - $e2 * sin($latitudeFirstParallel) ** 2) / ($a * cos($latitudeFirstParallel));

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Guam Projection
     * Simplified form of Oblique Azimuthal Equidistant projection method.
     */
    public function guamProjection(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;

        $MO = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitudeOrigin - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitudeOrigin) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitudeOrigin) - (35 * $e6 / 3072) * sin(6 * $latitudeOrigin));
        $e1 = (1 - sqrt(1 - $e2)) / (1 + sqrt(1 - $e2));
        $i = (1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256);

        $latitude = $latitudeOrigin;
        do {
            $latitudeN = $latitude;
            $M = $MO + $northing - ($easting ** 2 * tan($latitude) * sqrt(1 - $e2 * sin($latitude) ** 2) / (2 * $a));
            $mu = $M / ($a * $i);
            $latitude = $mu + (3 * $e1 / 2 - 27 * $e1 ** 3 / 32) * sin(2 * $mu) + (21 * $e1 ** 2 / 16 - 55 * $e1 ** 4 / 32) * sin(4 * $mu) + (151 * $e1 ** 3 / 96) * sin(6 * $mu) + (1097 * $e1 ** 4 / 512) * sin(8 * $mu);
        } while (abs($latitude - $latitudeN) >= static::ITERATION_CONVERGENCE_FORMULA);

        $longitude = $longitudeOrigin + $easting * sqrt(1 - $e2 * sin($latitude) ** 2) / ($a * cos($latitude));

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Krovak.
     */
    public function krovak(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfProjectionCentre,
        Angle $longitudeOfOrigin,
        Angle $coLatitudeOfConeAxis,
        Angle $latitudeOfPseudoStandardParallel,
        Scale $scaleFactorOnPseudoStandardParallel,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $longitudeOffset = $this->crs->getDatum()->getPrimeMeridian()->getGreenwichLongitude()->asRadians()->getValue() - $to->getDatum()->getPrimeMeridian()->getGreenwichLongitude()->asRadians()->getValue();
        $westing = $this->westing->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $southing = $this->southing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
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

        $r = hypot($southing, $westing) ?: 1;
        $theta = atan2($westing, $southing);
        $D = $theta / sin($latitudeP);
        $T = 2 * (atan(($rO / $r) ** (1 / $n) * tan(M_PI / 4 + $latitudeP / 2)) - M_PI / 4);
        $U = self::asin(cos($alphaC) * sin($T) - sin($alphaC) * cos($T) * cos($D));
        $V = self::asin(cos($T) * sin($D) / cos($U));

        $latitude = $U;
        do {
            $latitudeN = $latitude;
            $latitude = 2 * (atan($tO ** (-1 / $B) * tan($U / 2 + M_PI / 4) ** (1 / $B) * ((1 + $e * sin($latitude)) / (1 - $e * sin($latitude))) ** ($e / 2)) - M_PI / 4);
        } while (abs($latitude - $latitudeN) >= static::ITERATION_CONVERGENCE_FORMULA);

        $longitude = $longitudeO + $longitudeOffset - $V / $B;

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Krovak Modified
     * Incorporates a polynomial transformation which is defined to be exact and for practical purposes is considered
     * to be a map projection.
     */
    public function krovakModified(
        Geographic2D|Geographic3D $to,
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
    ): GeographicPoint {
        $Xr = $this->getSouthing()->asMetres()->getValue() - $falseNorthing->asMetres()->getValue() - $ordinate1OfEvaluationPoint->asMetres()->getValue();
        $Yr = $this->getWesting()->asMetres()->getValue() - $falseEasting->asMetres()->getValue() - $ordinate2OfEvaluationPoint->asMetres()->getValue();
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

        $dX = $c1 + $c3 * $Xr - $c4 * $Yr - 2 * $c6 * $Xr * $Yr + $c5 * ($Xr ** 2 - $Yr ** 2) + $c7 * $Xr * ($Xr ** 2 - 3 * $Yr ** 2) - $c8 * $Yr * (3 * $Xr ** 2 - $Yr ** 2) + 4 * $c9 * $Xr * $Yr * ($Xr ** 2 - $Yr ** 2) + $c10 * ($Xr ** 4 + $Yr ** 4 - 6 * $Xr ** 2 * $Yr ** 2);
        $dY = $c2 + $c3 * $Yr + $c4 * $Xr + 2 * $c5 * $Xr * $Yr + $c6 * ($Xr ** 2 - $Yr ** 2) + $c8 * $Xr * ($Xr ** 2 - 3 * $Yr ** 2) + $c7 * $Yr * (3 * $Xr ** 2 - $Yr ** 2) - 4 * $c10 * $Xr * $Yr * ($Xr ** 2 - $Yr ** 2) + $c9 * ($Xr ** 4 + $Yr ** 4 - 6 * $Xr ** 2 * $Yr ** 2);

        $Xp = $this->getSouthing()->asMetres()->getValue() - $falseNorthing->asMetres()->getValue() + $dX;
        $Yp = $this->getWesting()->asMetres()->getValue() - $falseEasting->asMetres()->getValue() + $dY;

        $asKrovak = self::create($this->crs, new Metre(-$Yp), new Metre(-$Xp), new Metre($Yp), new Metre($Xp), $this->epoch);

        return $asKrovak->krovak($to, $latitudeOfProjectionCentre, $longitudeOfOrigin, $coLatitudeOfConeAxis, $latitudeOfPseudoStandardParallel, $scaleFactorOnPseudoStandardParallel, new Metre(0), new Metre(0));
    }

    /**
     * Lambert Azimuthal Equal Area
     * This is the ellipsoidal form of the projection.
     */
    public function lambertAzimuthalEqualArea(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;

        $qO = (1 - $e2) * ((sin($latitudeOrigin) / (1 - $e2 * sin($latitudeOrigin) ** 2)) - ((1 / (2 * $e)) * log((1 - $e * sin($latitudeOrigin)) / (1 + $e * sin($latitudeOrigin)))));
        $qP = (1 - $e2) * ((1 / (1 - $e2)) - ((1 / (2 * $e)) * log((1 - $e) / (1 + $e))));
        $betaO = self::asin($qO / $qP);
        $Rq = $a * sqrt($qP / 2);
        $D = $a * (cos($latitudeOrigin) / sqrt(1 - $e2 * sin($latitudeOrigin) ** 2)) / ($Rq * cos($betaO));
        $rho = hypot($easting / $D, $D * $northing) ?: 1;
        $C = 2 * self::asin($rho / (2 * $Rq));
        $beta = self::asin(cos($C) * sin($betaO) + ($D * $northing * sin($C) * cos($betaO)) / $rho);

        $latitude = $beta + (($e2 / 3 + 31 * $e4 / 180 + 517 * $e6 / 5040) * sin(2 * $beta)) + ((23 * $e4 / 360 + 251 * $e6 / 3780) * sin(4 * $beta)) + ((761 * $e6 / 45360) * sin(6 * $beta));
        $longitude = $longitudeOrigin + atan2($easting * sin($C), $D * $rho * cos($betaO) * cos($C) - $D ** 2 * $northing * sin($betaO) * sin($C));

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Lambert Azimuthal Equal Area (Spherical)
     * This is the spherical form of the projection.  See coordinate operation method Lambert Azimuthal Equal Area
     * (code 9820) for ellipsoidal form.  Differences of several tens of metres result from comparison of the two
     * methods.
     */
    public function lambertAzimuthalEqualAreaSpherical(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();

        $rho = hypot($easting, $northing) ?: 1;
        $c = 2 * self::asin($rho / (2 * $a));

        $latitude = self::asin(cos($c) * sin($latitudeOrigin) + ($northing * sin($c) * cos($latitudeOrigin) / $rho));

        if ($latitudeOrigin === 90.0) {
            $longitude = $longitudeOrigin + atan($easting / -$northing);
        } elseif ($latitudeOrigin === -90.0) {
            $longitude = $longitudeOrigin + atan($easting / $northing);
        } else {
            $longitudeDenominator = ($rho * cos($latitudeOrigin) * cos($c) - $northing * sin($latitudeOrigin) * sin($c));
            $longitude = $longitudeOrigin + atan($easting * sin($c) / $longitudeDenominator);
            if ($longitudeDenominator < 0) {
                $longitude += M_PI;
            }
        }

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Lambert Conic Conformal (1SP).
     */
    public function lambertConicConformal1SP(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $scaleFactorOrigin = $scaleFactorAtNaturalOrigin->asUnity()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $mO = cos($latitudeOrigin) / sqrt(1 - $e2 * sin($latitudeOrigin) ** 2);
        $tO = tan(M_PI / 4 - $latitudeOrigin / 2) / ((1 - $e * sin($latitudeOrigin)) / (1 + $e * sin($latitudeOrigin))) ** ($e / 2);
        $n = sin($latitudeOrigin);
        $F = $mO / ($n * $tO ** $n);
        $rO = $a * $F * $tO ** $n * $scaleFactorOrigin;
        $r = hypot($easting, $rO - $northing);
        if ($n >= 0) {
            $theta = atan2($easting, $rO - $northing);
        } else {
            $r = -$r;
            $theta = atan2(-$easting, -($rO - $northing));
        }

        $t = ($r / ($a * $scaleFactorOrigin * $F)) ** (1 / $n);

        $latitude = M_PI / (2 - 2 * atan($t));
        do {
            $latitudeN = $latitude;
            $latitude = M_PI / 2 - 2 * atan($t * ((1 - $e * sin($latitude)) / (1 + $e * sin($latitude))) ** ($e / 2));
        } while (abs($latitude - $latitudeN) >= static::ITERATION_CONVERGENCE_FORMULA);

        $longitude = $theta / $n + $longitudeOrigin;

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Lambert Conic Conformal (west orientated).
     */
    public function lambertConicConformalWestOrientated(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $westing = $falseEasting->asMetres()->getValue() - $this->westing->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $scaleFactorOrigin = $scaleFactorAtNaturalOrigin->asUnity()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $mO = cos($latitudeOrigin) / sqrt(1 - $e2 * sin($latitudeOrigin) ** 2);
        $tO = tan(M_PI / 4 - $latitudeOrigin / 2) / ((1 - $e * sin($latitudeOrigin)) / (1 + $e * sin($latitudeOrigin))) ** ($e / 2);
        $n = sin($latitudeOrigin);
        $F = $mO / ($n * $tO ** $n);
        $rO = $a * $F * $tO ** $n ** $scaleFactorOrigin;
        $r = hypot($westing, $rO - $northing);
        if ($n >= 0) {
            $theta = atan2($westing, $rO - $northing);
        } else {
            $r = -$r;
            $theta = atan2(-$westing, -($rO - $northing));
        }

        $t = ($r / ($a * $scaleFactorOrigin * $F)) ** (1 / $n);

        $latitude = M_PI / (2 - 2 * atan($t));
        do {
            $latitudeN = $latitude;
            $latitude = M_PI / 2 - 2 * atan($t * ((1 - $e * sin($latitude)) / (1 + $e * sin($latitude))) ** ($e / 2));
        } while (abs($latitude - $latitudeN) >= static::ITERATION_CONVERGENCE_FORMULA);

        $longitude = $theta / $n + $longitudeOrigin;

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Lambert Conic Conformal (1SP) Variant B.
     */
    public function lambertConicConformal1SPVariantB(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $eastingAtFalseOrigin->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $northingAtFalseOrigin->asMetres()->getValue();
        $latitudeNaturalOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $latitudeFalseOrigin = $latitudeOfFalseOrigin->asRadians()->getValue();
        $longitudeFalseOrigin = $longitudeOfFalseOrigin->asRadians()->getValue();
        $scaleFactorOrigin = $scaleFactorAtNaturalOrigin->asUnity()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $mO = cos($latitudeNaturalOrigin) / sqrt(1 - $e2 * sin($latitudeNaturalOrigin) ** 2);
        $tO = tan(M_PI / 4 - $latitudeNaturalOrigin / 2) / ((1 - $e * sin($latitudeNaturalOrigin)) / (1 + $e * sin($latitudeNaturalOrigin))) ** ($e / 2);
        $tF = tan(M_PI / 4 - $latitudeFalseOrigin / 2) / ((1 - $e * sin($latitudeFalseOrigin)) / (1 + $e * sin($latitudeFalseOrigin))) ** ($e / 2);
        $n = sin($latitudeNaturalOrigin);
        $F = $mO / ($n * $tO ** $n);
        $rF = $a * $F * $tF ** $n * $scaleFactorOrigin;
        $r = hypot($easting, $rF - $northing);
        if ($n >= 0) {
            $theta = atan2($easting, $rF - $northing);
        } else {
            $r = -$r;
            $theta = atan2(-$easting, -($rF - $northing));
        }

        $t = ($r / ($a * $scaleFactorOrigin * $F)) ** (1 / $n);

        $latitude = M_PI / (2 - 2 * atan($t));
        do {
            $latitudeN = $latitude;
            $latitude = M_PI / 2 - 2 * atan($t * ((1 - $e * sin($latitude)) / (1 + $e * sin($latitude))) ** ($e / 2));
        } while (abs($latitude - $latitudeN) >= static::ITERATION_CONVERGENCE_FORMULA);

        $longitude = $theta / $n + $longitudeFalseOrigin;

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Lambert Conic Conformal (2SP).
     */
    public function lambertConicConformal2SP(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Angle $latitudeOf1stStandardParallel,
        Angle $latitudeOf2ndStandardParallel,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $eastingAtFalseOrigin->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $northingAtFalseOrigin->asMetres()->getValue();
        $lambdaOrigin = $longitudeOfFalseOrigin->asRadians()->getValue();
        $phiF = $latitudeOfFalseOrigin->asRadians()->getValue();
        $phi1 = $latitudeOf1stStandardParallel->asRadians()->getValue();
        $phi2 = $latitudeOf2ndStandardParallel->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $m1 = cos($phi1) / sqrt(1 - $e2 * sin($phi1) ** 2);
        $m2 = cos($phi2) / sqrt(1 - $e2 * sin($phi2) ** 2);
        $t1 = tan(M_PI / 4 - $phi1 / 2) / ((1 - $e * sin($phi1)) / (1 + $e * sin($phi1))) ** ($e / 2);
        $t2 = tan(M_PI / 4 - $phi2 / 2) / ((1 - $e * sin($phi2)) / (1 + $e * sin($phi2))) ** ($e / 2);
        $tF = tan(M_PI / 4 - $phiF / 2) / ((1 - $e * sin($phiF)) / (1 + $e * sin($phiF))) ** ($e / 2);
        $n = (log($m1) - log($m2)) / (log($t1) - log($t2));
        $F = $m1 / ($n * $t1 ** $n);
        $rF = $a * $F * $tF ** $n;
        $r = hypot($easting, $rF - $northing) * static::sign($n);
        $t = ($r / ($a * $F)) ** (1 / $n);
        if ($n >= 0) {
            $theta = atan2($easting, $rF - $northing);
        } else {
            $theta = atan2(-$easting, -($rF - $northing));
        }

        $latitude = M_PI / 2 - 2 * atan($t);
        do {
            $latitudeN = $latitude;
            $latitude = M_PI / 2 - 2 * atan($t * ((1 - $e * sin($latitude)) / (1 + $e * sin($latitude))) ** ($e / 2));
        } while (abs($latitude - $latitudeN) >= static::ITERATION_CONVERGENCE_FORMULA);

        $longitude = $theta / $n + $lambdaOrigin;

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Lambert Conic Conformal (2SP Michigan).
     */
    public function lambertConicConformal2SPMichigan(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Angle $latitudeOf1stStandardParallel,
        Angle $latitudeOf2ndStandardParallel,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin,
        Scale $ellipsoidScalingFactor
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $eastingAtFalseOrigin->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $northingAtFalseOrigin->asMetres()->getValue();
        $lambdaOrigin = $longitudeOfFalseOrigin->asRadians()->getValue();
        $phiF = $latitudeOfFalseOrigin->asRadians()->getValue();
        $phi1 = $latitudeOf1stStandardParallel->asRadians()->getValue();
        $phi2 = $latitudeOf2ndStandardParallel->asRadians()->getValue();
        $K = $ellipsoidScalingFactor->asUnity()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $m1 = cos($phi1) / sqrt(1 - $e2 * sin($phi1) ** 2);
        $m2 = cos($phi2) / sqrt(1 - $e2 * sin($phi2) ** 2);
        $t1 = tan(M_PI / 4 - $phi1 / 2) / ((1 - $e * sin($phi1)) / (1 + $e * sin($phi1))) ** ($e / 2);
        $t2 = tan(M_PI / 4 - $phi2 / 2) / ((1 - $e * sin($phi2)) / (1 + $e * sin($phi2))) ** ($e / 2);
        $tF = tan(M_PI / 4 - $phiF / 2) / ((1 - $e * sin($phiF)) / (1 + $e * sin($phiF))) ** ($e / 2);
        $n = (log($m1) - log($m2)) / (log($t1) - log($t2));
        $F = $m1 / ($n * $t1 ** $n);
        $rF = $a * $K * $F * $tF ** $n;
        $r = sqrt($easting ** 2 + ($rF - $northing) ** 2) * static::sign($n);
        $t = ($r / ($a * $K * $F)) ** (1 / $n);
        if ($n >= 0) {
            $theta = atan2($easting, $rF - $northing);
        } else {
            $theta = atan2(-$easting, -($rF - $northing));
        }

        $latitude = M_PI / 2 - 2 * atan($t);
        do {
            $latitudeN = $latitude;
            $latitude = M_PI / 2 - 2 * atan($t * ((1 - $e * sin($latitude)) / (1 + $e * sin($latitude))) ** ($e / 2));
        } while (abs($latitude - $latitudeN) >= static::ITERATION_CONVERGENCE_FORMULA);

        $longitude = $theta / $n + $lambdaOrigin;

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Lambert Conic Conformal (2SP Belgium)
     * In 2000 this modification was replaced through use of the regular Lambert Conic Conformal (2SP) method [9802]
     * with appropriately modified parameter values.
     */
    public function lambertConicConformal2SPBelgium(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Angle $latitudeOf1stStandardParallel,
        Angle $latitudeOf2ndStandardParallel,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $eastingAtFalseOrigin->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $northingAtFalseOrigin->asMetres()->getValue();
        $lambdaOrigin = $longitudeOfFalseOrigin->asRadians()->getValue();
        $phiF = $latitudeOfFalseOrigin->asRadians()->getValue();
        $phi1 = $latitudeOf1stStandardParallel->asRadians()->getValue();
        $phi2 = $latitudeOf2ndStandardParallel->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $m1 = cos($phi1) / sqrt(1 - $e2 * sin($phi1) ** 2);
        $m2 = cos($phi2) / sqrt(1 - $e2 * sin($phi2) ** 2);
        $t1 = tan(M_PI / 4 - $phi1 / 2) / ((1 - $e * sin($phi1)) / (1 + $e * sin($phi1))) ** ($e / 2);
        $t2 = tan(M_PI / 4 - $phi2 / 2) / ((1 - $e * sin($phi2)) / (1 + $e * sin($phi2))) ** ($e / 2);
        $tF = tan(M_PI / 4 - $phiF / 2) / ((1 - $e * sin($phiF)) / (1 + $e * sin($phiF))) ** ($e / 2);
        $n = (log($m1) - log($m2)) / (log($t1) - log($t2));
        $F = $m1 / ($n * $t1 ** $n);
        $rF = $a * $F * $tF ** $n;
        if (is_nan($rF)) {
            $rF = 0;
        }
        $r = hypot($easting, $rF - $northing) * static::sign($n);
        $t = ($r / ($a * $F)) ** (1 / $n);
        if ($n >= 0) {
            $theta = atan2($easting, $rF - $northing);
        } else {
            $theta = atan2(-$easting, -($rF - $northing));
        }

        $latitude = M_PI / 2 - 2 * atan($t);
        do {
            $latitudeN = $latitude;
            $latitude = M_PI / 2 - 2 * atan($t * ((1 - $e * sin($latitude)) / (1 + $e * sin($latitude))) ** ($e / 2));
        } while (abs($latitude - $latitudeN) >= static::ITERATION_CONVERGENCE_FORMULA);

        $longitude = ($theta + (new ArcSecond(29.2985))->asRadians()->getValue()) / $n + $lambdaOrigin;

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Lambert Conic Near-Conformal
     * The Lambert Near-Conformal projection is derived from the Lambert Conformal Conic projection by truncating the
     * series expansion of the projection formulae.
     */
    public function lambertConicNearConformal(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $scaleFactorOrigin = $scaleFactorAtNaturalOrigin->asUnity()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e2 = $ellipsoid->getEccentricitySquared();
        $f = $ellipsoid->getFlattening();

        $n = $f / (2 - $f);
        $rhoO = $a * (1 - $e2) / (1 - $e2 * sin($latitudeOrigin) ** 2) ** (3 / 2);
        $nuO = $a / sqrt(1 - $e2 * (sin($latitudeOrigin) ** 2));
        $A = 1 / (6 * $rhoO * $nuO);
        $APrime = $a * (1 - $n + 5 * ($n ** 2 - $n ** 3) / 4 + 81 * ($n ** 4 - $n ** 5) / 64);
        $BPrime = 3 * $a * ($n - $n ** 2 + 7 * ($n ** 3 - $n ** 4) / 8 + 55 * $n ** 5 / 64) / 2;
        $CPrime = 15 * $a * ($n ** 2 - $n ** 3 + 3 * ($n ** 4 - $n ** 5) / 4) / 16;
        $DPrime = 35 * $a * ($n ** 3 - $n ** 4 + 11 * $n ** 5 / 16) / 48;
        $EPrime = 315 * $a * ($n ** 4 - $n ** 5) / 512;
        $rO = $scaleFactorOrigin * $nuO / tan($latitudeOrigin);
        $sO = $APrime * $latitudeOrigin - $BPrime * sin(2 * $latitudeOrigin) + $CPrime * sin(4 * $latitudeOrigin) - $DPrime * sin(6 * $latitudeOrigin) + $EPrime * sin(8 * $latitudeOrigin);

        $theta = atan2($easting, $rO - $northing);
        $r = hypot($easting, $rO - $northing) * static::sign($latitudeOrigin);
        $M = $rO - $r;

        $m = $M;
        do {
            $mN = $m;
            $m = $m - ($M - $scaleFactorOrigin * $m - $scaleFactorOrigin * $A * $m ** 3) / (-$scaleFactorOrigin - 3 * $scaleFactorOrigin * $A * $m ** 2);
        } while (abs($m - $mN) >= static::ITERATION_CONVERGENCE_FORMULA);

        $latitude = $latitudeOrigin + $m / $A;
        do {
            $latitudeN = $latitude;
            $latitude = $latitude + ($m + $sO - ($APrime * $latitude - $BPrime * sin(2 * $latitude) + $CPrime * sin(4 * $latitude) - $DPrime * sin(6 * $latitude) + $EPrime * sin(8 * $latitude))) / $APrime;
        } while (abs($latitude - $latitudeN) >= static::ITERATION_CONVERGENCE_FORMULA);

        $longitude = $longitudeOrigin + $theta / sin($latitudeOrigin);

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Lambert Cylindrical Equal Area
     * This is the ellipsoidal form of the projection.
     */
    public function lambertCylindricalEqualArea(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOf1stStandardParallel,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeFirstParallel = $latitudeOf1stStandardParallel->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;

        $k = cos($latitudeFirstParallel) / sqrt(1 - $e2 * sin($latitudeFirstParallel) ** 2);
        $qP = (1 - $e2) * ((sin(M_PI_2) / (1 - $e2 * sin(M_PI_2) ** 2)) - (1 / (2 * $e)) * log((1 - $e * sin(M_PI_2)) / (1 + $e * sin(M_PI_2))));
        $beta = self::asin(2 * $northing * $k / ($a * $qP));

        $latitude = $beta + (($e2 / 3 + 31 * $e4 / 180 + 517 * $e6 / 5040) * sin(2 * $beta)) + ((23 * $e4 / 360 + 251 * $e6 / 3780) * sin(4 * $beta)) + ((761 * $e6 / 45360) * sin(6 * $beta));
        $longitude = $longitudeOrigin + $easting / ($a * $k);

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Lambert Cylindrical Equal Area
     * This is the spherical form of the projection.
     */
    public function lambertCylindricalEqualAreaSpherical(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOf1stStandardParallel,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeFirstParallel = $latitudeOf1stStandardParallel->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();

        $latitude = self::asin(($northing / $a) * cos($latitudeFirstParallel));
        $longitude = $longitudeOrigin + $easting / ($a * cos($latitudeFirstParallel));

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Modified Azimuthal Equidistant
     * Modified form of Oblique Azimuthal Equidistant projection method developed for Polynesian islands. For the
     * distances over which these projections are used (under 800km) this modification introduces no significant error.
     */
    public function modifiedAzimuthalEquidistant(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e2 = $ellipsoid->getEccentricitySquared();

        $nuO = $a / sqrt(1 - $e2 * sin($latitudeOrigin) ** 2);
        $c = hypot($easting, $northing);
        $alpha = atan2($easting, $northing);
        $A = -$e2 * cos($latitudeOrigin) ** 2 * cos($alpha) ** 2 / (1 - $e2);
        $B = 3 * $e2 * (1 - $A) * sin($latitudeOrigin) * cos($latitudeOrigin) * cos($alpha) / (1 - $e2);
        $D = $c / $nuO;
        $J = $D - ($A * (1 + $A) * $D ** 3 / 6) - ($B * (1 + 3 * $A) * $D ** 4 / 24);
        $K = 1 - ($A * $J ** 2 / 2) - ($B * $J ** 3 / 6);
        $psi = self::asin(sin($latitudeOrigin) * cos($J) + cos($latitudeOrigin) * sin($J) * cos($alpha));

        $latitude = atan((1 - $e2 * $K * sin($latitudeOrigin) / sin($psi)) * tan($psi) / (1 - $e2));
        $longitude = $longitudeOrigin + self::asin(sin($alpha) * sin($J) / cos($psi));

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Oblique Stereographic
     * This is not the same as the projection method of the same name in USGS Professional Paper no. 1395, "Map
     * Projections - A Working Manual" by John P. Snyder.
     */
    public function obliqueStereographic(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $scaleFactorOrigin = $scaleFactorAtNaturalOrigin->asUnity()->getValue();
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

        $g = 2 * $R * $scaleFactorOrigin * tan(M_PI / 4 - $chiOrigin / 2);
        $h = 4 * $R * $scaleFactorOrigin * tan($chiOrigin) + $g;
        $i = atan2($easting, $h + $northing);
        $j = atan2($easting, $g - $northing) - $i;
        $chi = $chiOrigin + 2 * atan(($northing - $easting * tan($j / 2)) / (2 * $R * $scaleFactorOrigin));
        $lambda = $j + 2 * $i + $longitudeOrigin;

        $longitude = ($lambda - $longitudeOrigin) / $n + $longitudeOrigin;

        $psi = 0.5 * log((1 + sin($chi)) / ($c * (1 - sin($chi)))) / $n;

        $latitude = 2 * atan(M_E ** $psi) - M_PI / 2;
        do {
            $latitudeN = $latitude;
            $psiN = log(tan($latitudeN / 2 + M_PI / 4) * ((1 - $e * sin($latitudeN)) / (1 + $e * sin($latitudeN))) ** ($e / 2));
            $latitude = $latitudeN - ($psiN - $psi) * cos($latitudeN) * (1 - $e2 * sin($latitudeN) ** 2) / (1 - $e2);
        } while (abs($latitude - $latitudeN) >= static::ITERATION_CONVERGENCE_FORMULA);

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Polar Stereographic (variant A)
     * Latitude of natural origin must be either 90 degrees or -90 degrees (or equivalent in alternative angle unit).
     */
    public function polarStereographicVariantA(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $scaleFactorOrigin = $scaleFactorAtNaturalOrigin->asUnity()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;
        $e8 = $e ** 8;

        $rho = hypot($easting, $northing);
        $t = $rho * sqrt((1 + $e) ** (1 + $e) * (1 - $e) ** (1 - $e)) / (2 * $a * $scaleFactorOrigin);

        if ($latitudeOrigin < 0) {
            $chi = 2 * atan($t) - M_PI / 2;
        } else {
            $chi = M_PI / 2 - 2 * atan($t);
        }

        $latitude = $chi + ($e2 / 2 + 5 * $e4 / 24 + $e6 / 12 + 13 * $e8 / 360) * sin(2 * $chi) + (7 * $e4 / 48 + 29 * $e6 / 240 + 811 * $e8 / 11520) * sin(4 * $chi) + (7 * $e6 / 120 + 81 * $e8 / 1120) * sin(6 * $chi) + (4279 * $e8 / 161280) * sin(8 * $chi);

        if ($easting === 0.0) {
            $longitude = $longitudeOrigin;
        } elseif ($latitudeOrigin < 0) {
            $longitude = $longitudeOrigin + atan2($easting, $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue());
        } else {
            $longitude = $longitudeOrigin + atan2($easting, $falseNorthing->asMetres()->getValue() - $this->northing->asMetres()->getValue());
        }

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Polar Stereographic (variant B).
     */
    public function polarStereographicVariantB(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfStandardParallel,
        Angle $longitudeOfOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $standardParallel = $latitudeOfStandardParallel->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;
        $e8 = $e ** 8;

        $rho = hypot($easting, $northing);
        if ($standardParallel < 0) {
            $tF = tan(M_PI / 4 + $standardParallel / 2) / (((1 + $e * sin($standardParallel)) / (1 - $e * sin($standardParallel))) ** ($e / 2));
        } else {
            $tF = tan(M_PI / 4 - $standardParallel / 2) * (((1 + $e * sin($standardParallel)) / (1 - $e * sin($standardParallel))) ** ($e / 2));
        }
        $mF = cos($standardParallel) / sqrt(1 - $e2 * sin($standardParallel) ** 2);
        $kO = $mF * sqrt((1 + $e) ** (1 + $e) * (1 - $e) ** (1 - $e)) / (2 * $tF);
        $t = $rho * sqrt((1 + $e) ** (1 + $e) * (1 - $e) ** (1 - $e)) / (2 * $a * $kO);

        if ($standardParallel < 0) {
            $chi = 2 * atan($t) - M_PI / 2;
        } else {
            $chi = M_PI / 2 - 2 * atan($t);
        }

        $latitude = $chi + ($e2 / 2 + 5 * $e4 / 24 + $e6 / 12 + 13 * $e8 / 360) * sin(2 * $chi) + (7 * $e4 / 48 + 29 * $e6 / 240 + 811 * $e8 / 11520) * sin(4 * $chi) + (7 * $e6 / 120 + 81 * $e8 / 1120) * sin(6 * $chi) + (4279 * $e8 / 161280) * sin(8 * $chi);

        if ($easting === 0.0) {
            $longitude = $longitudeOrigin;
        } elseif ($standardParallel < 0) {
            $longitude = $longitudeOrigin + atan2($easting, $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue());
        } else {
            $longitude = $longitudeOrigin + atan2($easting, $falseNorthing->asMetres()->getValue() - $this->northing->asMetres()->getValue());
        }

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Polar Stereographic (variant C).
     */
    public function polarStereographicVariantC(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfStandardParallel,
        Angle $longitudeOfOrigin,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $eastingAtFalseOrigin->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $northingAtFalseOrigin->asMetres()->getValue();
        $standardParallel = $latitudeOfStandardParallel->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;
        $e8 = $e ** 8;

        if ($standardParallel < 0) {
            $tF = tan(M_PI / 4 + $standardParallel / 2) / (((1 + $e * sin($standardParallel)) / (1 - $e * sin($standardParallel))) ** ($e / 2));
        } else {
            $tF = tan(M_PI / 4 - $standardParallel / 2) * (((1 + $e * sin($standardParallel)) / (1 - $e * sin($standardParallel))) ** ($e / 2));
        }
        $mF = cos($standardParallel) / sqrt(1 - $e2 * sin($standardParallel) ** 2);
        $rhoF = $a * $mF;
        if ($standardParallel < 0) {
            $rho = hypot($easting, $northing + $rhoF);
            $t = $rho * $tF / $rhoF;
            $chi = 2 * atan($t) - M_PI / 2;
        } else {
            $rho = hypot($easting, $northing - $rhoF);
            $t = $rho * $tF / $rhoF;
            $chi = M_PI / 2 - 2 * atan($t);
        }

        $latitude = $chi + ($e2 / 2 + 5 * $e4 / 24 + $e6 / 12 + 13 * $e8 / 360) * sin(2 * $chi) + (7 * $e4 / 48 + 29 * $e6 / 240 + 811 * $e8 / 11520) * sin(4 * $chi) + (7 * $e6 / 120 + 81 * $e8 / 1120) * sin(6 * $chi) + (4279 * $e8 / 161280) * sin(8 * $chi);

        if ($easting === 0.0) {
            $longitude = $longitudeOrigin;
        } elseif ($standardParallel < 0) {
            $longitude = $longitudeOrigin + atan2($easting, $this->northing->asMetres()->getValue() - $northingAtFalseOrigin->asMetres()->getValue() + $rhoF);
        } else {
            $longitude = $longitudeOrigin + atan2($easting, $northingAtFalseOrigin->asMetres()->getValue() - $this->northing->asMetres()->getValue() + $rhoF);
        }

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Popular Visualisation Pseudo Mercator
     * Applies spherical formulas to the ellipsoid. As such does not have the properties of a true Mercator projection.
     */
    public function popularVisualisationPseudoMercator(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();

        $D = -$northing / $a;
        $latitude = M_PI / 2 - 2 * atan(M_E ** $D);
        $longitude = $easting / $a + $longitudeOrigin;

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Similarity transformation
     * Defined for two-dimensional coordinate systems.
     */
    public function similarityTransformation(
        Projected $to,
        Length $ordinate1OfEvaluationPointInTargetCRS,
        Length $ordinate2OfEvaluationPointInTargetCRS,
        Scale $scaleFactorForSourceCRSAxes,
        Angle $rotationAngleOfSourceCRSAxes,
        bool $inReverse
    ): self {
        $xs = $this->easting->asMetres()->getValue();
        $ys = $this->northing->asMetres()->getValue();
        $xo = $ordinate1OfEvaluationPointInTargetCRS->asMetres()->getValue();
        $yo = $ordinate2OfEvaluationPointInTargetCRS->asMetres()->getValue();
        $M = $scaleFactorForSourceCRSAxes->asUnity()->getValue();
        $theta = $rotationAngleOfSourceCRSAxes->asRadians()->getValue();

        if ($inReverse) {
            $easting = (($xs - $xo) * cos($theta) - ($ys - $yo) * sin($theta)) / $M;
            $northing = (($xs - $xo) * sin($theta) + ($ys - $yo) * cos($theta)) / $M;
        } else {
            $easting = $xo + $xs * $M * cos($theta) + $ys * $M * sin($theta);
            $northing = $yo - $xs * $M * sin($theta) + $ys * $M * cos($theta);
        }

        return self::create($to, new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $this->epoch);
    }

    /**
     * Mercator (variant A)
     * Note that in these formulas the parameter latitude of natural origin (latO) is not used. However for this
     * Mercator (variant A) method the EPSG dataset includes this parameter, which must have a value of zero, for
     * completeness in CRS labelling.
     */
    public function mercatorVariantA(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $scaleFactorOrigin = $scaleFactorAtNaturalOrigin->asUnity()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;
        $e8 = $e ** 8;

        $t = M_E ** (($falseNorthing->asMetres()->getValue() - $this->northing->asMetres()->getValue()) / ($a * $scaleFactorOrigin));
        $chi = M_PI / 2 - 2 * atan($t);

        $latitude = $chi + ($e2 / 2 + 5 * $e4 / 24 + $e6 / 12 + 13 * $e8 / 360) * sin(2 * $chi) + (7 * $e4 / 48 + 29 * $e6 / 240 + 811 * $e8 / 11520) * sin(4 * $chi) + (7 * $e6 / 120 + 81 * $e8 / 1120) * sin(6 * $chi) + (4279 * $e8 / 161280) * sin(8 * $chi);
        $longitude = $easting / ($a * $scaleFactorOrigin) + $longitudeOrigin;

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Mercator (variant B)
     * Used for most nautical charts.
     */
    public function mercatorVariantB(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOf1stStandardParallel,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $firstStandardParallel = $latitudeOf1stStandardParallel->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;
        $e8 = $e ** 8;

        $scaleFactorOrigin = cos($firstStandardParallel) / sqrt(1 - $e2 * sin($firstStandardParallel) ** 2);

        $t = M_E ** (($falseNorthing->asMetres()->getValue() - $this->northing->asMetres()->getValue()) / ($a * $scaleFactorOrigin));
        $chi = M_PI / 2 - 2 * atan($t);

        $latitude = $chi + ($e2 / 2 + 5 * $e4 / 24 + $e6 / 12 + 13 * $e8 / 360) * sin(2 * $chi) + (7 * $e4 / 48 + 29 * $e6 / 240 + 811 * $e8 / 11520) * sin(4 * $chi) + (7 * $e6 / 120 + 81 * $e8 / 1120) * sin(6 * $chi) + (4279 * $e8 / 161280) * sin(8 * $chi);
        $longitude = $easting / ($a * $scaleFactorOrigin) + $longitudeOrigin;

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Hotine Oblique Mercator (variant A).
     */
    public function obliqueMercatorHotineVariantA(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfProjectionCentre,
        Angle $longitudeOfProjectionCentre,
        Angle $azimuthOfInitialLine,
        Angle $angleFromRectifiedToSkewGrid,
        Scale $scaleFactorOnInitialLine,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latC = $latitudeOfProjectionCentre->asRadians()->getValue();
        $lonC = $longitudeOfProjectionCentre->asRadians()->getValue();
        $alphaC = $azimuthOfInitialLine->asRadians()->getValue();
        $kC = $scaleFactorOnInitialLine->asUnity()->getValue();
        $gammaC = $angleFromRectifiedToSkewGrid->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;
        $e8 = $e ** 8;

        $B = sqrt(1 + ($e2 * cos($latC) ** 4 / (1 - $e2)));
        $A = $a * $B * $kC * sqrt(1 - $e2) / (1 - $e2 * sin($latC) ** 2);
        $tO = tan(M_PI / 4 - $latC / 2) / ((1 - $e * sin($latC)) / (1 + $e * sin($latC))) ** ($e / 2);
        $D = $B * sqrt(1 - $e2) / (cos($latC) * sqrt(1 - $e2 * sin($latC) ** 2));
        $DD = max(1, $D ** 2);
        $F = $D + sqrt($DD - 1) * static::sign($latC);
        $H = $F * $tO ** $B;
        $G = ($F - 1 / $F) / 2;
        $gammaO = self::asin(sin($alphaC) / $D);
        $lonO = $lonC - self::asin($G * tan($gammaO)) / $B;

        $v = $easting * cos($gammaC) - $northing * sin($gammaC);
        $u = $northing * cos($gammaC) + $easting * sin($gammaC);

        $Q = M_E ** -($B * $v / $A);
        $S = ($Q - 1 / $Q) / 2;
        $T = ($Q + 1 / $Q) / 2;
        $V = sin($B * $u / $A);
        $U = ($V * cos($gammaO) + $S * sin($gammaO)) / $T;
        $t = ($H / sqrt((1 + $U) / (1 - $U))) ** (1 / $B);

        $chi = M_PI / 2 - 2 * atan($t);

        $latitude = $chi + sin(2 * $chi) * ($e2 / 2 + 5 * $e4 / 24 + $e6 / 12 + 13 * $e8 / 360) + sin(4 * $chi) * (7 * $e4 / 48 + 29 * $e6 / 240 + 811 * $e8 / 11520) + sin(6 * $chi) * (7 * $e6 / 120 + 81 * $e8 / 1120) + sin(8 * $chi) * (4279 * $e8 / 161280);
        $longitude = $lonO - atan2($S * cos($gammaO) - $V * sin($gammaO), cos($B * $u / $A)) / $B;

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Hotine Oblique Mercator (variant B).
     */
    public function obliqueMercatorHotineVariantB(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfProjectionCentre,
        Angle $longitudeOfProjectionCentre,
        Angle $azimuthOfInitialLine,
        Angle $angleFromRectifiedToSkewGrid,
        Scale $scaleFactorOnInitialLine,
        Length $eastingAtProjectionCentre,
        Length $northingAtProjectionCentre
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $eastingAtProjectionCentre->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $northingAtProjectionCentre->asMetres()->getValue();
        $latC = $latitudeOfProjectionCentre->asRadians()->getValue();
        $lonC = $longitudeOfProjectionCentre->asRadians()->getValue();
        $alphaC = $azimuthOfInitialLine->asRadians()->getValue();
        $kC = $scaleFactorOnInitialLine->asUnity()->getValue();
        $gammaC = $angleFromRectifiedToSkewGrid->asRadians()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;
        $e8 = $e ** 8;

        $B = sqrt(1 + ($e2 * cos($latC) ** 4 / (1 - $e2)));
        $A = $a * $B * $kC * sqrt(1 - $e2) / (1 - $e2 * sin($latC) ** 2);
        $tO = tan(M_PI / 4 - $latC / 2) / ((1 - $e * sin($latC)) / (1 + $e * sin($latC))) ** ($e / 2);
        $D = $B * sqrt(1 - $e2) / (cos($latC) * sqrt(1 - $e2 * sin($latC) ** 2));
        $DD = max(1, $D ** 2);
        $F = $D + sqrt($DD - 1) * static::sign($latC);
        $H = $F * $tO ** $B;
        $G = ($F - 1 / $F) / 2;
        $gammaO = self::asin(sin($alphaC) / $D);
        $lonO = $lonC - self::asin($G * tan($gammaO)) / $B;
        $vC = 0;
        if ($alphaC === M_PI / 2) {
            $uC = $A * ($lonC - $lonO);
        } else {
            $uC = ($A / $B) * atan2(sqrt($DD - 1), cos($alphaC)) * static::sign($latC);
        }

        $v = $easting * cos($gammaC) - $northing * sin($gammaC);
        $u = $northing * cos($gammaC) + $easting * sin($gammaC) + (abs($uC) * static::sign($latC));

        $Q = M_E ** -($B * $v / $A);
        $S = ($Q - 1 / $Q) / 2;
        $T = ($Q + 1 / $Q) / 2;
        $V = sin($B * $u / $A);
        $U = ($V * cos($gammaO) + $S * sin($gammaO)) / $T;
        $t = ($H / sqrt((1 + $U) / (1 - $U))) ** (1 / $B);

        $chi = M_PI / 2 - 2 * atan($t);

        $latitude = $chi + sin(2 * $chi) * ($e2 / 2 + 5 * $e4 / 24 + $e6 / 12 + 13 * $e8 / 360) + sin(4 * $chi) * (7 * $e4 / 48 + 29 * $e6 / 240 + 811 * $e8 / 11520) + sin(6 * $chi) * (7 * $e6 / 120 + 81 * $e8 / 1120) + sin(8 * $chi) * (4279 * $e8 / 161280);
        $longitude = $lonO - atan2($S * cos($gammaO) - $V * sin($gammaO), cos($B * $u / $A)) / $B;

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Laborde Oblique Mercator.
     */
    public function obliqueMercatorLaborde(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfProjectionCentre,
        Angle $longitudeOfProjectionCentre,
        Angle $azimuthOfInitialLine,
        Scale $scaleFactorOnInitialLine,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latC = $latitudeOfProjectionCentre->asRadians()->getValue();
        $lonC = $longitudeOfProjectionCentre->asRadians()->getValue();
        $alphaC = $azimuthOfInitialLine->asRadians()->getValue();
        $kC = $scaleFactorOnInitialLine->asUnity()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $e2 = $ellipsoid->getEccentricitySquared();

        $B = sqrt(1 + ($e2 * cos($latC) ** 4 / (1 - $e2)));
        $latS = self::asin(sin($latC) / $B);
        $R = $a * $kC * (sqrt(1 - $e2) / (1 - $e2 * sin($latC) ** 2));
        $C = log(tan(M_PI / 4 + $latS / 2)) - $B * log(tan(M_PI / 4 + $latC / 2) * ((1 - $e * sin($latC)) / (1 + $e * sin($latC))) ** ($e / 2));

        $G = (new ComplexNumber(1 - cos(2 * $alphaC), sin(2 * $alphaC)))->divide(new ComplexNumber(12, 0));

        $H0 = new ComplexNumber($northing / $R, $easting / $R);
        $H = $H0->divide($H0->pow(3)->multiply($G)->add($H0));
        do {
            $HN = $H;
            $H = $HN->pow(3)->multiply($G)->multiply(new ComplexNumber(2, 0))->add($H0)->divide($HN->pow(2)->multiply($G)->multiply(new ComplexNumber(3, 0))->add(new ComplexNumber(1, 0)));
        } while (abs($H0->subtract($H)->subtract($H->pow(3)->multiply($G))->getReal()) >= static::ITERATION_CONVERGENCE_FORMULA);

        $LPrime = -1 * $H->getReal();
        $PPrime = 2 * atan(M_E ** $H->getImaginary()) - M_PI / 2;
        $U = cos($PPrime) * cos($LPrime) * cos($latS) + cos($PPrime) * sin($LPrime) * sin($latS);
        $V = sin($PPrime);
        $W = cos($PPrime) * cos($LPrime) * sin($latS) - cos($PPrime) * sin($LPrime) * cos($latS);

        $d = hypot($U, $V);
        if ($d === 0.0) {
            $L = 0;
            $P = static::sign($W) * M_PI / 2;
        } else {
            $L = 2 * atan($V / ($U + $d));
            $P = atan($W / $d);
        }

        $longitude = $lonC + ($L / $B);

        $q = (log(tan(M_PI / 4 + $P / 2)) - $C) / $B;

        $latitude = 2 * atan(M_E ** $q) - M_PI / 2;
        do {
            $latitudeN = $latitude;
            $latitude = 2 * atan(((1 + $e * sin($latitude)) / (1 - $e * sin($latitude))) ** ($e / 2) * M_E ** $q) - M_PI / 2;
        } while (abs($latitude - $latitudeN) >= static::ITERATION_CONVERGENCE_FORMULA);

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), null, $this->epoch);
    }

    /**
     * Transverse Mercator.
     */
    public function transverseMercator(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $kO = $scaleFactorAtNaturalOrigin->asUnity()->getValue();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $e = $ellipsoid->getEccentricity();
        $f = $ellipsoid->getFlattening();

        $n = $f / (2 - $f);
        $B = ($a / (1 + $n)) * (1 + $n ** 2 / 4 + $n ** 4 / 64 + $n ** 6 / 256 + (25 / 16384) * $n ** 8);

        $h1 = $n / 2 - (2 / 3) * $n ** 2 + (5 / 16) * $n ** 3 + (41 / 180) * $n ** 4 - (127 / 288) * $n ** 5 + (7891 / 37800) * $n ** 6 + (72161 / 387072) * $n ** 7 - (18975107 / 50803200) * $n ** 8;
        $h2 = (13 / 48) * $n ** 2 - (3 / 5) * $n ** 3 + (557 / 1440) * $n ** 4 + (281 / 630) * $n ** 5 - (1983433 / 1935360) * $n ** 6 + (13769 / 28800) * $n ** 7 + (148003883 / 174182400) * $n ** 8;
        $h3 = (61 / 240) * $n ** 3 - (103 / 140) * $n ** 4 + (15061 / 26880) * $n ** 5 + (167603 / 181440) * $n ** 6 - (67102379 / 29030400) * $n ** 7 + (79682431 / 79833600) * $n ** 8;
        $h4 = (49561 / 161280) * $n ** 4 - (179 / 168) * $n ** 5 + (6601661 / 7257600) * $n ** 6 + (97445 / 49896) * $n ** 7 - (40176129013 / 7664025600) * $n ** 8;
        $h5 = (34729 / 80640) * $n ** 5 - (3418889 / 1995840) * $n ** 6 + (14644087 / 9123840) * $n ** 7 + (2605413599 / 622702080) * $n ** 8;
        $h6 = (212378941 / 319334400) * $n ** 6 - (30705481 / 10378368) * $n ** 7 + (175214326799 / 58118860800) * $n ** 8;
        $h7 = (1522256789 / 1383782400) * $n ** 7 - (16759934899 / 3113510400) * $n ** 8;
        $h8 = (1424729850961 / 743921418240) * $n ** 8;

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
            $xiO5 = $h5 * sin(10 * $xiO0);
            $xiO6 = $h6 * sin(12 * $xiO0);
            $xiO7 = $h7 * sin(14 * $xiO0);
            $xiO8 = $h8 * sin(16 * $xiO0);
            $xiO = $xiO0 + $xiO1 + $xiO2 + $xiO3 + $xiO4 + $xiO5 + $xiO6 + $xiO7 + $xiO8;
            $mO = $B * $xiO;
        }

        $h1 = $n / 2 - (2 / 3) * $n ** 2 + (37 / 96) * $n ** 3 - (1 / 360) * $n ** 4 - (81 / 512) * $n ** 5 + (96199 / 604800) * $n ** 6 - (5406467 / 38707200) * $n ** 7 + (7944359 / 67737600) * $n ** 8;
        $h2 = (1 / 48) * $n ** 2 + (1 / 15) * $n ** 3 - (437 / 1440) * $n ** 4 + (46 / 105) * $n ** 5 - (1118711 / 3870720) * $n ** 6 + (51841 / 1209600) * $n ** 7 + (24749483 / 348364800) * $n ** 8;
        $h3 = (17 / 480) * $n ** 3 - (37 / 840) * $n ** 4 - (209 / 4480) * $n ** 5 + (5569 / 90720) * $n ** 6 + (9261899 / 58060800) * $n ** 7 - (6457463 / 17740800) * $n ** 8;
        $h4 = (4397 / 161280) * $n ** 4 - (11 / 504) * $n ** 5 - (830251 / 7257600) * $n ** 6 + (466511 / 2494800) * $n ** 7 + (324154477 / 7664025600) * $n ** 8;
        $h5 = (4583 / 161280) * $n ** 5 - (108847 / 3991680) * $n ** 6 - (8005831 / 63866880) * $n ** 7 + (22894433 / 124540416) * $n ** 8;
        $h6 = (20648693 / 638668800) * $n ** 6 - (16363163 / 518918400) * $n ** 7 - (2204645983 / 12915302400) * $n ** 8;
        $h7 = (219941297 / 5535129600) * $n ** 7 - (497323811 / 12454041600) * $n ** 8;
        $h8 = (191773887257 / 3719607091200) * $n ** 8;

        $eta = $easting / ($B * $kO);
        $xi = ($northing + $kO * $mO) / ($B * $kO);
        $xi1 = $h1 * sin(2 * $xi) * cosh(2 * $eta);
        $eta1 = $h1 * cos(2 * $xi) * sinh(2 * $eta);
        $xi2 = $h2 * sin(4 * $xi) * cosh(4 * $eta);
        $eta2 = $h2 * cos(4 * $xi) * sinh(4 * $eta);
        $xi3 = $h3 * sin(6 * $xi) * cosh(6 * $eta);
        $eta3 = $h3 * cos(6 * $xi) * sinh(6 * $eta);
        $xi4 = $h4 * sin(8 * $xi) * cosh(8 * $eta);
        $eta4 = $h4 * cos(8 * $xi) * sinh(8 * $eta);
        $xi5 = $h5 * sin(10 * $xi) * cosh(10 * $eta);
        $eta5 = $h5 * cos(10 * $xi) * sinh(10 * $eta);
        $xi6 = $h6 * sin(12 * $xi) * cosh(12 * $eta);
        $eta6 = $h6 * cos(12 * $xi) * sinh(12 * $eta);
        $xi7 = $h7 * sin(14 * $xi) * cosh(14 * $eta);
        $eta7 = $h7 * cos(14 * $xi) * sinh(14 * $eta);
        $xi8 = $h8 * sin(16 * $xi) * cosh(16 * $eta);
        $eta8 = $h8 * cos(16 * $xi) * sinh(16 * $eta);
        $xi0 = $xi - $xi1 - $xi2 - $xi3 - $xi4 - $xi5 - $xi6 - $xi7 - $xi8;
        $eta0 = $eta - $eta1 - $eta2 - $eta3 - $eta4 - $eta5 - $eta6 - $eta7 - $eta8;

        $beta = self::asin(sin($xi0) / cosh($eta0));

        $QPrime = asinh(tan($beta));
        $Q = asinh(tan($beta));
        do {
            $QN = $Q;
            $Q = $QPrime + ($e * atanh($e * tanh($Q)));
        } while (abs($Q - $QN) >= static::ITERATION_CONVERGENCE_FORMULA);

        $latitude = atan(sinh($Q));
        $longitude = $longitudeOrigin + self::asin(tanh($eta0) / cos($beta));

        $height = $this->height && $to instanceof Geographic3D ? $this->height : null;

        return GeographicPoint::create($to, new Radian($latitude), new Radian($longitude), $height, $this->epoch);
    }

    /**
     * Transverse Mercator Zoned Grid System
     * If locations fall outwith the fixed zones the general Transverse Mercator method (code 9807) must be used for
     * each zone.
     */
    public function transverseMercatorZonedGrid(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $initialLongitude,
        Angle $zoneWidth,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $Z = (int) substr((string) $this->easting->asMetres()->getValue(), 0, 2);
        $falseEasting = $falseEasting->add(new Metre($Z * 1000000));

        $W = $zoneWidth->asDegrees()->getValue();
        $longitudeOrigin = $initialLongitude->add(new Degree($Z * $W - $W / 2));

        return $this->transverseMercator($to, $latitudeOfNaturalOrigin, $longitudeOrigin, $scaleFactorAtNaturalOrigin, $falseEasting, $falseNorthing);
    }

    /**
     * General polynomial.
     * @param Coefficient[] $powerCoefficients
     */
    public function generalPolynomial(
        Projected $to,
        Length $ordinate1OfEvaluationPointInSourceCRS,
        Length $ordinate2OfEvaluationPointInSourceCRS,
        Length $ordinate1OfEvaluationPointInTargetCRS,
        Length $ordinate2OfEvaluationPointInTargetCRS,
        Scale $scalingFactorForSourceCRSCoordDifferences,
        Scale $scalingFactorForTargetCRSCoordDifferences,
        Scale $A0,
        Scale $B0,
        array $powerCoefficients
    ): self {
        $xs = $this->easting->getValue();
        $ys = $this->northing->getValue();

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

        return static::createFromEastingNorthing(
            $to,
            Length::makeUnit($t['xt'], $xtUnit),
            Length::makeUnit($t['yt'], $ytUnit),
            $this->epoch
        );
    }

    /**
     * New Zealand Map Grid.
     */
    public function newZealandMapGrid(
        Geographic2D|Geographic3D $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $ellipsoid = $this->crs->getDatum()->getEllipsoid();
        $a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();

        $z = new ComplexNumber(
            $this->northing->subtract($falseNorthing)->divide($a)->asMetres()->getValue(),
            $this->easting->subtract($falseEasting)->divide($a)->asMetres()->getValue(),
        );

        $B1 = new ComplexNumber(0.7557853228, 0.0);
        $B2 = new ComplexNumber(0.249204646, 0.003371507);
        $B3 = new ComplexNumber(-0.001541739, 0.041058560);
        $B4 = new ComplexNumber(-0.10162907, 0.01727609);
        $B5 = new ComplexNumber(-0.26623489, -0.36249218);
        $B6 = new ComplexNumber(-0.6870983, -1.1651967);
        $b1 = new ComplexNumber(1.3231270439, 0.0);
        $b2 = new ComplexNumber(-0.577245789, -0.007809598);
        $b3 = new ComplexNumber(0.508307513, -0.112208952);
        $b4 = new ComplexNumber(-0.15094762, 0.18200602);
        $b5 = new ComplexNumber(1.01418179, 1.64497696);
        $b6 = new ComplexNumber(1.9660549, 2.5127645);

        $zeta = new ComplexNumber(0, 0);
        $zeta = $zeta->add($b1->multiply($z->pow(1)));
        $zeta = $zeta->add($b2->multiply($z->pow(2)));
        $zeta = $zeta->add($b3->multiply($z->pow(3)));
        $zeta = $zeta->add($b4->multiply($z->pow(4)));
        $zeta = $zeta->add($b5->multiply($z->pow(5)));
        $zeta = $zeta->add($b6->multiply($z->pow(6)));

        for ($iterations = 0; $iterations < 2; ++$iterations) {
            $numerator = $z;
            $numerator = $numerator->add($B2->multiply($zeta->pow(2))->multiply(new ComplexNumber(1, 0)));
            $numerator = $numerator->add($B3->multiply($zeta->pow(3))->multiply(new ComplexNumber(2, 0)));
            $numerator = $numerator->add($B4->multiply($zeta->pow(4))->multiply(new ComplexNumber(3, 0)));
            $numerator = $numerator->add($B5->multiply($zeta->pow(5))->multiply(new ComplexNumber(4, 0)));
            $numerator = $numerator->add($B6->multiply($zeta->pow(6))->multiply(new ComplexNumber(5, 0)));

            $denominator = $B1;
            $denominator = $denominator->add($B2->multiply($zeta->pow(1))->multiply(new ComplexNumber(2, 0)));
            $denominator = $denominator->add($B3->multiply($zeta->pow(2))->multiply(new ComplexNumber(3, 0)));
            $denominator = $denominator->add($B4->multiply($zeta->pow(3))->multiply(new ComplexNumber(4, 0)));
            $denominator = $denominator->add($B5->multiply($zeta->pow(4))->multiply(new ComplexNumber(5, 0)));
            $denominator = $denominator->add($B6->multiply($zeta->pow(5))->multiply(new ComplexNumber(6, 0)));

            $zeta = $numerator->divide($denominator);
        }

        $deltaPsi = $zeta->getReal();
        $deltaLatitudeToOrigin = 0;
        $deltaLatitudeToOrigin += 1.5627014243 * $deltaPsi ** 1;
        $deltaLatitudeToOrigin += 0.5185406398 * $deltaPsi ** 2;
        $deltaLatitudeToOrigin += -0.03333098 * $deltaPsi ** 3;
        $deltaLatitudeToOrigin += -0.1052906 * $deltaPsi ** 4;
        $deltaLatitudeToOrigin += -0.0368594 * $deltaPsi ** 5;
        $deltaLatitudeToOrigin += 0.007317 * $deltaPsi ** 6;
        $deltaLatitudeToOrigin += 0.01220 * $deltaPsi ** 7;
        $deltaLatitudeToOrigin += 0.00394 * $deltaPsi ** 8;
        $deltaLatitudeToOrigin += -0.0013 * $deltaPsi ** 9;

        $latitude = $latitudeOfNaturalOrigin->add(new ArcSecond($deltaLatitudeToOrigin / 0.00001));
        $longitude = $longitudeOfNaturalOrigin->add(new Radian($zeta->getImaginary()));

        return GeographicPoint::create($to, $latitude, $longitude, null, $this->epoch);
    }

    /**
     * Complex polynomial.
     * Coordinate pairs treated as complex numbers.  This exploits the correlation between the polynomial coefficients
     * and leads to a smaller number of coefficients than the general polynomials.
     */
    public function complexPolynomial(
        Projected $to,
        Length $ordinate1OfEvaluationPointInSourceCRS,
        Length $ordinate2OfEvaluationPointInSourceCRS,
        Length $ordinate1OfEvaluationPointInTargetCRS,
        Length $ordinate2OfEvaluationPointInTargetCRS,
        Scale $scalingFactorForSourceCRSCoordDifferences,
        Scale $scalingFactorForTargetCRSCoordDifferences,
        Scale $A1,
        Scale $A2,
        Scale $A3,
        Scale $A4,
        Scale $A5,
        Scale $A6,
        ?Scale $A7 = null,
        ?Scale $A8 = null
    ): self {
        $xs = $this->easting->getValue();
        $ys = $this->northing->getValue();
        $xso = $ordinate1OfEvaluationPointInSourceCRS->getValue();
        $yso = $ordinate2OfEvaluationPointInSourceCRS->getValue();
        $xto = $ordinate1OfEvaluationPointInTargetCRS->getValue();
        $yto = $ordinate2OfEvaluationPointInTargetCRS->getValue();

        $U = $scalingFactorForSourceCRSCoordDifferences->asUnity()->getValue() * ($xs - $xso);
        $V = $scalingFactorForSourceCRSCoordDifferences->asUnity()->getValue() * ($ys - $yso);

        $mTdXdY = new ComplexNumber(0, 0);
        $mTdXdY = $mTdXdY->add((new ComplexNumber($A1->getValue(), $A2->getValue()))->multiply(new ComplexNumber($U, $V))->pow(1));
        $mTdXdY = $mTdXdY->add((new ComplexNumber($A3->getValue(), $A4->getValue()))->multiply((new ComplexNumber($U, $V))->pow(2)));
        $mTdXdY = $mTdXdY->add((new ComplexNumber($A5->getValue(), $A6->getValue()))->multiply((new ComplexNumber($U, $V))->pow(3)));
        $mTdXdY = $mTdXdY->add((new ComplexNumber($A7 ? $A7->getValue() : 0, $A8 ? $A8->getValue() : 0))->multiply((new ComplexNumber($U, $V))->pow(4)));

        $xt = $xs - $xso + $xto + $mTdXdY->getReal() / $scalingFactorForTargetCRSCoordDifferences->asUnity()->getValue();
        $yt = $ys - $yso + $yto + $mTdXdY->getImaginary() / $scalingFactorForTargetCRSCoordDifferences->asUnity()->getValue();

        $xtUnit = $to->getCoordinateSystem()->getAxes()[0]->getUnitOfMeasureId();
        $ytUnit = $to->getCoordinateSystem()->getAxes()[1]->getUnitOfMeasureId();

        return static::createFromEastingNorthing(
            $to,
            Length::makeUnit($xt, $xtUnit),
            Length::makeUnit($yt, $ytUnit),
            $this->epoch
        );
    }

    /**
     * Ordnance Survey National Transformation
     * Geodetic transformation between ETRS89 (or WGS 84) and OSGB36 / National Grid.  Uses ETRS89 / National Grid as
     * an intermediate coordinate system for bi-linear interpolation of gridded grid coordinate differences.
     */
    public function OSTN15(
        Geographic2D $to,
        OSTNOSGM15Grid $eastingAndNorthingDifferenceFile
    ): GeographicPoint {
        $asETRS89 = $eastingAndNorthingDifferenceFile->applyReverseHorizontalAdjustment($this);

        return $asETRS89->transverseMercator($to, new Degree(49), new Degree(-2), new Unity(0.9996012717), new Metre(400000), new Metre(-100000));
    }
}
