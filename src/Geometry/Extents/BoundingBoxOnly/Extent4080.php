<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 77°50'N to 72°50'N, 76°W to 51°W.
 * @internal
 */
class Extent4080
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-51, 77.833333969116], [-76, 77.833333969116], [-76, 72.833333969116], [-51, 72.833333969116], [-51, 77.833333969116],
                ],
            ],
        ];
    }
}
