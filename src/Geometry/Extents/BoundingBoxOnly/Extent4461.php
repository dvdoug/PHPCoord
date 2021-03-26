<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Greenland - 59°N to 84°N.
 * @internal
 */
class Extent4461
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-10, 84], [-74.998683569945, 84], [-74.998683569945, 59], [-10, 59], [-10, 84],
                ],
            ],
        ];
    }
}
