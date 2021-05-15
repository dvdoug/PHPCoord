<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 79°N to 67°N, 156°W to 66°W.
 * @internal
 */
class Extent4032
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-66, 79.000001907349], [-156, 79.000001907349], [-156, 67], [-66, 67], [-66, 79.000001907349],
                ],
            ],
        ];
    }
}
