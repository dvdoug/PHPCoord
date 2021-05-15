<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 74°30'N to 69°30'N, 127°E to 148°E.
 * @internal
 */
class Extent4097
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [148, 74.500001907349], [127, 74.500001907349], [127, 69.5], [148, 69.5], [148, 74.500001907349],
                ],
            ],
        ];
    }
}
