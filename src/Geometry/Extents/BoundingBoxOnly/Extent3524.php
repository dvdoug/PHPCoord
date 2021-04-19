<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - 72°W to 66°W.
 * @internal
 */
class Extent3524
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-66, 84], [-72, 84], [-72, 79.033087866236], [-66, 79.033087866236], [-66, 84],
                ],
            ],
            [
                [
                    [-66, 74.527340258124], [-72, 74.527340258124], [-72, 40.802467669022], [-66, 40.802467669022], [-66, 74.527340258124],
                ],
            ],
        ];
    }
}
