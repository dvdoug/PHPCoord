<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 84°30'N to 79°30'N,  73°E to 113°E.
 * @internal
 */
class Extent4055
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [113.00000190735, 84.500001907349], [73.000001907349, 84.500001907349], [73.000001907349, 79.500001907349], [113.00000190735, 79.500001907349], [113.00000190735, 84.500001907349],
                ],
            ],
        ];
    }
}
