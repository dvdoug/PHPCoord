<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 74°30'N to 69°30'N, 148°E to 169°E.
 * @internal
 */
class Extent4098
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [169, 74.500001907349], [148, 74.500001907349], [148, 69.5], [169, 69.5], [169, 74.500001907349],
                ],
            ],
        ];
    }
}
