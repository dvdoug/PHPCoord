<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Greenland - 66°W to 60°W.
 * @internal
 */
class Extent3451
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-60, 82.216688822614], [-66, 82.216688822614], [-66, 68.923374085935], [-60, 68.923374085935], [-60, 82.216688822614],
                ],
            ],
        ];
    }
}
