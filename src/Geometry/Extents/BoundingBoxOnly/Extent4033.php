<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 79°N to 67°N, 84°W to 6°E.
 * @internal
 */
class Extent4033
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [6.0000019073486, 79.000001907349], [-84, 79.000001907349], [-84, 67.000001907349], [6.0000019073486, 67.000001907349], [6.0000019073486, 79.000001907349],
                ],
            ],
        ];
    }
}
