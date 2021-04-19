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
                    [-54, 68.923374085935], [-60, 68.923374085935], [-60, 40.575112154403], [-54, 40.575112154403], [-54, 68.923374085935],
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
