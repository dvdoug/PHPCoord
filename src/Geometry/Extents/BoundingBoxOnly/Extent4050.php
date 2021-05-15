<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 87°50'N to 82°50'N, 60°E to 120°E.
 * @internal
 */
class Extent4050
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [120.00000190735, 87.833333969116], [60.000001907349, 87.833333969116], [60.000001907349, 82.833333969116], [120.00000190735, 82.833333969116], [120.00000190735, 87.833333969116],
                ],
            ],
        ];
    }
}
