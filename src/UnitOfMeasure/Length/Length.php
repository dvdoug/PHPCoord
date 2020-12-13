<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPCoord\UnitOfMeasure\UnitOfMeasure;

abstract class Length implements UnitOfMeasure
{
    abstract public function asMetres(): Metre;

    public function add(self $unit): self
    {
        $resultAsMetres = new Metre($this->asMetres()->getValue() + $unit->asMetres()->getValue());
        $conversionRatio = (new static(1))->asMetres()->getValue();

        return new static($resultAsMetres->getValue() / $conversionRatio);
    }

    public function subtract(self $unit): self
    {
        $resultAsMetres = new Metre($this->asMetres()->getValue() - $unit->asMetres()->getValue());
        $conversionRatio = (new static(1))->asMetres()->getValue();

        return new static($resultAsMetres->getValue() / $conversionRatio);
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
