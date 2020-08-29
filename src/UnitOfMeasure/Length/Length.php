<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPCoord\UnitOfMeasure\UnitOfMeasure;

interface Length extends UnitOfMeasure
{
    public function asMetres(): Metre;
}
