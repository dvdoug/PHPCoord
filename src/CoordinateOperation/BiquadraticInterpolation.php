<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use function assert;
use function count;
use function max;
use function min;

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
     * @return float[]
     */
    public function interpolate(
        float $x,
        float $y
    ): array {
        $corners = $this->getCorners($x, $y);

        $dx = $corners['lowerRight']->getX() === $corners['lowerLeft']->getX() ? 0 : (($x - $corners['lowerLeft']->getX()) / $this->columnGridInterval);
        $dy = $corners['upperLeft']->getY() === $corners['lowerLeft']->getY() ? 0 : (($y - $corners['lowerLeft']->getY()) / $this->rowGridInterval);

        $interpolations = [];
        for ($i = 0, $count = count($corners['lowerLeft']->getValues()); $i < $count; ++$i) {
            // Interpolate value at lower row
            $y0 = $this->interpolateQuadratic($dx, $corners['lowerLeft']->getValues()[$i], $corners['lowerCentre']->getValues()[$i], $corners['lowerRight']->getValues()[$i]);
            // Interpolate value at middle row
            $y1 = $this->interpolateQuadratic($dx, $corners['middleLeft']->getValues()[$i], $corners['middleCentre']->getValues()[$i], $corners['middleRight']->getValues()[$i]);
            // Interpolate value at upper row
            $y2 = $this->interpolateQuadratic($dx, $corners['upperLeft']->getValues()[$i], $corners['upperCentre']->getValues()[$i], $corners['upperRight']->getValues()[$i]);

            // Interpolate between rows
            $xy = $this->interpolateQuadratic($dy, $y0, $y1, $y2);
            $interpolations[] = $xy;
        }

        return $interpolations;
    }

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

    /**
     * @return GridValues[]
     */
    private function getCorners(float $x, float $y): array
    {
        // Method:
        // Fit a 3x3 window over the random point. The closest
        // 2x2 points will surround the point. But based on which
        // quadrant of that 2x2 cell in which the point falls, the
        // 3x3 window could extend NW, NE, SW or SE from the 2x2 cell.

        // Find which column should be LEAST when fitting
        // a 3x3 window around $longitude.
        $xIndex = (int) (($x - $this->startX) / $this->columnGridInterval - 0.5);

        // Find which row should be LEAST when fitting
        // a 3x3 window around $latitude.
        $yIndex = (int) (($y - $this->startY) / $this->rowGridInterval - 0.5);

        $xIndex = min(max($xIndex, 0), $this->numberOfColumns - 3);
        $yIndex = min(max($yIndex, 0), $this->numberOfRows - 3);

        return [
            'lowerLeft' => $this->getRecord($xIndex, $yIndex),
            'lowerCentre' => $this->getRecord($xIndex + 1, $yIndex),
            'lowerRight' => $this->getRecord($xIndex + 2, $yIndex),
            'middleLeft' => $this->getRecord($xIndex, $yIndex + 1),
            'middleCentre' => $this->getRecord($xIndex + 1, $yIndex + 1),
            'middleRight' => $this->getRecord($xIndex + 2, $yIndex + 1),
            'upperLeft' => $this->getRecord($xIndex, $yIndex + 2),
            'upperCentre' => $this->getRecord($xIndex + 1, $yIndex + 2),
            'upperRight' => $this->getRecord($xIndex + 2, $yIndex + 2),
        ];
    }
}
