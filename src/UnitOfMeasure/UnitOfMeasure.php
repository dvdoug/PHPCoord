<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure;

use Stringable;

interface UnitOfMeasure extends Stringable
{
    public function getValue(): float;

    public function getUnitName(): string;
}
