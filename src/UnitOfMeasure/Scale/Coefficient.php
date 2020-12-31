<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Scale;

class Coefficient implements Scale
{
    /**
     * @var float
     */
    private $scale;

    public function __construct(float $scale)
    {
        $this->scale = $scale;
    }

    public function asUnity(): Unity
    {
        return new Unity($this->scale);
    }

    public function getValue(): float
    {
        return $this->scale;
    }

    public function getFormattedValue(): string
    {
        return (string) $this->scale;
    }

    public function getUnitName(): string
    {
        return '';
    }

    public function __toString(): string
    {
        return (string) $this->getValue();
    }
}
