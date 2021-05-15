<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 87°N to 75°N, 156°W to 66°W.
 * @internal
 */
class Extent4019
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-66, 87], [-156, 87], [-156, 75.000001907349], [-66, 75.000001907349], [-66, 87],
                ],
            ],
        ];
    }
}
