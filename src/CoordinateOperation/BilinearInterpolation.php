<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use function count;

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

    public function interpolateBilinear(
        float $x,
        float $y
    ): array {
        $corners = $this->getCornersForBilinear($x, $y);

        $dx = ($x - $corners['lowerLeft']->getX()) / ($corners['lowerRight']->getX() - $corners['lowerLeft']->getX());
        $dy = ($y - $corners['lowerLeft']->getY()) / ($corners['upperLeft']->getY() - $corners['lowerLeft']->getY());

        $interpolations = [];
        for ($i = 0, $count = count($corners['lowerLeft']->getValues()); $i < $count; ++$i) {
            $interpolations[] = $corners['lowerLeft']->getValues()[$i] * (1 - $dx) * (1 - $dy) + $corners['lowerRight']->getValues()[$i] * $dx * (1 - $dy) + $corners['upperLeft']->getValues()[$i] * (1 - $dx) * $dy + $corners['upperRight']->getValues()[$i] * $dx * $dy;
        }

        return $interpolations;
    }

    /**
     * @return GridValues[]
     */
    private function getCornersForBilinear(float $x, float $y): array
    {
        $xIndex = (int) (string) (($x - $this->startX) / $this->columnGridInterval);
        $yIndex = (int) (string) (($y - $this->startY) / $this->rowGridInterval);
        $xIndexPlus1 = min($xIndex + 1, $this->numberOfColumns);
        $yIndexPlus1 = min($yIndex + 1, $this->numberOfRows);

        return [
            'lowerLeft' => $this->getRecord($xIndex, $yIndex),
            'lowerRight' => $this->getRecord($xIndexPlus1, $yIndex),
            'upperLeft' => $this->getRecord($xIndex, $yIndexPlus1),
            'upperRight' => $this->getRecord($xIndexPlus1, $yIndexPlus1),
        ];
    }
}
