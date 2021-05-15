<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 87°N to 75°N, 132°E to 138°W.
 * @internal
 */
class Extent4031
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [222, 87], [132, 87], [132, 75.000001907349], [222, 75.000001907349], [222, 87],
                ],
            ],
        ];
    }
}
