<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 67°50'N to 62°50'N,  59°W to 42°W.
 * @internal
 */
class Extent4119
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-42, 67.833333969116], [-59, 67.833333969116], [-59, 62.833333969116], [-42, 62.833333969116], [-42, 67.833333969116],
                ],
            ],
        ];
    }
}
