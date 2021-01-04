<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

class BritishFoot1922Sears extends Length
{
    private $length;

    public function __construct(float $length)
    {
        $this->length = $length;
    }

    public function asMetres(): Metre
    {
        return new Metre($this->length * 12 / 39.370147);
    }

    public function getValue(): float
    {
        return $this->length;
    }

    public function getUnitName(): string
    {
        return 'British(1922 Sears) feet';
    }
}
