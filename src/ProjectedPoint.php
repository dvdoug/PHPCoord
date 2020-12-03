<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

use function abs;
use function asin;
use function atan2;
use function cos;
use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use function implode;
use function log;
use PHPCoord\CoordinateReferenceSystem\Geographic;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateSystem\Axis;
use PHPCoord\Exception\InvalidAxesException;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\Exception\UnknownAxisException;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Angle\ArcSecond;
use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Scale\Coefficient;
use PHPCoord\UnitOfMeasure\Scale\Scale;
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;
use function sin;
use function sqrt;
use function tan;

/**
 * Coordinate representing a point on a map projection.
 */
class ProjectedPoint extends Point
{
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
     * Coordinate reference system.
     */
    protected Projected $crs;

    /**
     * Coordinate epoch (date for which the specified coordinates represented this point).
     */
    protected ?DateTimeImmutable $epoch;

    protected function __construct(?Length $easting, ?Length $northing, ?Length $westing, ?Length $southing, Projected $crs, ?DateTimeInterface $epoch = null)
    {
        $this->crs = $crs;

        $eastingAxis = $this->getAxisByName(Axis::EASTING);
        $westingAxis = $this->getAxisByName(Axis::WESTING);
        $northingAxis = $this->getAxisByName(Axis::NORTHING);
        $southingAxis = $this->getAxisByName(Axis::SOUTHING);

        if ($easting && $eastingAxis) {
            $this->easting = UnitOfMeasureFactory::convertLength($easting, $eastingAxis->getUnitOfMeasureId());
            $this->westing = UnitOfMeasureFactory::makeUnit(-$this->easting->getValue(), $eastingAxis->getUnitOfMeasureId());
        } elseif ($westing && $westingAxis) {
            $this->westing = UnitOfMeasureFactory::convertLength($westing, $westingAxis->getUnitOfMeasureId());
            $this->easting = UnitOfMeasureFactory::makeUnit(-$this->westing->getValue(), $westingAxis->getUnitOfMeasureId());
        } else {
            throw new InvalidAxesException($crs->getCoordinateSystem()->getAxes());
        }

        if ($northing && $northingAxis) {
            $this->northing = UnitOfMeasureFactory::convertLength($northing, $northingAxis->getUnitOfMeasureId());
            $this->southing = UnitOfMeasureFactory::makeUnit(-$this->northing->getValue(), $northingAxis->getUnitOfMeasureId());
        } elseif ($southing && $southingAxis) {
            $this->southing = UnitOfMeasureFactory::convertLength($southing, $southingAxis->getUnitOfMeasureId());
            $this->northing = UnitOfMeasureFactory::makeUnit(-$this->southing->getValue(), $southingAxis->getUnitOfMeasureId());
        } else {
            throw new InvalidAxesException($crs->getCoordinateSystem()->getAxes());
        }

        if ($epoch instanceof DateTime) {
            $epoch = DateTimeImmutable::createFromMutable($epoch);
        }
        $this->epoch = $epoch;
    }

    public static function create(?Length $easting, ?Length $northing, ?Length $westing, ?Length $southing, Projected $crs, ?DateTimeInterface $epoch = null): self
    {
        if ($crs->getSRID() === Projected::EPSG_OSGB_1936_BRITISH_NATIONAL_GRID) {
            return new BritishNationalGridPoint($easting, $northing, $epoch);
        }

        if ($crs->getSRID() === Projected::EPSG_TM75_IRISH_GRID) {
            return new IrishGridPoint($easting, $northing, $epoch);
        }

        if ($crs->getSRID() === Projected::EPSG_IRENET95_IRISH_TRANSVERSE_MERCATOR) {
            return new IrishTransverseMercatorPoint($easting, $northing, $epoch);
        }

        return new static($easting, $northing, $westing, $southing, $crs, $epoch);
    }

    public static function createFromEastingNorthing(?Length $easting, ?Length $northing, Projected $crs, ?DateTimeInterface $epoch = null): self
    {
        return static::create($easting, $northing, null, null, $crs, $epoch);
    }

    public static function createFromWestingNorthing(?Length $westing, ?Length $northing, Projected $crs, ?DateTimeInterface $epoch = null): self
    {
        return static::create(null, $northing, $westing, null, $crs, $epoch);
    }

    public static function createFromWestingSouthing(?Length $westing, ?Length $southing, Projected $crs, ?DateTimeInterface $epoch = null): self
    {
        return static::create(null, null, $westing, $southing, $crs, $epoch);
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
        if ($to->getCRS()->getSRID() !== $this->crs->getSRID()) {
            throw new InvalidCoordinateReferenceSystemException('Can only calculate distances between two points in the same CRS');
        }

        /* @var ProjectedPoint $to */
        return new Metre(
            sqrt(
                ($to->getEasting()->getValue() - $this->getEasting()->getValue()) ** 2 +
                ($to->getNorthing()->getValue() - $this->getNorthing()->getValue()) ** 2
            )
        );
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

        return static::create(new Metre($xt), new Metre($yt), new Metre(-$xt), new Metre(-$yt), $to, $this->epoch);
    }

    /**
     * Albers Equal Area.
     */
    public function albersEqualArea(
        Geographic $to,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Angle $latitudeOf1stStandardParallel,
        Angle $latitudeOf2ndStandardParallel,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin
    ): GeographicPoint {
        $easting = $this->easting->asMetres()->getValue() - $eastingAtFalseOrigin->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $northingAtFalseOrigin->asMetres()->getValue();
        $phiOrigin = $latitudeOfFalseOrigin->asRadians()->getValue();
        $phi1 = $latitudeOf1stStandardParallel->asRadians()->getValue();
        $phi2 = $latitudeOf2ndStandardParallel->asRadians()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e = $this->crs->getDatum()->getEllipsoid()->getEccentricity();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();
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
        $rhoPrime = sqrt($easting ** 2 + ($rhoOrigin - $northing) ** 2);
        $alphaPrime = ($C - $rhoPrime ** 2 * $n ** 2 / $a ** 2) / $n;
        $betaPrime = asin($alphaPrime / (1 - (1 - $e2) / 2 / $e * log((1 - $e) / (1 + $e))));
        if ($n > 0) {
            $theta = atan2($easting, $rhoOrigin - $northing);
        } else {
            $theta = atan2(-$easting, $northing - $rhoOrigin);
        }

        $latitude = $betaPrime + (($e2 / 3 + 31 * $e4 / 180 + 517 * $e6 / 5040) * sin(2 * $betaPrime)) + ((23 * $e4 / 360 + 251 * $e6 / 3780) * sin(4 * $betaPrime)) + ((761 * $e6 / 45360) * sin(6 * $betaPrime));
        $longitude = $longitudeOfFalseOrigin->asRadians()->getValue() + ($theta / $n);

        return GeographicPoint::create(new Radian($latitude), new Radian($longitude), null, $to, $this->epoch);
    }

    /**
     * American Polyconic.
     */
    public function americanPolyconic(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e = $this->crs->getDatum()->getEllipsoid()->getEccentricity();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();
        $e4 = $this->crs->getDatum()->getEllipsoid()->getEccentricity() ** 4;
        $e6 = $this->crs->getDatum()->getEllipsoid()->getEccentricity() ** 6;

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
            do {
                $latitudeN = $latitude;
                $M = $a * ($i * $latitude - $ii * sin(2 * $latitude) + $iii * sin(4 * $latitude) - $iv * sin(6 * $latitude));
                $C = sqrt(1 - $e2 * sin($latitude) ** 2) * tan($latitude);
                $J = $M / $a;
                $latitude = $latitude - ($A * ($C * $J + 1) - $J - $C * ($J ** 2 + $B) / 2) / ($e2 * sin(2 * $latitude) * ($J ** 2 + $B - 2 * $A * $J) / 4 * $C + ($A - $J) * ($C * $M - (2 / sin(2 * $latitude)) - $M));
            } while (abs($latitude - $latitudeN) >= self::NEWTON_RAPHSON_CONVERGENCE);

            $longitude = $longitudeOrigin + (asin($easting * $C / $a)) / sin($latitude);
        }

        return GeographicPoint::create(new Radian($latitude), new Radian($longitude), null, $to, $this->epoch);
    }

    /**
     * Bonne.
     */
    public function bonne(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e = $this->crs->getDatum()->getEllipsoid()->getEccentricity();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;

        $mO = cos($latitudeOrigin) / sqrt(1 - $e2 * sin($latitudeOrigin) ** 2);
        $MO = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitudeOrigin - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitudeOrigin) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitudeOrigin) - (35 * $e6 / 3072) * sin(6 * $latitudeOrigin));
        $rho = sqrt($easting ** 2 + ($a * $mO / sin($latitudeOrigin) - $northing) ** 2);
        if ($latitudeOrigin < 0) {
            $rho = -$rho;
        }

        $M = $a * $mO / sin($latitudeOrigin) + $MO - $rho;
        $mu = $M / ($a * (1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256));
        $e1 = (1 - sqrt(1 - $e2)) / (1 + sqrt(1 - $e2));

        $latitude = $mu + ((3 * $e1 / 2) - (27 * $e1 ** 3 / 32)) * sin(2 * $mu) + ((21 * $e1 ** 2 / 16) - (55 * $e1 ** 4 / 32)) * sin(4 * $mu) + ((151 * $e1 ** 3 / 96)) * sin(6 * $mu) + ((1097 * $e1 ** 4 / 512)) * sin(8 * $mu);
        $m = cos($latitude) / sqrt(1 - $e2 * sin($latitude) ** 2);

        if ($m === 0.0) {
            $longitude = $longitudeOrigin; // pole
        } elseif ($latitudeOrigin >= 0) {
            $longitude = $longitudeOrigin + $rho * atan2($easting, $a * $mO / sin($latitudeOrigin) - $northing) / $a / $m;
        } else {
            $longitude = $longitudeOrigin + $rho * atan2(-$easting, -($a * $mO / sin($latitudeOrigin) - $northing)) / $a / $m;
        }

        return GeographicPoint::create(new Radian($latitude), new Radian($longitude), null, $to, $this->epoch);
    }

    /**
     * Bonne South Orientated.
     */
    public function bonneSouthOrientated(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $westing = $falseEasting->asMetres()->getValue() - $this->westing->asMetres()->getValue();
        $southing = $falseNorthing->asMetres()->getValue() - $this->southing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e = $this->crs->getDatum()->getEllipsoid()->getEccentricity();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;

        $mO = cos($latitudeOrigin) / sqrt(1 - $e2 * sin($latitudeOrigin) ** 2);
        $MO = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitudeOrigin - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitudeOrigin) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitudeOrigin) - (35 * $e6 / 3072) * sin(6 * $latitudeOrigin));
        $rho = sqrt($westing ** 2 + ($a * $mO / sin($latitudeOrigin) - $southing) ** 2);
        if ($latitudeOrigin < 0) {
            $rho = -$rho;
        }

        $M = $a * $mO / sin($latitudeOrigin) + $MO - $rho;
        $mu = $M / ($a * (1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256));
        $e1 = (1 - sqrt(1 - $e2)) / (1 + sqrt(1 - $e2));

        $latitude = $mu + ((3 * $e1 / 2) - (27 * $e1 ** 3 / 32)) * sin(2 * $mu) + ((21 * $e1 ** 2 / 16) - (55 * $e1 ** 4 / 32)) * sin(4 * $mu) + ((151 * $e1 ** 3 / 96)) * sin(6 * $mu) + ((1097 * $e1 ** 4 / 512)) * sin(8 * $mu);
        $m = cos($latitude) / sqrt(1 - $e2 * sin($latitude) ** 2);

        if ($m === 0.0) {
            $longitude = $longitudeOrigin; // pole
        } elseif ($latitudeOrigin >= 0) {
            $longitude = $longitudeOrigin + $rho * atan2($westing, $a * $mO / sin($latitudeOrigin) - $southing) / $a / $m;
        } else {
            $longitude = $longitudeOrigin + $rho * atan2(-$westing, -($a * $mO / sin($latitudeOrigin) - $southing)) / $a / $m;
        }

        return GeographicPoint::create(new Radian($latitude), new Radian($longitude), null, $to, $this->epoch);
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

        return static::create(new Metre($easting), new Metre($northing), new Metre(-$easting), new Metre(-$northing), $to, $this->epoch);
    }

    /**
     * Cassini-Soldner.
     */
    public function cassiniSoldner(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();
        $e4 = $this->crs->getDatum()->getEllipsoid()->getEccentricity() ** 4;
        $e6 = $this->crs->getDatum()->getEllipsoid()->getEccentricity() ** 6;

        $MO = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitudeOrigin - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitudeOrigin) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitudeOrigin) - (35 * $e6 / 3072) * sin(6 * $latitudeOrigin));

        $e1 = (1 - sqrt(1 - $e2)) / (1 + sqrt(1 - $e2));
        $M = $MO + $northing;
        $mu = $M / ($a * (1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256));
        $latitudeCentralMeridian = $mu + (3 * $e1 / 2 - 27 * $e1 ** 3 / 32) * sin(2 * $mu) + (21 * $e1 ** 2 / 16 - 55 * $e1 ** 4 / 32) * sin(4 * $mu) + (151 * $e1 ** 3 / 96) * sin(6 * $mu) + (1097 * $e1 ** 4 / 512) * sin(8 * $mu);

        $nu = $a / sqrt((1 - $e2 * sin($latitudeCentralMeridian) ** 2));
        $rho = $a * (1 - $e2) / (1 - $e2 * sin($latitudeCentralMeridian) ** 2) ** 1.5;

        $T = tan($latitudeCentralMeridian) ** 2;
        $D = $easting / $nu;

        $latitude = $latitudeCentralMeridian - ($nu * tan($latitudeCentralMeridian) / $rho) * ($D ** 2 / 2 - (1 + 3 * $T) * $D ** 4 / 24);
        $longitude = $longitudeOrigin + ($D - $T * $D ** 3 / 3 + (1 + 3 * $T) * $T * $D ** 5 / 15) / cos($latitudeCentralMeridian);

        return GeographicPoint::create(new Radian($latitude), new Radian($longitude), null, $to, $this->epoch);
    }

    /**
     * Hyperbolic Cassini-Soldner.
     */
    public function hyperbolicCassiniSoldner(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();
        $e4 = $this->crs->getDatum()->getEllipsoid()->getEccentricity() ** 4;
        $e6 = $this->crs->getDatum()->getEllipsoid()->getEccentricity() ** 6;

        $MO = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitudeOrigin - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitudeOrigin) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitudeOrigin) - (35 * $e6 / 3072) * sin(6 * $latitudeOrigin));
        $e1 = (1 - sqrt(1 - $e2)) / (1 + sqrt(1 - $e2));

        $latitude1 = $latitudeOrigin + $northing / 1567446;

        $nu = $a / sqrt((1 - $e2 * sin($latitude1) ** 2));
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

        return GeographicPoint::create(new Radian($latitude), new Radian($longitude), null, $to, $this->epoch);
    }

    /**
     * Colombia Urban.
     */
    public function columbiaUrban(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing,
        Length $projectionPlaneOriginHeight
    ): GeographicPoint {
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $heightOrigin = $projectionPlaneOriginHeight->asMetres()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();

        $rhoOrigin = $a * (1 - $e2) / (1 - $e2 * sin($latitudeOrigin) ** 2) ** 1.5;

        $nuOrigin = $a / sqrt(1 - $e2 * (sin($latitudeOrigin) ** 2));

        $B = tan($latitudeOrigin) / (2 * $rhoOrigin * $nuOrigin);
        $C = 1 + $heightOrigin / $a;
        $D = $rhoOrigin * (1 + $heightOrigin / ($a * (1 - $e2)));

        $latitude = $latitudeOrigin + ($northing / $D) - $B * ($easting / $C) ** 2;
        $nu = $a / sqrt(1 - $e2 * (sin($latitude) ** 2));
        $longitude = $longitudeOrigin + $easting / ($C * $nu * cos($latitude));

        return GeographicPoint::create(new Radian($latitude), new Radian($longitude), null, $to, $this->epoch);
    }

    /**
     * Equal Earth.
     */
    public function equalEarth(
        Geographic $to,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e = $this->crs->getDatum()->getEllipsoid()->getEccentricity();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();
        $e4 = $e ** 4;
        $e6 = $e ** 6;

        $qP = (1 - $e2) * ((1 / (1 - $e2)) - (1 / (2 * $e) * log((1 - $e) / (1 + $e))));
        $Rq = $a * sqrt($qP / 2);

        $theta = $northing / $Rq;
        do {
            $thetaN = $theta;
            $correctionFactor = ($theta * (1.340264 - 0.081106 * $theta ** 2 + $theta ** 6 * (0.000893 + 0.003796 * $theta ** 2)) - $northing / $Rq) / (1.340264 - 0.243318 * $theta ** 2 + $theta ** 6 * (0.006251 + 0.034164 * $theta ** 2));
            $theta = $theta - $correctionFactor;
        } while (abs($theta - $thetaN) >= self::NEWTON_RAPHSON_CONVERGENCE);

        $beta = asin(2 * sin($theta) / sqrt(3));

        $latitude = $beta + (($e2 / 3 + 31 * $e4 / 180 + 517 * $e6 / 5040) * sin(2 * $beta)) + ((23 * $e4 / 360 + 251 * $e6 / 3780) * sin(4 * $beta)) + ((761 * $e6 / 45360) * sin(6 * $beta));
        $longitude = $longitudeOrigin + sqrt(3) * $easting * (1.340264 - 0.243318 * $theta ** 2 + $theta ** 6 * (0.006251 + 0.034164 * $theta ** 2)) / (2 * $Rq * cos($theta));

        return GeographicPoint::create(new Radian($latitude), new Radian($longitude), null, $to, $this->epoch);
    }

    /**
     * Equidistant Cylindrical
     * See method code 1029 for spherical development. See also Pseudo Plate Carree, method code 9825.
     */
    public function equidistantCylindrical(
        Geographic $to,
        Angle $latitudeOf1stStandardParallel,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
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

        return GeographicPoint::create(new Radian($latitude), new Radian($longitude), null, $to, $this->epoch);
    }

    /**
     * Guam Projection
     * Simplified form of Oblique Azimuthal Equidistant projection method.
     */
    public function guamProjection(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();
        $e4 = $this->crs->getDatum()->getEllipsoid()->getEccentricity() ** 4;
        $e6 = $this->crs->getDatum()->getEllipsoid()->getEccentricity() ** 6;

        $MO = $a * ((1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256) * $latitudeOrigin - (3 * $e2 / 8 + 3 * $e4 / 32 + 45 * $e6 / 1024) * sin(2 * $latitudeOrigin) + (15 * $e4 / 256 + 45 * $e6 / 1024) * sin(4 * $latitudeOrigin) - (35 * $e6 / 3072) * sin(6 * $latitudeOrigin));
        $e1 = (1 - sqrt(1 - $e2)) / (1 + sqrt(1 - $e2));
        $i = (1 - $e2 / 4 - 3 * $e4 / 64 - 5 * $e6 / 256);

        $latitude = $latitudeOrigin;
        do {
            $latitudeN = $latitude;
            $M = $MO + $northing - ($easting ** 2 * tan($latitude) * sqrt(1 - $e2 * sin($latitude) ** 2) / (2 * $a));
            $mu = $M / ($a * $i);
            $latitude = $mu + (3 * $e1 / 2 - 27 * $e1 ** 3 / 32) * sin(2 * $mu) + (21 * $e1 ** 2 / 16 - 55 * $e1 ** 4 / 32) * sin(4 * $mu) + (151 * $e1 ** 3 / 96) * sin(6 * $mu) + (1097 * $e1 ** 4 / 512) * sin(8 * $mu);
        } while (abs($latitude - $latitudeN) >= self::NEWTON_RAPHSON_CONVERGENCE);

        $longitude = $longitudeOrigin + $easting * sqrt(1 - $e2 * sin($latitude) ** 2) / ($a * cos($latitude));

        return GeographicPoint::create(new Radian($latitude), new Radian($longitude), null, $to, $this->epoch);
    }

    /**
     * Krovak.
     */
    public function krovak(
        Geographic $to,
        Angle $latitudeOfProjectionCentre,
        Angle $longitudeOfOrigin,
        Angle $coLatitudeOfConeAxis,
        Angle $latitudeOfPseudoStandardParallel,
        Scale $scaleFactorOnPseudoStandardParallel,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $longitudeOffset = $this->crs->getDatum()->getPrimeMeridian()->getGreenwichLongitude()->asRadians()->getValue() - $to->getDatum()->getPrimeMeridian()->getGreenwichLongitude()->asRadians()->getValue();
        $westing = $this->westing->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $southing = $this->southing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeC = $latitudeOfProjectionCentre->asRadians()->getValue();
        $longitudeO = $longitudeOfOrigin->asRadians()->getValue();
        $alphaC = $coLatitudeOfConeAxis->asRadians()->getValue();
        $latitudeP = $latitudeOfPseudoStandardParallel->asRadians()->getValue();
        $kP = $scaleFactorOnPseudoStandardParallel->asUnity()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e = $this->crs->getDatum()->getEllipsoid()->getEccentricity();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();

        $A = $a * sqrt(1 - $e2) / (1 - $e2 * sin($latitudeC) ** 2);
        $B = sqrt(1 + $e2 * cos($latitudeC) ** 4 / (1 - $e2));
        $upsilonO = self::asin(sin($latitudeC) / $B);
        $tO = tan(M_PI / 4 + $upsilonO / 2) * ((1 + $e * sin($latitudeC)) / (1 - $e * sin($latitudeC))) ** ($e * $B / 2) / (tan(M_PI / 4 + $latitudeC / 2) ** $B);
        $n = sin($latitudeP);
        $rO = $kP * $A / tan($latitudeP);

        $r = sqrt($southing ** 2 + $westing ** 2) ?: 1;
        $theta = atan2($westing, $southing);
        $D = $theta / sin($latitudeP);
        $T = 2 * (atan(($rO / $r) ** (1 / $n) * tan(M_PI / 4 + $latitudeP / 2)) - M_PI / 4);
        $U = self::asin(cos($alphaC) * sin($T) - sin($alphaC) * cos($T) * cos($D));
        $V = self::asin(cos($T) * sin($D) / cos($U));

        $latitude = $U;
        do {
            $latitudeN = $latitude;
            $latitude = 2 * (atan($tO ** (-1 / $B) * tan($U / 2 + M_PI / 4) ** (1 / $B) * ((1 + $e * sin($latitude)) / (1 - $e * sin($latitude))) ** ($e / 2)) - M_PI / 4);
        } while (abs($latitude - $latitudeN) >= self::NEWTON_RAPHSON_CONVERGENCE);

        $longitude = $longitudeO + $longitudeOffset - $V / $B;

        return GeographicPoint::create(new Radian($latitude), new Radian($longitude), null, $to, $this->epoch);
    }

    /**
     * Krovak Modified
     * Incorporates a polynomial transformation which is defined to be exact and for practical purposes is considered
     * to be a map projection.
     */
    public function krovakModified(
        Geographic $to,
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

        $asKrovak = self::create(new Metre(-$Yp), new Metre(-$Xp), new Metre($Yp), new Metre($Xp), $this->crs, $this->epoch);

        return $asKrovak->krovak($to, $latitudeOfProjectionCentre, $longitudeOfOrigin, $coLatitudeOfConeAxis, $latitudeOfPseudoStandardParallel, $scaleFactorOnPseudoStandardParallel, new Metre(0), new Metre(0));
    }

    /**
     * Lambert Azimuthal Equal Area
     * This is the ellipsoidal form of the projection.
     */
    public function lambertAzimuthalEqualArea(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e = $this->crs->getDatum()->getEllipsoid()->getEccentricity();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();
        $e4 = $this->crs->getDatum()->getEllipsoid()->getEccentricity() ** 4;
        $e6 = $this->crs->getDatum()->getEllipsoid()->getEccentricity() ** 6;

        $qO = (1 - $e2) * ((sin($latitudeOrigin) / (1 - $e2 * sin($latitudeOrigin) ** 2)) - ((1 / (2 * $e)) * log((1 - $e * sin($latitudeOrigin)) / (1 + $e * sin($latitudeOrigin)))));
        $qP = (1 - $e2) * ((1 / (1 - $e2)) - ((1 / (2 * $e)) * log((1 - $e) / (1 + $e))));
        $betaO = self::asin($qO / $qP);
        $Rq = $a * sqrt($qP / 2);
        $D = $a * (cos($latitudeOrigin) / sqrt(1 - $e2 * sin($latitudeOrigin) ** 2)) / ($Rq * cos($betaO));
        $rho = sqrt(($easting / $D) ** 2 + ($D * $northing) ** 2) ?: 1;
        $C = 2 * self::asin($rho / (2 * $Rq));
        $beta = self::asin(cos($C) * sin($betaO) + ($D * $northing * sin($C) * cos($betaO)) / $rho);

        $latitude = $beta + (($e2 / 3 + 31 * $e4 / 180 + 517 * $e6 / 5040) * sin(2 * $beta)) + ((23 * $e4 / 360 + 251 * $e6 / 3780) * sin(4 * $beta)) + ((761 * $e6 / 45360) * sin(6 * $beta));
        $longitude = $longitudeOrigin + atan2($easting * sin($C), $D * $rho * cos($betaO) * cos($C) - $D ** 2 * $northing * sin($betaO) * sin($C));

        return GeographicPoint::create(new Radian($latitude), new Radian($longitude), null, $to, $this->epoch);
    }

    /**
     * Lambert Azimuthal Equal Area (Spherical)
     * This is the spherical form of the projection.  See coordinate operation method Lambert Azimuthal Equal Area
     * (code 9820) for ellipsoidal form.  Differences of several tens of metres result from comparison of the two
     * methods.
     */
    public function lambertAzimuthalEqualAreaSpherical(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();

        $rho = sqrt($easting ** 2 + $northing ** 2) ?: 1;
        $c = 2 * self::asin($rho / (2 * $a));

        $latitude = self::asin(cos($c) * sin($latitudeOrigin) + ($northing * sin($c) * cos($latitudeOrigin) / $rho));

        if ($latitudeOrigin === 90) {
            $longitude = $longitudeOrigin + atan($easting / -$northing);
        } elseif ($latitudeOrigin === -90) {
            $longitude = $longitudeOrigin + atan($easting / $northing);
        } else {
            $longitudeDenominator = ($rho * cos($latitudeOrigin) * cos($c) - $northing * sin($latitudeOrigin) * sin($c));
            $longitude = $longitudeOrigin + atan($easting * sin($c) / $longitudeDenominator);
            if ($longitudeDenominator < 0) {
                $longitude += M_PI;
            }
        }

        return GeographicPoint::create(new Radian($latitude), new Radian($longitude), null, $to, $this->epoch);
    }

    /**
     * Lambert Conic Conformal (1SP).
     */
    public function lambertConicConformal1SP(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $scaleFactorOrigin = $scaleFactorAtNaturalOrigin->asUnity()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e = $this->crs->getDatum()->getEllipsoid()->getEccentricity();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();

        $mO = cos($latitudeOrigin) / sqrt(1 - $e2 * sin($latitudeOrigin) ** 2);
        $tO = tan(M_PI / 4 - $latitudeOrigin / 2) / ((1 - $e * sin($latitudeOrigin)) / (1 + $e * sin($latitudeOrigin))) ** ($e / 2);
        $n = sin($latitudeOrigin);
        $F = $mO / ($n * $tO ** $n);
        $rO = $a * $F * $tO ** $n * $scaleFactorOrigin;
        $r = sqrt($easting ** 2 + ($rO - $northing) ** 2);
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
        } while (abs($latitude - $latitudeN) >= self::NEWTON_RAPHSON_CONVERGENCE);

        $longitude = $theta / $n + $longitudeOrigin;

        return GeographicPoint::create(new Radian($latitude), new Radian($longitude), null, $to, $this->epoch);
    }

    /**
     * Lambert Conic Conformal (1SP).
     */
    public function lambertConicConformalWestOrientated(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $westing = $falseEasting->asMetres()->getValue() - $this->westing->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $scaleFactorOrigin = $scaleFactorAtNaturalOrigin->asUnity()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e = $this->crs->getDatum()->getEllipsoid()->getEccentricity();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();

        $mO = cos($latitudeOrigin) / sqrt(1 - $e2 * sin($latitudeOrigin) ** 2);
        $tO = tan(M_PI / 4 - $latitudeOrigin / 2) / ((1 - $e * sin($latitudeOrigin)) / (1 + $e * sin($latitudeOrigin))) ** ($e / 2);
        $n = sin($latitudeOrigin);
        $F = $mO / ($n * $tO ** $n);
        $rO = $a * $F * $tO ** $n ** $scaleFactorOrigin;
        $r = sqrt($westing ** 2 + ($rO - $northing) ** 2);
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
        } while (abs($latitude - $latitudeN) >= self::NEWTON_RAPHSON_CONVERGENCE);

        $longitude = $theta / $n + $longitudeOrigin;

        return GeographicPoint::create(new Radian($latitude), new Radian($longitude), null, $to, $this->epoch);
    }

    /**
     * Lambert Conic Conformal (2SP).
     */
    public function lambertConicConformal2SP(
        Geographic $to,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Angle $latitudeOf1stStandardParallel,
        Angle $latitudeOf2ndStandardParallel,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin
    ): GeographicPoint {
        $easting = $this->easting->asMetres()->getValue() - $eastingAtFalseOrigin->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $northingAtFalseOrigin->asMetres()->getValue();
        $lambdaOrigin = $longitudeOfFalseOrigin->asRadians()->getValue();
        $phiF = $latitudeOfFalseOrigin->asRadians()->getValue();
        $phi1 = $latitudeOf1stStandardParallel->asRadians()->getValue();
        $phi2 = $latitudeOf2ndStandardParallel->asRadians()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e = $this->crs->getDatum()->getEllipsoid()->getEccentricity();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();

        $m1 = cos($phi1) / sqrt(1 - $e2 * sin($phi1) ** 2);
        $m2 = cos($phi2) / sqrt(1 - $e2 * sin($phi2) ** 2);
        $t1 = tan(M_PI / 4 - $phi1 / 2) / ((1 - $e * sin($phi1)) / (1 + $e * sin($phi1))) ** ($e / 2);
        $t2 = tan(M_PI / 4 - $phi2 / 2) / ((1 - $e * sin($phi2)) / (1 + $e * sin($phi2))) ** ($e / 2);
        $tF = tan(M_PI / 4 - $phiF / 2) / ((1 - $e * sin($phiF)) / (1 + $e * sin($phiF))) ** ($e / 2);
        $n = (log($m1) - log($m2)) / (log($t1) - log($t2));
        $F = $m1 / ($n * $t1 ** $n);
        $rF = $a * $F * $tF ** $n;
        $r = sqrt($easting ** 2 + ($rF - $northing) ** 2);
        if ($n < 0) {
            $r = -$r;
        }
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
        } while (abs($latitude - $latitudeN) >= self::NEWTON_RAPHSON_CONVERGENCE);

        $longitude = $theta / $n + $lambdaOrigin;

        return GeographicPoint::create(new Radian($latitude), new Radian($longitude), null, $to, $this->epoch);
    }

    /**
     * Lambert Conic Conformal (2SP Michigan).
     */
    public function lambertConicConformal2SPMichigan(
        Geographic $to,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Angle $latitudeOf1stStandardParallel,
        Angle $latitudeOf2ndStandardParallel,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin,
        Scale $ellipsoidScalingFactor
    ): GeographicPoint {
        $easting = $this->easting->asMetres()->getValue() - $eastingAtFalseOrigin->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $northingAtFalseOrigin->asMetres()->getValue();
        $lambdaOrigin = $longitudeOfFalseOrigin->asRadians()->getValue();
        $phiF = $latitudeOfFalseOrigin->asRadians()->getValue();
        $phi1 = $latitudeOf1stStandardParallel->asRadians()->getValue();
        $phi2 = $latitudeOf2ndStandardParallel->asRadians()->getValue();
        $K = $ellipsoidScalingFactor->asUnity()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e = $this->crs->getDatum()->getEllipsoid()->getEccentricity();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();

        $m1 = cos($phi1) / sqrt(1 - $e2 * sin($phi1) ** 2);
        $m2 = cos($phi2) / sqrt(1 - $e2 * sin($phi2) ** 2);
        $t1 = tan(M_PI / 4 - $phi1 / 2) / ((1 - $e * sin($phi1)) / (1 + $e * sin($phi1))) ** ($e / 2);
        $t2 = tan(M_PI / 4 - $phi2 / 2) / ((1 - $e * sin($phi2)) / (1 + $e * sin($phi2))) ** ($e / 2);
        $tF = tan(M_PI / 4 - $phiF / 2) / ((1 - $e * sin($phiF)) / (1 + $e * sin($phiF))) ** ($e / 2);
        $n = (log($m1) - log($m2)) / (log($t1) - log($t2));
        $F = $m1 / ($n * $t1 ** $n);
        $rF = $a * $K * $F * $tF ** $n;
        $r = sqrt($easting ** 2 + ($rF - $northing) ** 2);
        if ($n < 0) {
            $r = -$r;
        }
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
        } while (abs($latitude - $latitudeN) >= self::NEWTON_RAPHSON_CONVERGENCE);

        $longitude = $theta / $n + $lambdaOrigin;

        return GeographicPoint::create(new Radian($latitude), new Radian($longitude), null, $to, $this->epoch);
    }

    /**
     * Lambert Conic Conformal (2SP Belgium)
     * In 2000 this modification was replaced through use of the regular Lambert Conic Conformal (2SP) method [9802]
     * with appropriately modified parameter values.
     */
    public function lambertConicConformal2SPBelgium(
        Geographic $to,
        Angle $latitudeOfFalseOrigin,
        Angle $longitudeOfFalseOrigin,
        Angle $latitudeOf1stStandardParallel,
        Angle $latitudeOf2ndStandardParallel,
        Length $eastingAtFalseOrigin,
        Length $northingAtFalseOrigin
    ): GeographicPoint {
        $easting = $this->easting->asMetres()->getValue() - $eastingAtFalseOrigin->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $northingAtFalseOrigin->asMetres()->getValue();
        $lambdaOrigin = $longitudeOfFalseOrigin->asRadians()->getValue();
        $phiF = $latitudeOfFalseOrigin->asRadians()->getValue();
        $phi1 = $latitudeOf1stStandardParallel->asRadians()->getValue();
        $phi2 = $latitudeOf2ndStandardParallel->asRadians()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e = $this->crs->getDatum()->getEllipsoid()->getEccentricity();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();

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
        $r = sqrt($easting ** 2 + ($rF - $northing) ** 2);
        if ($n < 0) {
            $r = -$r;
        }
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
        } while (abs($latitude - $latitudeN) >= self::NEWTON_RAPHSON_CONVERGENCE);

        $longitude = ($theta + (new ArcSecond(29.2985))->asRadians()->getValue()) / $n + $lambdaOrigin;

        return GeographicPoint::create(new Radian($latitude), new Radian($longitude), null, $to, $this->epoch);
    }

    /**
     * Lambert Conic Near-Conformal
     * The Lambert Near-Conformal projection is derived from the Lambert Conformal Conic projection by truncating the
     * series expansion of the projection formulae.
     */
    public function lambertConicNearConformal(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Scale $scaleFactorAtNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $scaleFactorOrigin = $scaleFactorAtNaturalOrigin->asUnity()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();
        $f = $this->crs->getDatum()->getEllipsoid()->getInverseFlattening();

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
        $r = sqrt($easting ** 2 + ($rO - $northing) ** 2);
        if ($latitudeOrigin < 0) {
            $r = -$r;
        }
        $M = $rO - $r;

        $m = $M;
        do {
            $mN = $m;
            $m = $m - ($M - $scaleFactorOrigin * $m - $scaleFactorOrigin * $A * $m ** 3) / (-$scaleFactorOrigin - 3 * $scaleFactorOrigin * $A * $m ** 2);
        } while (abs($m - $mN) >= self::NEWTON_RAPHSON_CONVERGENCE);

        $latitude = $latitudeOrigin + $m / $A;
        do {
            $latitudeN = $latitude;
            $latitude = $latitude + ($m + $sO - ($APrime * $latitude - $BPrime * sin(2 * $latitude) + $CPrime * sin(4 * $latitude) - $DPrime * sin(6 * $latitude) + $EPrime * sin(8 * $latitude))) / $APrime;
        } while (abs($latitude - $latitudeN) >= self::NEWTON_RAPHSON_CONVERGENCE);

        $longitude = $longitudeOrigin + $theta / sin($latitudeOrigin);

        return GeographicPoint::create(new Radian($latitude), new Radian($longitude), null, $to, $this->epoch);
    }

    /**
     * Lambert Cylindrical Equal Area
     * This is the ellipsoidal form of the projection.
     */
    public function lambertCylindricalEqualArea(
        Geographic $to,
        Angle $latitudeOf1stStandardParallel,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeFirstParallel = $latitudeOf1stStandardParallel->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e = $this->crs->getDatum()->getEllipsoid()->getEccentricity();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();
        $e4 = $this->crs->getDatum()->getEllipsoid()->getEccentricity() ** 4;
        $e6 = $this->crs->getDatum()->getEllipsoid()->getEccentricity() ** 6;

        $k = cos($latitudeFirstParallel) / sqrt(1 - $e2 * sin($latitudeFirstParallel) ** 2);
        $qP = (1 - $e2) * ((sin(M_PI_2) / (1 - $e2 * sin(M_PI_2) ** 2)) - (1 / (2 * $e)) * log((1 - $e * sin(M_PI_2)) / (1 + $e * sin(M_PI_2))));
        $beta = asin(2 * $northing * $k / ($a * $qP));

        $latitude = $beta + (($e2 / 3 + 31 * $e4 / 180 + 517 * $e6 / 5040) * sin(2 * $beta)) + ((23 * $e4 / 360 + 251 * $e6 / 3780) * sin(4 * $beta)) + ((761 * $e6 / 45360) * sin(6 * $beta));
        $longitude = $longitudeOrigin + $easting / ($a * $k);

        return GeographicPoint::create(new Radian($latitude), new Radian($longitude), null, $to, $this->epoch);
    }

    /**
     * Modified Azimuthal Equidistant
     * Modified form of Oblique Azimuthal Equidistant projection method developed for Polynesian islands. For the
     * distances over which these projections are used (under 800km) this modification introduces no significant error.
     */
    public function modifiedAzimuthalEquidistant(
        Geographic $to,
        Angle $latitudeOfNaturalOrigin,
        Angle $longitudeOfNaturalOrigin,
        Length $falseEasting,
        Length $falseNorthing
    ): GeographicPoint {
        $easting = $this->easting->asMetres()->getValue() - $falseEasting->asMetres()->getValue();
        $northing = $this->northing->asMetres()->getValue() - $falseNorthing->asMetres()->getValue();
        $latitudeOrigin = $latitudeOfNaturalOrigin->asRadians()->getValue();
        $longitudeOrigin = $longitudeOfNaturalOrigin->asRadians()->getValue();
        $a = $this->crs->getDatum()->getEllipsoid()->getSemiMajorAxis()->asMetres()->getValue();
        $e2 = $this->crs->getDatum()->getEllipsoid()->getEccentricitySquared();

        $nuO = $a / sqrt(1 - $e2 * sin($latitudeOrigin) ** 2);
        $c = sqrt($easting ** 2 + $northing ** 2);
        $alpha = atan2($easting, $northing);
        $A = -$e2 * cos($latitudeOrigin) ** 2 * cos($alpha) ** 2 / (1 - $e2);
        $B = 3 * $e2 * (1 - $A) * sin($latitudeOrigin) * cos($latitudeOrigin) * cos($alpha) / (1 - $e2);
        $D = $c / $nuO;
        $J = $D - ($A * (1 + $A) * $D ** 3 / 6) - ($B * (1 + 3 * $A) * $D ** 4 / 24);
        $K = 1 - ($A * $J ** 2 / 2) - ($B * $J ** 3 / 6);
        $psi = asin(sin($latitudeOrigin) * cos($J) + cos($latitudeOrigin) * sin($J) * cos($alpha));

        $latitude = atan((1 - $e2 * $K * sin($latitudeOrigin) / sin($psi)) * tan($psi) / (1 - $e2));
        $longitude = $longitudeOrigin + asin(sin($alpha) * sin($J) / cos($psi));

        return GeographicPoint::create(new Radian($latitude), new Radian($longitude), null, $to, $this->epoch);
    }
}
