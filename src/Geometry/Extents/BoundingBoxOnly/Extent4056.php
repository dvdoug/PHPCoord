<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 84°30'N to 79°30'N, 113°E to 153°E.
 * @internal
 */
class Extent4056
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [153.00000190735, 84.500001907349], [113.00000190735, 84.500001907349], [113.00000190735, 79.500001907349], [153.00000190735, 79.500001907349], [153.00000190735, 84.500001907349],
                ],
            ],
        ];
    }
}
