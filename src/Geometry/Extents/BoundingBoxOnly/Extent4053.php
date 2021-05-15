<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 84°30'N to 79°30'N, 4°W to 36°E.
 * @internal
 */
class Extent4053
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [36.000001907349, 84.500001907349], [-4, 84.500001907349], [-4, 79.500001907349], [36.000001907349, 79.500001907349], [36.000001907349, 84.500001907349],
                ],
            ],
        ];
    }
}
