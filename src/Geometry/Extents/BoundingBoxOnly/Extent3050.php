<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 76°S to 80°S, 108°W to 84°W (ST13-16).
 * @internal
 */
class Extent3050
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-84, -76], [-108, -76], [-108, -80], [-84, -80], [-84, -76],
                ],
            ],
        ];
    }
}
