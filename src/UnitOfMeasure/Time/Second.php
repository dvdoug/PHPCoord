<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Time;

class Second extends Time
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

    public function asYears(): Year
    {
        return new Year($this->time / self::SECONDS_IN_YEAR);
    }

    public function getValue(): float
    {
        return $this->time;
    }

    public function getUnitName(): string
    {
        return 'second';
    }
}
