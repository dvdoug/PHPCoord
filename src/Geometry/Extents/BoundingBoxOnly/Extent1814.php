<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 60°W to 54°W, S hemisphere and SAD69 by country.
 * @internal
 */
class Extent1814
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-54, 4.5080547332607], [-60, 4.5080547332607], [-60, -38.908638000488], [-54, -38.908638000488], [-54, 4.5080547332607],
                ],
            ],
        ];
    }
}
