<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

class Metre implements Length
{
    /**
     * @var float
     */
    private $length;

    public function __construct(float $length)
    {
        $this->length = $length;
    }

    public function asMetres(): self
    {
        return $this;
    }

    public function getValue(): float
    {
        return $this->length;
    }

    public function getFormattedValue(): string
    {
        return $this->length . 'm';
    }

    public function getUnitName(): string
    {
        return 'metre';
    }

    public function __toString(): string
    {
        return (string) $this->getValue();
    }
}
