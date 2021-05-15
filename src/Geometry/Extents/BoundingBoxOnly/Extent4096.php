<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 74°30'N to 69°30'N, 106°E to 127°E.
 * @internal
 */
class Extent4096
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [127, 74.500001907349], [106, 74.500001907349], [106, 69.5], [127, 69.5], [127, 74.500001907349],
                ],
            ],
        ];
    }
}
