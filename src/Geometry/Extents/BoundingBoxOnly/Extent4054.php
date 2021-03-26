<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 84°30'N to 79°30'N,  33°E to 73°E.
 * @internal
 */
class Extent4054
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [73.000001907349, 84.500001907349], [33.000001907349, 84.500001907349], [33.000001907349, 79.500001907349], [73.000001907349, 79.500001907349], [73.000001907349, 84.500001907349],
                ],
            ],
        ];
    }
}
