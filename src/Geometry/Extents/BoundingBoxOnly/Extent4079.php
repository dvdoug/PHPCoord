<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 77°50'N to 72°50'N, 91°W to 67°W.
 * @internal
 */
class Extent4079
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-67, 77.833333969116], [-91, 77.833333969116], [-91, 72.833333969116], [-67, 72.833333969116], [-67, 77.833333969116],
                ],
            ],
        ];
    }
}
