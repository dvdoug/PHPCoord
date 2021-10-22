<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\UnitOfMeasure\Angle\ArcSecond;
use PHPCoord\UnitOfMeasure\Length\Metre;

class NADCON5Grids extends GeographicGrid
{
    private NADCON5Grid $longitudeGrid;
    private NADCON5Grid $latitudeGrid;
    private ?NADCON5Grid $ellipsoidHeightGrid;

    public function __construct(NADCON5Grid $longitudeGrid, NADCON5Grid $latitudeGrid, ?NADCON5Grid $ellipsoidHeightGrid)
    {
        $this->longitudeGrid = $longitudeGrid;
        $this->latitudeGrid = $latitudeGrid;
        $this->ellipsoidHeightGrid = $ellipsoidHeightGrid;
    }

    public function getValues(float $x, float $y): array
    {
        $latitudeShift = new ArcSecond($this->latitudeGrid->getValues($x, $y)[0]);
        $longitudeShift = new ArcSecond($this->longitudeGrid->getValues($x, $y)[0]);
        $heightShift = $this->ellipsoidHeightGrid ? new Metre($this->ellipsoidHeightGrid->getValues($x, $y)[0]) : null;

        return [$latitudeShift, $longitudeShift, $heightShift];
    }
}
