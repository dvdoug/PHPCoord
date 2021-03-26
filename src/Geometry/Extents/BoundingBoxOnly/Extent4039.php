<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 84°30'N to 79°30'N,  72°W to 32°W.
 * @internal
 */
class Extent4039
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-32, 84.500001907349], [-72, 84.500001907349], [-72, 79.500001907349], [-32, 79.500001907349], [-32, 84.500001907349],
                ],
            ],
        ];
    }
}
