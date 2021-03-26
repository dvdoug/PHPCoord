<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Europe - 42°E to 48°E and ED50 by country.
 * @internal
 */
class Extent1641
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [44.820545196533, 41.594718933106], [42, 41.594718933106], [42, 36.971237182618], [44.820545196533, 36.971237182618], [44.820545196533, 41.594718933106],
                ],
            ],
        ];
    }
}
