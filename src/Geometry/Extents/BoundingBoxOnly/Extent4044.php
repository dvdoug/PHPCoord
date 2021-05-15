<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 87°50'N to 82°50'N, 180°W to 120°W.
 * @internal
 */
class Extent4044
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-120, 87.833333969116], [-180, 87.833333969116], [-180, 82.833333969116], [-120, 82.833333969116], [-120, 87.833333969116],
                ],
            ],
        ];
    }
}
