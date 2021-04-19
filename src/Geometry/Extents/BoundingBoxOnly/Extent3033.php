<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 72°S to 76°S, 90°W to 72°W (SS16-18).
 * @internal
 */
class Extent3033
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-72, -72], [-90, -72], [-90, -76], [-72, -76], [-72, -72],
                ],
            ],
        ];
    }
}
