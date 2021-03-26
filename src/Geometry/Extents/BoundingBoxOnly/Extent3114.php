<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/North America - 96°W to 90°W and NAD83 by country.
 * @internal
 */
class Extent3114
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-90, 84], [-96, 84], [-96, 25.616981926865], [-90, 25.616981926865], [-90, 84],
                ],
            ],
        ];
    }
}
