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
use function min;

trait BilinearInterpolation
{
    protected float $startX;
    protected float $endX;
    protected float $startY;
    protected float $endY;
    protected int $numberOfColumns;
    protected int $numberOfRows;
    protected float $columnGridInterval;
    protected float $rowGridInterval;

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
            $y0 = $this->interpolateLinear($dx, $corners['lowerLeft']->getValues()[$i], $corners['lowerRight']->getValues()[$i]);
            // Interpolate value at upper row
            $y1 = $this->interpolateLinear($dx, $corners['upperLeft']->getValues()[$i], $corners['upperRight']->getValues()[$i]);
            // Interpolate between rows
            $xy = $this->interpolateLinear($dy, $y0, $y1);
            $interpolations[] = $xy;
        }

        return $interpolations;
    }

    /**
     * Linear interpolation at point p, where p is between 0 and 1.
     */
    private function interpolateLinear(float $p, float $valueAt0, float $valueAt1): float
    {
        assert($p >= 0 && $p <= 1);

        return $valueAt0 * (1 - $p) + $valueAt1 * $p;
    }

    /**
     * @return GridValues[]
     */
    private function getCorners(float $x, float $y): array
    {
        $xIndex = (int) (($x - $this->startX) / $this->columnGridInterval);
        $yIndex = (int) (($y - $this->startY) / $this->rowGridInterval);
        $xIndexPlus1 = min($xIndex + 1, $this->numberOfColumns - 1);
        $yIndexPlus1 = min($yIndex + 1, $this->numberOfRows - 1);

        return [
            'lowerLeft' => $this->getRecord($xIndex, $yIndex),
            'lowerRight' => $this->getRecord($xIndexPlus1, $yIndex),
            'upperLeft' => $this->getRecord($xIndex, $yIndexPlus1),
            'upperRight' => $this->getRecord($xIndexPlus1, $yIndexPlus1),
        ];
    }
}
