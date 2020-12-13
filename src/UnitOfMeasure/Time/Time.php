<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Time;

use PHPCoord\UnitOfMeasure\UnitOfMeasure;

abstract class Time implements UnitOfMeasure
{
    public const SECONDS_IN_YEAR = 31556925.445;

    abstract public function asSeconds(): Second;

    abstract public function asYears(): Year;

    public function add(self $unit): self
    {
        $resultAsSeconds = new Second($this->asSeconds()->getValue() + $unit->asSeconds()->getValue());
        $conversionRatio = (new static(1))->asSeconds()->getValue();

        return new static($resultAsSeconds->getValue() / $conversionRatio);
    }

    public function subtract(self $unit): self
    {
        $resultAsSeconds = new Second($this->asSeconds()->getValue() - $unit->asSeconds()->getValue());
        $conversionRatio = (new static(1))->asSeconds()->getValue();

        return new static($resultAsSeconds->getValue() / $conversionRatio);
    }

    public function multiply(float $multiplicand): self
    {
        return new static($this->getValue() * $multiplicand);
    }

    public function divide(float $divisor): self
    {
        return new static($this->getValue() / $divisor);
    }
}
