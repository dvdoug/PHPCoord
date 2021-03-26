<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 87°50'N to 82°50'N,  0°E to 60°E.
 * @internal
 */
class Extent4049
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [60, 87.833333969116], [1.6542323066915E-14, 87.833333969116], [1.6542323066915E-14, 82.833333969116], [60, 82.833333969116], [60, 87.833333969116],
                ],
            ],
        ];
    }
}
