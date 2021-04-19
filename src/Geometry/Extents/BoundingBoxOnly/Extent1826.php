<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 78°W to 72°W, S hemisphere and SIRGAS 1995 by country.
 * @internal
 */
class Extent1826
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-76.133626937866, -23.474910736084], [-78, -23.474910736084], [-78, -29.24831199646], [-76.133626937866, -29.24831199646], [-76.133626937866, -23.474910736084],
                ],
            ],
            [
                [
                    [-72, 0], [-78, 0], [-78, -59.354999542236], [-72, -59.354999542236], [-72, 0],
                ],
            ],
        ];
    }
}
