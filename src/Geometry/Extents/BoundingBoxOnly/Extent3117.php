<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/North America - 78°W to 72°W and NAD83 by country.
 * @internal
 */
class Extent3117
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-72, 84], [-78, 84], [-78, 28.286112142027], [-72, 28.286112142027], [-72, 84],
                ],
            ],
        ];
    }
}
