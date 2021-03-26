<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 79°N to 67°N,  12°W to 78°E.
 * @internal
 */
class Extent4034
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [78, 79.000001907349], [-12, 79.000001907349], [-12, 67], [78, 67], [78, 79.000001907349],
                ],
            ],
        ];
    }
}
