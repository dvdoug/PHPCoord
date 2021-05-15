<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 71°N to 59°N, 156°W to 66°W.
 * @internal
 */
class Extent4040
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-66, 71], [-156, 71], [-156, 59], [-66, 59], [-66, 71],
                ],
            ],
        ];
    }
}
