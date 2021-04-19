<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 76°S to 80°S, 84°W to 60°W (ST17-20).
 * @internal
 */
class Extent3051
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-60, -76], [-84, -76], [-84, -80], [-60, -80], [-60, -76],
                ],
            ],
        ];
    }
}
