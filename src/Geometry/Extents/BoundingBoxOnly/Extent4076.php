<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 77°50'N to 72°50'N, 169°W to 141°W.
 * @internal
 */
class Extent4076
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-141, 77.833333969116], [-169, 77.833333969116], [-169, 72.833333969116], [-141, 72.833333969116], [-141, 77.833333969116],
                ],
            ],
        ];
    }
}
