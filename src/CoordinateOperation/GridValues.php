<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

/**
 * @internal
 */
class GridValues
{
    private float $x;
    private float $y;

    /**
     * @var float[]
     */
    private array $values;

    /**
     * @param array<float> $values
     */
    public function __construct(float $x, float $y, array $values)
    {
        $this->x = $x;
        $this->y = $y;
        $this->values = $values;
    }

    public function getX(): float
    {
        return $this->x;
    }

    public function getY(): float
    {
        return $this->y;
    }

    /**
     * @return float[]
     */
    public function getValues(): array
    {
        return $this->values;
    }
}
