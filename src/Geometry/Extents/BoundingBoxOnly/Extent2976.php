<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - CONUS south of 41°N, east of 78°W - onshore.
 * @internal
 */
class Extent2976
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-71.908535347415, 41], [-78, 41], [-78, 33.844402842023], [-71.908535347415, 33.844402842023], [-71.908535347415, 41],
                ],
            ],
        ];
    }
}
