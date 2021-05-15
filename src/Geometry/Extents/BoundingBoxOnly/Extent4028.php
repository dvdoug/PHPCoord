<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 87°N to 75°N, 12°W to 78°E.
 * @internal
 */
class Extent4028
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [78.000001907349, 87], [-12, 87], [-12, 75.000001907349], [78.000001907349, 75.000001907349], [78.000001907349, 87],
                ],
            ],
        ];
    }
}
