<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 74°30'N to 69°30'N,  121°W to 101°W.
 * @internal
 */
class Extent4103
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-101, 74.500001907349], [-121, 74.500001907349], [-121, 69.500001907349], [-101, 69.500001907349], [-101, 74.500001907349],
                ],
            ],
        ];
    }
}
