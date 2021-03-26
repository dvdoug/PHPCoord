<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - GoM OCS - 96°W to 90°W.
 * @internal
 */
class Extent2172
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-89.866596151353, 29.728060086845], [-96, 29.728060086845], [-96, 25.616981926865], [-89.866596151353, 25.616981926865], [-89.866596151353, 29.728060086845],
                ],
            ],
        ];
    }
}
