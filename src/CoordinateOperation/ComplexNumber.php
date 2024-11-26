<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

/**
 * Complex number.
 * @internal
 */
class ComplexNumber
{
    private float $real;

    private float $imaginary;

    public function __construct(float $real, float $imaginary)
    {
        $this->real = $real;
        $this->imaginary = $imaginary;
    }

    public function getReal(): float
    {
        return $this->real;
    }

    public function getImaginary(): float
    {
        return $this->imaginary;
    }

    public function add(self $number): self
    {
        return new self($this->real + $number->real, $this->imaginary + $number->imaginary);
    }

    public function subtract(self $number): self
    {
        return new self($this->real - $number->real, $this->imaginary - $number->imaginary);
    }

    public function multiply(self $multiplicand): self
    {
        return new self($this->real * $multiplicand->real - $this->imaginary * $multiplicand->imaginary, $this->real * $multiplicand->imaginary + $this->imaginary * $multiplicand->real);
    }

    public function divide(self $divisor): self
    {
        return new self(($this->real * $divisor->real + $this->imaginary * $divisor->imaginary) / ($divisor->real ** 2 + $divisor->imaginary ** 2), ($this->imaginary * $divisor->real - $this->real * $divisor->imaginary) / ($divisor->real ** 2 + $divisor->imaginary ** 2));
    }

    public function pow(int $power): self
    {
        $result = $this;
        for ($i = 2; $i <= $power; ++$i) {
            $result = $result->multiply($this);
        }

        return $result;
    }
}
