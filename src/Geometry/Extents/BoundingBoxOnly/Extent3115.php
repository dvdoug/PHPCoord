<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/North America - 90°W to 84°W and NAD83 by country.
 * @internal
 */
class Extent3115
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-84, 84], [-90, 84], [-90, 23.976667295249], [-84, 23.976667295249], [-84, 84],
                ],
            ],
        ];
    }
}
