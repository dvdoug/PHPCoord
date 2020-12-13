<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Angle;

use PHPCoord\UnitOfMeasure\UnitOfMeasure;

abstract class Angle implements UnitOfMeasure
{
    abstract public function asRadians(): Radian;

    public function add(self $unit): self
    {
        $resultAsRadians = new Radian($this->asRadians()->getValue() + $unit->asRadians()->getValue());
        $conversionRatio = (new static(1))->asRadians()->getValue();

        return new static($resultAsRadians->getValue() / $conversionRatio);
    }

    public function subtract(self $unit): self
    {
        $resultAsRadians = new Radian($this->asRadians()->getValue() - $unit->asRadians()->getValue());
        $conversionRatio = (new static(1))->asRadians()->getValue();

        return new static($resultAsRadians->getValue() / $conversionRatio);
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
