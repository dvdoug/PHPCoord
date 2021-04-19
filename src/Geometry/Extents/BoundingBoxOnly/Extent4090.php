<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 77°50'N to 72°50'N,  166°E to 169°W.
 * @internal
 */
class Extent4090
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [191, 77.833333969116], [166.00000190735, 77.833333969116], [166.00000190735, 72.833333969116], [191, 72.833333969116], [191, 77.833333969116],
                ],
            ],
        ];
    }
}
