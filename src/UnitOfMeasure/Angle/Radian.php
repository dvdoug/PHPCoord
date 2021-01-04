<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Angle;

class Radian extends Angle
{
    private $angle;

    public function __construct(float $angle)
    {
        $this->angle = $angle;
    }

    public function asRadians(): self
    {
        return $this;
    }

    public function getValue(): float
    {
        return $this->angle;
    }

    public function getUnitName(): string
    {
        return 'radian';
    }
}
