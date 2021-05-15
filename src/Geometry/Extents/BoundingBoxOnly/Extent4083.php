<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 77°50'N to 72°50'N, 2°W to 22°E.
 * @internal
 */
class Extent4083
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [22.000001907349, 77.833333969116], [-2, 77.833333969116], [-2, 72.833333969116], [22.000001907349, 72.833333969116], [22.000001907349, 77.833333969116],
                ],
            ],
        ];
    }
}
