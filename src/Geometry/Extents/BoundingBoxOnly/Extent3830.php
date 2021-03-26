<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 84°W to 78°W, N hemisphere and SAD69 by country.
 * @internal
 */
class Extent3830
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-78, 2.697473526001], [-80.178207397461, 2.697473526001], [-80.178207397461, 0], [-78, 0], [-78, 2.697473526001],
                ],
            ],
        ];
    }
}
