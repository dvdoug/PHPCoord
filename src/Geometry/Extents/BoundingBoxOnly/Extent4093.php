<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 74°30'N to 69°30'N, 44°E to 64°E.
 * @internal
 */
class Extent4093
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [64.000001907349, 74.500001907349], [44.000001907349, 74.500001907349], [44.000001907349, 69.500001907349], [64.000001907349, 69.500001907349], [64.000001907349, 74.500001907349],
                ],
            ],
        ];
    }
}
