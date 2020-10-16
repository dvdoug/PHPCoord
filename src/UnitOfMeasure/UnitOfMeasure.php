<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure;

interface UnitOfMeasure extends UnitOfMeasureIds, \Stringable
{
    public function getValue(): float;

    public function getFormattedValue(): string;

    public function getUnitName(): string;
}
