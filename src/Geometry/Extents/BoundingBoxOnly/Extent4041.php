<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 71°N to 59°N,  84°W to 6°E.
 * @internal
 */
class Extent4041
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [6, 71], [-84, 71], [-84, 59], [6, 59], [6, 71],
                ],
            ],
        ];
    }
}
