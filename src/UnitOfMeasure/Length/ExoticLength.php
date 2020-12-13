<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

class ExoticLength extends Length
{
    private float $length;

    private string $name;

    private float $factorB;

    private float $factorC;

    public function __construct(
        float $length,
        string $name,
        float $factorB,
        float $factorC
    ) {
        $this->length = $length;
        $this->name = $name;
        $this->factorB = $factorB;
        $this->factorC = $factorC;
    }

    public function asMetres(): Metre
    {
        return new Metre($this->length * $this->factorB / $this->factorC);
    }

    public function getValue(): float
    {
        return $this->length;
    }

    public function getFormattedValue(): string
    {
        return $this->length . ' ' . $this->name;
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
