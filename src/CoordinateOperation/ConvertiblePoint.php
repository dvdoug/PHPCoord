<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\CoordinateReferenceSystem\CoordinateReferenceSystem;
use PHPCoord\Point;

interface ConvertiblePoint
{
    public function convert(CoordinateReferenceSystem $to, bool $ignoreBoundaryRestrictions = false): Point;
}
