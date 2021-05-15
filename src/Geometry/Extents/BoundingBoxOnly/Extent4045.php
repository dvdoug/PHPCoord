<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 71°N to 59°N, 132°E to 138°W.
 * @internal
 */
class Extent4045
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [222, 71], [132, 71], [132, 59], [222, 59], [222, 71],
                ],
            ],
        ];
    }
}
