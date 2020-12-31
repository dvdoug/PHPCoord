<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Time;

class Second implements Time
{
    private float $time;

    public function __construct(float $time)
    {
        $this->time = $time;
    }

    public function asSeconds(): self
    {
        return $this;
    }

    public function getValue(): float
    {
        return $this->time;
    }

    public function getFormattedValue(): string
    {
        return $this->time . 's';
    }

    public function getUnitName(): string
    {
        return 'second';
    }

    public function __toString(): string
    {
        return (string) $this->getValue();
    }
}
