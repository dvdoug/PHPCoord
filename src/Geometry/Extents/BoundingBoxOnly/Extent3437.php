<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 66°W to 60°W, N hemisphere and SIRGAS 2000 by country.
 * @internal
 */
class Extent3437
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-60, 4.8845005035401], [-60.152229309082, 4.8845005035401], [-60.152229309082, 4.4940280914307], [-60, 4.4940280914307], [-60, 4.8845005035401],
                ],
            ],
            [
                [
                    [-60, 16.745054244995], [-66, 16.745054244995], [-66, 0.64916801452642], [-60, 0.64916801452642], [-60, 16.745054244995],
                ],
            ],
        ];
    }
}
