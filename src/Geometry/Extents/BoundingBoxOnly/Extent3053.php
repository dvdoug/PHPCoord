<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 76°S to 80°S, 36°W to 12°W (ST25-28).
 * @internal
 */
class Extent3053
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-12, -76], [-36, -76], [-36, -80], [-12, -80], [-12, -76],
                ],
            ],
        ];
    }
}
