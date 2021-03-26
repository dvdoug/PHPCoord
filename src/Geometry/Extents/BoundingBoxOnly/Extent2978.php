<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - conus north of 41°N, 112°W to 95°W.
 * @internal
 */
class Extent2978
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-95, 49.376657485962], [-112, 49.376657485962], [-112, 41], [-95, 41], [-95, 49.376657485962],
                ],
            ],
        ];
    }
}
