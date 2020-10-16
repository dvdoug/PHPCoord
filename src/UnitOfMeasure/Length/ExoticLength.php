<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

class ExoticLength implements Length
{
    /** @var float */
    private $length;

    /** @var string */
    private $name;

    /** @var float */
    private $factorB;

    /** @var float */
    private $factorC;

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
