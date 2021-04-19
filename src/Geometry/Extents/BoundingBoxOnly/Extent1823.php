<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 84°W to 78°W, N hemisphere and SIRGAS95 by country.
 * @internal
 */
class Extent1823
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-78, 7.0820140838623], [-84, 7.0820140838623], [-84, 0.90055656433111], [-78, 0.90055656433111], [-78, 7.0820140838623],
                ],
            ],
            [
                [
                    [-78, 15.502779006958], [-82.233331680298, 15.502779006958], [-82.233331680298, 10.816667556763], [-78, 10.816667556763], [-78, 15.502779006958],
                ],
            ],
        ];
    }
}
