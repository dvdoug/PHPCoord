<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Scale;

class ExoticScale implements Scale
{
    private float $scale;

    private string $name;

    private float $factorB;

    private float $factorC;

    public function __construct(
        float $scale,
        string $name,
        float $factorB,
        float $factorC
    ) {
        $this->scale = $scale;
        $this->name = $name;
        $this->factorB = $factorB;
        $this->factorC = $factorC;
    }

    public function asUnity(): Unity
    {
        return new Unity($this->scale * $this->factorB / $this->factorC);
    }

    public function getValue(): float
    {
        return $this->scale;
    }

    public function getFormattedValue(): string
    {
        return $this->scale . ' ' . $this->name;
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
