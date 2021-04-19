<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 80°S to 84°S, 120°W to 90°W (SU11-15).
 * @internal
 */
class Extent3064
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-90, -80], [-120, -80], [-120, -84], [-90, -84], [-90, -80],
                ],
            ],
        ];
    }
}
