<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

/**
 * International foot. This is the *current* definition of the foot, *not* the deprecated by NIST, but still widely used
 * US Survey foot, or any of the older British/commonwealth definitions. Please check carefully which units your
 * measurements are in before using.
 */
class Foot extends Length
{
    private float $length;

    public function __construct(float $length)
    {
        $this->length = $length;
    }

    public function asMetres(): Metre
    {
        return new Metre($this->length * 0.3048);
    }

    public function getValue(): float
    {
        return $this->length;
    }

    public function getUnitName(): string
    {
        return 'foot';
    }
}
