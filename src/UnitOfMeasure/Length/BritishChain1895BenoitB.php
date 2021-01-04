<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

class BritishChain1895BenoitB extends Length
{
    private $length;

    public function __construct(float $length)
    {
        $this->length = $length;
    }

    public function asMetres(): Metre
    {
        return new Metre($this->length * 792 / 39.370113);
    }

    public function getValue(): float
    {
        return $this->length;
    }

    public function getUnitName(): string
    {
        return 'British(1895 Benoit B) chain';
    }
}
