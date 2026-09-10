<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\UnitOfMeasure\Length\Metre;

/**
 * IGN text grid of geocentric velocities in metres per year.
 */
class IGNFXyzVelocityGrid extends Grid
{
    use IGNFGrid;

    /**
     * @return Metre[]
     */
    public function getValues(float $x, float $y): array
    {
        $velocities = $this->interpolate($x, $y);

        return [new Metre($velocities[0]), new Metre($velocities[1]), new Metre($velocities[2])];
    }
}
