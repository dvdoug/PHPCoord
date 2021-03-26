<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 96°W to 90°W and GoM OCS.
 * @internal
 */
class Extent3640
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-89.866788972655, 49.376655578613], [-96.000005583137, 49.376655578613], [-96.000005583137, 25.616981926865], [-89.866788972655, 25.616981926865], [-89.866788972655, 49.376655578613],
                ],
            ],
        ];
    }
}
