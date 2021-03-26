<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 77°50'N to 72°50'N,  51°W to 26°W.
 * @internal
 */
class Extent4081
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-26, 77.833333969116], [-51, 77.833333969116], [-51, 72.833333969116], [-26, 72.833333969116], [-26, 77.833333969116],
                ],
            ],
        ];
    }
}
