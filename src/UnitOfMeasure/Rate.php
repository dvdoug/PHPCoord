<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure;

use PHPCoord\Exception\InvalidRateException;
use PHPCoord\UnitOfMeasure\Time\Time;

class Rate implements UnitOfMeasure
{
    /** @var UnitOfMeasure */
    private $change;

    /** @var Time */
    private $time;

    public function __construct(UnitOfMeasure $change, Time $time)
    {
        if ($change instanceof Time) {
            throw new InvalidRateException('A rate is a change per unit of time, the change cannot be time');
        }

        $this->change = $change;
        $this->time = $time;
    }

    public function getChange(): UnitOfMeasure
    {
        return $this->change;
    }

    public function getTime(): Time
    {
        return $this->time;
    }

    public function getValue(): float
    {
        return $this->change->getValue();
    }

    public function getFormattedValue(): string
    {
        return $this->change->getValue() . ' per ' . $this->change->getUnitName() . ' per ' . $this->time->getUnitName();
    }

    public function getUnitName(): string
    {
        return $this->change->getUnitName() . ' per ' . $this->time->getUnitName();
    }
}
