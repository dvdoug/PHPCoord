<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - 60°W to 54°W.
 * @internal
 */
class Extent2151
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-54, 68.923374085934], [-60, 68.923374085934], [-60, 38.5697932], [-54, 38.5697932], [-54, 68.923374085934],
                ],
            ],
            [
                [
                    [-56.716558553017, 84], [-60, 84], [-60, 82.216688822614], [-56.716558553017, 82.216688822614], [-56.716558553017, 84],
                ],
            ],
        ];
    }
}
