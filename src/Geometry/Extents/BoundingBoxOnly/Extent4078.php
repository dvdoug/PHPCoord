<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 77°50'N to 72°50'N, 116°W to 91°W.
 * @internal
 */
class Extent4078
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-91, 77.833333969116], [-116, 77.833333969116], [-116, 72.833333969116], [-91, 72.833333969116], [-91, 77.833333969116],
                ],
            ],
        ];
    }
}
