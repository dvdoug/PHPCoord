<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 78°W to 72°W onshore.
 * @internal
 */
class Extent3868
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-72, 45.020830154419], [-78, 45.020830154419], [-78, 33.844402842023], [-72, 33.844402842023], [-72, 45.020830154419],
                ],
            ],
        ];
    }
}
