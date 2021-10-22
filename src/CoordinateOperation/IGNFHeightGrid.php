<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\GeographicPoint;
use PHPCoord\UnitOfMeasure\Length\Metre;

class IGNFHeightGrid extends IGNFGrid
{
    private const ITERATION_CONVERGENCE = 0.0001;

    public function getAdjustment(GeographicPoint $point): Metre
    {
        $latitude = $point->getLatitude()->getValue();
        $longitude = $point->getLongitude()->getValue();
        $offset = $this->interpolateBilinear($longitude, $latitude)[0];

        return new Metre($offset);
    }
}
