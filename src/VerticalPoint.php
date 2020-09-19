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
use PHPCoord\CoordinateReferenceSystem\Vertical;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/**
 * Coordinate representing a vertical dimension.
 */
class VerticalPoint extends Point
{
    /**
     * Height.
     * @var Length
     */
    protected $height;

    /**
     * Coordinate reference system.
     * @var Vertical
     */
    protected $crs;

    /**
     * Coordinate epoch (date for which the specified coordinates represented this point).
     * @var DateTimeImmutable
     */
    protected $epoch;

    /**
     * Constructor.
     * @param Length $height refer to CRS for preferred unit of measure, but any length unit accepted
     */
    protected function __construct(Length $height, Vertical $crs, ?DateTimeInterface $epoch)
    {
        $this->height = UnitOfMeasureFactory::convertLength($height, $crs->getCoordinateSystem()->getAxes()[1]->getUnitOfMeasureId());
        $this->crs = $crs;

        if ($epoch instanceof DateTime) {
            $epoch = DateTimeImmutable::createFromMutable($epoch);
        }
        if ($epoch) {
            $this->epoch = $epoch;
        }
    }

    /**
     * Constructor.
     * @param Length $height refer to CRS for preferred unit of measure, but any length unit accepted
     */
    public static function create(Length $height, Vertical $crs, ?DateTimeInterface $epoch = null): self
    {
        return new static($height, $crs, $epoch);
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
        /* @var self $to */
        return new Metre(abs($this->height->asMetres()->getValue() - $to->height->asMetres()->getValue()));
    }

    public function __toString(): string
    {
        return "({$this->height})";
    }
}
