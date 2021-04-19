<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 80°S to 84°S, 90°W to 60°W (SU16-20).
 * @internal
 */
class Extent3065
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-60, -80], [-90, -80], [-90, -84], [-60, -84], [-60, -80],
                ],
            ],
        ];
    }
}
