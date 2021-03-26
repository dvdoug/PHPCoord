<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 72°S to 76°S, 36°W to 18°W (SS25-27).
 * @internal
 */
class Extent3035
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-18, -72], [-36, -72], [-36, -76], [-18, -76], [-18, -72],
                ],
            ],
        ];
    }
}
