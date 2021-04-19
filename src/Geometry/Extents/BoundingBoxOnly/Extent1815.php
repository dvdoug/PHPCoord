<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 54°W to 48°W, N hemisphere and SAD69 by country.
 * @internal
 */
class Extent1815
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-46.658317565918, 4.9620227813722], [-49.648059844971, 4.9620227813722], [-49.648059844971, 1.6857166290284], [-46.658317565918, 1.6857166290284], [-46.658317565918, 4.9620227813722],
                ],
            ],
            [
                [
                    [-51.616199493408, 5.8056468963623], [-54, 5.8056468963623], [-54, 2.1756954193115], [-51.616199493408, 2.1756954193115], [-51.616199493408, 5.8056468963623],
                ],
            ],
        ];
    }
}
