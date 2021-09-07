<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use function assert;

trait BiquadraticInterpolation
{
    protected float $startX;
    protected float $endX;
    protected float $startY;
    protected float $endY;
    protected int $numberOfColumns;
    protected int $numberOfRows;
    protected float $columnGridInterval;
    protected float $rowGridInterval;

    /**
     * Quadratic interpolation at point p, where p is between 0 and 2.
     * Converted from NOAA FORTRAN implementation, this function apparently uses Newton-Gregory forward polynomial.
     */
    private function interpolateQuadratic(float $p, float $valueAt0, float $valueAt1, float $valueAt2): float
    {
        assert($p >= 0 && $p <= 2);

        $difference1 = $valueAt1 - $valueAt0;
        $difference2 = $valueAt2 - $valueAt1;
        $differenceDifferences = $difference2 - $difference1;

        return $valueAt0 + $p * $difference1 + $p / 2 * ($p - 1) * $differenceDifferences;
    }
}
