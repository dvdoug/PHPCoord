<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - CONUS south of 41°N, 112°W to 95°W - onshore.
 * @internal
 */
class Extent2974
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-95, 41], [-112, 41], [-112, 25.839859008738], [-95, 25.839859008738], [-95, 41],
                ],
            ],
        ];
    }
}
