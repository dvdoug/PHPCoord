<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 74°30'N to 69°30'N,  173°W to 153°W.
 * @internal
 */
class Extent4100
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-153, 74.500001907349], [-173, 74.500001907349], [-173, 69.500001907349], [-153, 69.500001907349], [-153, 74.500001907349],
                ],
            ],
        ];
    }
}
