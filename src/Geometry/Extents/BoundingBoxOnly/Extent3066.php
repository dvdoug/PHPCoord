<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 80°S to 84°S, 60°W to 30°W (SU21-25).
 * @internal
 */
class Extent3066
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-30, -80], [-60, -80], [-60, -84], [-30, -84], [-30, -80],
                ],
            ],
        ];
    }
}
