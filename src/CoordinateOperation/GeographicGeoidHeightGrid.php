<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\Point\GeographicPoint;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;

abstract class GeographicGeoidHeightGrid extends Grid
{
    /**
     * @return Metre[]
     */
    abstract public function getValues(float $x, float $y): array;

    public function getHeightAdjustment(GeographicPoint $location): Length
    {
        return $this->getValues($location->getLongitude()->asDegrees()->getValue(), $location->getLatitude()->asDegrees()->getValue())[0];
    }
}
