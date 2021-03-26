<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 77°50'N to 72°50'N,  22°E to 46°E.
 * @internal
 */
class Extent4084
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [46.000001907349, 77.833333969116], [22.000001907349, 77.833333969116], [22.000001907349, 72.833333969116], [46.000001907349, 72.833333969116], [46.000001907349, 77.833333969116],
                ],
            ],
        ];
    }
}
