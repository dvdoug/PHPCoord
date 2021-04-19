<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 74°30'N to 69°30'N,  141°W to 121°W.
 * @internal
 */
class Extent4102
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-121, 74.500001907349], [-141, 74.500001907349], [-141, 69.500001907349], [-121, 69.500001907349], [-121, 74.500001907349],
                ],
            ],
        ];
    }
}
