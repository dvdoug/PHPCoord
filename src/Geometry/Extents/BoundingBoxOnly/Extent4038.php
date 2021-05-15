<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 79°N to 67°N, 132°E to 138°W.
 * @internal
 */
class Extent4038
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [222, 79.000001907349], [132, 79.000001907349], [132, 67], [222, 67], [222, 79.000001907349],
                ],
            ],
        ];
    }
}
