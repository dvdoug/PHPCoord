<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Greenland - west coast - 66°N to 69°N.
 * @internal
 */
class Extent3364
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-49.404917072412, 69], [-54.087060552685, 69], [-54.087060552685, 66], [-49.404917072412, 66], [-49.404917072412, 69],
                ],
            ],
        ];
    }
}
