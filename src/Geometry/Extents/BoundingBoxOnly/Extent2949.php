<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - CONUS 89°W-107°W - onshore.
 * @internal
 */
class Extent2949
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-89, 49.376657485962], [-107, 49.376657485962], [-107, 25.839859008738], [-89, 25.839859008738], [-89, 49.376657485962],
                ],
            ],
        ];
    }
}
