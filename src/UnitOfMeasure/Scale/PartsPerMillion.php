<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Scale;

class PartsPerMillion extends Scale
{
    private $scale;

    public function __construct(float $scale)
    {
        $this->scale = $scale;
    }

    public function asUnity(): Unity
    {
        return new Unity($this->scale / 1000000);
    }

    public function getValue(): float
    {
        return $this->scale;
    }

    public function getUnitName(): string
    {
        return 'parts per million';
    }
}
