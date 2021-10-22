<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

/**
 * @internal
 */
interface GridProvider
{
    public function provideGrid(): Grid;
}
