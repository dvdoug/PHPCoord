<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Time;

class Year implements Time
{
    private const SECONDS_IN_YEAR = 31556925.445;

    private float $time;

    public function __construct(float $time)
    {
        $this->time = $time;
    }

    public function asSeconds(): Second
    {
        return new Second($this->time * self::SECONDS_IN_YEAR);
    }

    public function getValue(): float
    {
        return $this->time;
    }

    public function getFormattedValue(): string
    {
        return $this->time . ' years';
    }

    public function getUnitName(): string
    {
        return 'year';
    }

    public function __toString(): string
    {
        return (string) $this->getValue();
    }
}
