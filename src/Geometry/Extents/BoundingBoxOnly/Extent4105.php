<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 74°30'N to 69°30'N, 81°W to 61°W.
 * @internal
 */
class Extent4105
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-61, 74.500001907349], [-81, 74.500001907349], [-81, 69.500001907349], [-61, 69.500001907349], [-61, 74.500001907349],
                ],
            ],
        ];
    }
}
