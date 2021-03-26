<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 67°50'N to 62°50'N,  42°W to 25°W.
 * @internal
 */
class Extent4120
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-25, 67.833333969116], [-42, 67.833333969116], [-42, 62.833333969116], [-25, 62.833333969116], [-25, 67.833333969116],
                ],
            ],
        ];
    }
}
