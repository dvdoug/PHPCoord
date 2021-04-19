<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/North America - 114°W to 108°W and NAD83 by country.
 * @internal
 */
class Extent3405
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-108, 84], [-114, 84], [-114, 31.332603454538], [-108, 31.332603454538], [-108, 84],
                ],
            ],
        ];
    }
}
