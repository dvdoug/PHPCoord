<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 74°30'N to 69°30'N, 64°E to 85°E.
 * @internal
 */
class Extent4094
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [85, 74.500001907349], [64.000001907349, 74.500001907349], [64.000001907349, 69.5], [85, 69.5], [85, 74.500001907349],
                ],
            ],
        ];
    }
}
