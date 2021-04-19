<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 84°30'N to 79°30'N,  135°W to 95°W.
 * @internal
 */
class Extent4030
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-95, 84.500001907349], [-135, 84.500001907349], [-135, 79.500001907349], [-95, 79.500001907349], [-95, 84.500001907349],
                ],
            ],
        ];
    }
}
