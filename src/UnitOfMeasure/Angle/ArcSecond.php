<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Angle;

class ArcSecond implements Angle
{
    /** @var float */
    private $angle;

    public function __construct(float $angle)
    {
        $this->angle = $angle;
    }

    public function asRadians(): Radian
    {
        return new Radian($this->angle / 3600 * M_PI / 180);
    }

    public function getValue(): float
    {
        return $this->angle;
    }

    public function getFormattedValue(): string
    {
        return $this->angle . '″';
    }

    public function getUnitName(): string
    {
        return 'arcsecond';
    }

    public function __toString(): string
    {
        return (string) $this->getValue();
    }
}
