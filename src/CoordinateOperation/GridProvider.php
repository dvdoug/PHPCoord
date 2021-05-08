<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use SplFileObject;

interface GridProvider
{
    public function provideGrid(): SplFileObject;
}
