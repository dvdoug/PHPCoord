<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/North America - 108°W to 102°W and NAD83 by country.
 * @internal
 */
class Extent3406
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-102, 84], [-108, 84], [-108, 28.984025955367], [-102, 28.984025955367], [-102, 84],
                ],
            ],
        ];
    }
}
