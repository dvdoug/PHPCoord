<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Time;

use PHPCoord\UnitOfMeasure\UnitOfMeasure;

interface Time extends UnitOfMeasure
{
    public function asSeconds(): Second;
}
