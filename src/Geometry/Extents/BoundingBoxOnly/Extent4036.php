<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 84°30'N to 79°30'N, 95°W to 55°W.
 * @internal
 */
class Extent4036
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-55, 84.500001907349], [-95, 84.500001907349], [-95, 79.500001907349], [-55, 79.500001907349], [-55, 84.500001907349],
                ],
            ],
        ];
    }
}
