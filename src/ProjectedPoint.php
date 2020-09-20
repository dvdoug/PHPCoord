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
use PHPCoord\CoordinateReferenceSystem\Projected;
use PHPCoord\CoordinateSystem\Axis;
use PHPCoord\Exception\InvalidAxesException;
use PHPCoord\Exception\InvalidCoordinateReferenceSystemException;
use PHPCoord\Exception\UnknownAxisException;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
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
}
