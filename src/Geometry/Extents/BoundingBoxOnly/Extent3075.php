<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 84°S to 88°S, 120°W to 60°W (SV11-20).
 * @internal
 */
class Extent3075
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-60, -84], [-120, -84], [-120, -88], [-60, -88], [-60, -84],
                ],
            ],
        ];
    }
}
