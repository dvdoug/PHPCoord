<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 87°N to 75°N, 84°W to 6°E.
 * @internal
 */
class Extent4027
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [6.0000019073486, 87], [-84, 87], [-84, 75.000001907349], [6.0000019073486, 75.000001907349], [6.0000019073486, 87],
                ],
            ],
        ];
    }
}
