<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

use function version_compare;

use const PHP_VERSION;

if (version_compare(PHP_VERSION, '8.2.0', '>=')) {
    class Projected extends Projected82
    {
    }
} else {
    class Projected extends Projected81
    {
    }
}
