<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 87°50'N to 82°50'N, 120°W to 60°W.
 * @internal
 */
class Extent4047
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-60, 87.833333969116], [-120, 87.833333969116], [-120, 82.833333969116], [-60, 82.833333969116], [-60, 87.833333969116],
                ],
            ],
        ];
    }
}
