<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/North America - 72°W to 66°W and NAD83 by country.
 * @internal
 */
class Extent3419
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
                    [-66, 84], [-72, 84], [-72, 79.033087866236], [-66, 79.033087866236], [-66, 84],
                ],
            ],
            [
                [
                    [-66, 21.854251136094], [-68.481888563935, 21.854251136094], [-68.481888563935, 14.928194130078], [-66, 14.928194130078], [-66, 21.854251136094],
                ],
            ],
        ];
    }
}
