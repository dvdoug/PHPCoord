<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - 90°W to 84°W.
 * @internal
 */
class Extent3415
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-84, 84], [-90, 84], [-90, 46.119971321774], [-84, 46.119971321774], [-84, 84],
                ],
            ],
        ];
    }
}
