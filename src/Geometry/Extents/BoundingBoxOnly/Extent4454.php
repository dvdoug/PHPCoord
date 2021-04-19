<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Greenland - 58°N to 85°N.
 * @internal
 */
class Extent4454
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-6.9999999999999, 85], [-74.998683569945, 85], [-74.998683569945, 58], [-6.9999999999999, 58], [-6.9999999999999, 85],
                ],
            ],
        ];
    }
}
