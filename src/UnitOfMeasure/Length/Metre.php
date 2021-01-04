<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

class Metre extends Length
{
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

    public function getUnitName(): string
    {
        return 'metre';
    }
}
