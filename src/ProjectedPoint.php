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
use PHPCoord\CoordinateReferenceSystem\Geographic;
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateSystem\Axis;
use PHPCoord\Exception\InvalidAxesException;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\Exception\UnknownAxisException;
use PHPCoord\UnitOfMeasure\Angle\Angle;
use PHPCoord\UnitOfMeasure\Angle\Radian;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\Scale\Coefficient;
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/**
 * Coordinate representing a point on a map projection.
 */
class ProjectedPoint extends Point
{
    /**
     * Easting.
     * @var Length
     */
    protected $easting;

    /**
     * Northing.
     * @var Length
     */
    protected $northing;

    /**
     * Westing.
     * @var Length
     */
    protected $westing;

    /**
     * Southing.
     * @var Length
     */
    protected $southing;

    /**
     * Coordinate reference system.
     * @var Projected
     */
    protected $crs;

    /**
     * Coordinate epoch (date for which the specified coordinates represented this point).
     * @var DateTimeImmutable
     */
    protected $epoch;

    protected function __construct(?Length $easting, ?Length $northing, ?Length $westing, ?Length $southing, Projected $crs, ?DateTimeInterface $epoch)
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
        if ($epoch) {
            $this->epoch = $epoch;
        }
    }

    public static function create(?Length $easting, ?Length $northing, ?Length $westing, ?Length $southing, Projected $crs, ?DateTimeInterface $epoch = null): self
    {
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
        if ($to->getCRS()->getEpsgCode() !== $this->crs->getEpsgCode()) {
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
}
