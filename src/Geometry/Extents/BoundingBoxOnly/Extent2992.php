<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 60°S to 64°S, 60°W to 48°W (SP21-22).
 * @internal
 */
class Extent2992
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-48, -60], [-60, -60], [-60, -64], [-48, -64], [-48, -60],
                ],
            ],
        ];
    }
}
