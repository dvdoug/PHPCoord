<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 72°S to 76°S, 18°W to 0°W (SS28-30).
 * @internal
 */
class Extent3036
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [0, -72], [-18, -72], [-18, -76], [0, -76], [0, -72],
                ],
            ],
        ];
    }
}
