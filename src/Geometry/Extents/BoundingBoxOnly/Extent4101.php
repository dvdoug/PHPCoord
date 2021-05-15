<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 74°30'N to 69°30'N, 157°W to 137°W.
 * @internal
 */
class Extent4101
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-137, 74.500001907349], [-157, 74.500001907349], [-157, 69.500001907349], [-137, 69.500001907349], [-137, 74.500001907349],
                ],
            ],
        ];
    }
}
