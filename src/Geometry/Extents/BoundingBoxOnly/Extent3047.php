<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 76°S to 80°S, 180°W to 156°W (ST01-04).
 * @internal
 */
class Extent3047
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-156, -76], [-180, -76], [-180, -80], [-156, -80], [-156, -76],
                ],
            ],
        ];
    }
}
