<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 87°50'N to 82°50'N, 120°E to 180°E.
 * @internal
 */
class Extent4051
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [179.99999, 87.833333969116], [120.00000190735, 87.833333969116], [120.00000190735, 82.833333969116], [179.99999, 82.833333969116], [179.99999, 87.833333969116],
                ],
            ],
        ];
    }
}
