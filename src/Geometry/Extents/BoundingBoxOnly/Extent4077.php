<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 77°50'N to 72°50'N, 141°W to 116°W.
 * @internal
 */
class Extent4077
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-116, 77.833333969116], [-141, 77.833333969116], [-141, 72.833333969116], [-116, 72.833333969116], [-116, 77.833333969116],
                ],
            ],
        ];
    }
}
