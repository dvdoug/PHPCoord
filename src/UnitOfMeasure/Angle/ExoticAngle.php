<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Angle;

class ExoticAngle extends Angle
{
    private float $angle;

    private string $name;

    private float $factorB;

    private float $factorC;

    public function __construct(
        float $angle,
        string $name,
        float $factorB,
        float $factorC
    ) {
        $this->angle = $angle;
        $this->name = $name;
        $this->factorB = $factorB;
        $this->factorC = $factorC;
    }

    public function asRadians(): Radian
    {
        return new Radian($this->angle * $this->factorB / $this->factorC);
    }

    public function getValue(): float
    {
        return $this->angle;
    }

    public function getFormattedValue(): string
    {
        return $this->angle . ' ' . $this->name;
    }

    public function getUnitName(): string
    {
        return $this->name;
    }

    public function __toString(): string
    {
        return (string) $this->getValue();
    }
}
