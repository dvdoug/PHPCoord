<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 72°S to 76°S, 108°W to 90°W (SS13-15).
 * @internal
 */
class Extent3032
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-90, -72], [-108, -72], [-108, -76], [-90, -76], [-90, -72],
                ],
            ],
        ];
    }
}
