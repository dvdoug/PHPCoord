<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Scale;

class Unity extends Scale
{
    private $scale;

    public function __construct(float $scale)
    {
        $this->scale = $scale;
    }

    public function asUnity(): self
    {
        return $this;
    }

    public function getValue(): float
    {
        return $this->scale;
    }

    public function getUnitName(): string
    {
        return '';
    }
}
