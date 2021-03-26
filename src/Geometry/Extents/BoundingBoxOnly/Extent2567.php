<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Greenland - west - 66°N to 69°N.
 * @internal
 */
class Extent2567
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-42, 69], [-54.087060552685, 69], [-54.087060552685, 66], [-42, 66], [-42, 69],
                ],
            ],
        ];
    }
}
