<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 74°30'N to 69°30'N, 85°E to 106°E.
 * @internal
 */
class Extent4095
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [106, 74.500001907349], [85, 74.500001907349], [85, 69.5], [106, 69.5], [106, 74.500001907349],
                ],
            ],
        ];
    }
}
