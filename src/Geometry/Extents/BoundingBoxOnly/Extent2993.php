<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 60°S to 64°S, 48°W to 36°W (SP23-24).
 * @internal
 */
class Extent2993
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-36, -60], [-48, -60], [-48, -64], [-36, -64], [-36, -60],
                ],
            ],
        ];
    }
}
