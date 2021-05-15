<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 84°30'N to 79°30'N, 32°W to 8°E.
 * @internal
 */
class Extent4046
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [8.0000019073486, 84.500001907349], [-32, 84.500001907349], [-32, 79.500001907349], [8.0000019073486, 79.500001907349], [8.0000019073486, 84.500001907349],
                ],
            ],
        ];
    }
}
