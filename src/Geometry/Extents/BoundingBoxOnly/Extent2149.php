<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/North America - 72°W to 66°W and NAD27 by country.
 * @internal
 */
class Extent2149
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-66, 74.527340258124], [-72, 74.527340258124], [-72, 33.614374187759], [-66, 33.614374187759], [-66, 74.527340258124],
                ],
            ],
            [
                [
                    [-66, 83.162672322689], [-72, 83.162672322689], [-72, 79.630286603516], [-66, 79.630286603516], [-66, 83.162672322689],
                ],
            ],
        ];
    }
}
