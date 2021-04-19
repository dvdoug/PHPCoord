<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 77°50'N to 72°50'N,  26°W to 2°W.
 * @internal
 */
class Extent4082
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-2, 77.833333969116], [-26, 77.833333969116], [-26, 72.833333969116], [-2, 72.833333969116], [-2, 77.833333969116],
                ],
            ],
        ];
    }
}
