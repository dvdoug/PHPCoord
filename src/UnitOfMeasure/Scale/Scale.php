<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Scale;

use PHPCoord\UnitOfMeasure\UnitOfMeasure;

abstract class Scale implements UnitOfMeasure
{
    abstract public function asUnity(): Unity;

    public function add(self $unit): self
    {
        $resultAsUnity = new Unity($this->asUnity()->getValue() + $unit->asUnity()->getValue());
        $conversionRatio = (new static(1))->asUnity()->getValue();

        return new static($resultAsUnity->getValue() / $conversionRatio);
    }

    public function subtract(self $unit): self
    {
        $resultAsUnity = new Unity($this->asUnity()->getValue() - $unit->asUnity()->getValue());
        $conversionRatio = (new static(1))->asUnity()->getValue();

        return new static($resultAsUnity->getValue() / $conversionRatio);
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
