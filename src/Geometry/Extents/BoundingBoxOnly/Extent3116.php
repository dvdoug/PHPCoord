<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/North America - 84°W to 78°W and NAD83 by country.
 * @internal
 */
class Extent3116
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-78, 84], [-84, 84], [-84, 23.81750013802], [-78, 23.81750013802], [-78, 84],
                ],
            ],
        ];
    }
}
