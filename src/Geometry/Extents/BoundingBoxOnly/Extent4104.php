<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 74°30'N to 69°30'N, 101°W to 81°W.
 * @internal
 */
class Extent4104
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-81, 74.500001907349], [-101, 74.500001907349], [-101, 69.500001907349], [-81, 69.500001907349], [-81, 74.500001907349],
                ],
            ],
        ];
    }
}
