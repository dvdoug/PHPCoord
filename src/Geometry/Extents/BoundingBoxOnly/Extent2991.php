<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 60°S to 64°S, 72°W to 60°W (SP19-20).
 * @internal
 */
class Extent2991
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-60, -60], [-72, -60], [-72, -64], [-60, -64], [-60, -60],
                ],
            ],
        ];
    }
}
