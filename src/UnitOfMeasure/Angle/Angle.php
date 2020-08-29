<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Angle;

use PHPCoord\UnitOfMeasure\UnitOfMeasure;

interface Angle extends UnitOfMeasure
{
    public function asRadians(): Radian;
}
