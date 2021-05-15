<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 87°50'N to 82°50'N, 60°W to 0°E.
 * @internal
 */
class Extent4048
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [0, 87.833333969116], [-60, 87.833333969116], [-60, 82.833333969116], [0, 82.833333969116], [0, 87.833333969116],
                ],
            ],
        ];
    }
}
