<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 76°S to 80°S, 60°W to 36°W (ST21-24).
 * @internal
 */
class Extent3052
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-36, -76], [-60, -76], [-60, -80], [-36, -80], [-36, -76],
                ],
            ],
        ];
    }
}
