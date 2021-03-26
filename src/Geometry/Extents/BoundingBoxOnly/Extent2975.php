<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - CONUS south of 41°N, 95°W to 78°W - onshore.
 * @internal
 */
class Extent2975
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-78, 41], [-95, 41], [-95, 24.410230723243], [-78, 24.410230723243], [-78, 41],
                ],
            ],
        ];
    }
}
