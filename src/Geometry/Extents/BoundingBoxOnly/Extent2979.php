<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - CONUS north of 41°N, 95°W to 78°W.
 * @internal
 */
class Extent2979
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-78, 49.360971450806], [-95, 49.360971450806], [-95, 41], [-78, 41], [-78, 49.360971450806],
                ],
            ],
        ];
    }
}
