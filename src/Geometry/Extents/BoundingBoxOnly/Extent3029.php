<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 72°S to 76°S, 162°W to 144°W (SS04-06).
 * @internal
 */
class Extent3029
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-144, -72], [-162, -72], [-162, -76], [-144, -76], [-144, -72],
                ],
            ],
        ];
    }
}
