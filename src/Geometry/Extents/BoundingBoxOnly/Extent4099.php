<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 74°30'N to 69°30'N,  169°E to 169°W.
 * @internal
 */
class Extent4099
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [191, 74.500001907349], [169, 74.500001907349], [169, 69.5], [191, 69.5], [191, 74.500001907349],
                ],
            ],
        ];
    }
}
