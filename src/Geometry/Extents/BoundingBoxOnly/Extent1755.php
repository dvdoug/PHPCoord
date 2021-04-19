<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 84°W to 78°W, S hemisphere and PSAD56 by country.
 * @internal
 */
class Extent1755
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-78, 0], [-81.404005050659, 0], [-81.404005050659, -10.523027420044], [-78, -10.523027420044], [-78, 0],
                ],
            ],
        ];
    }
}
