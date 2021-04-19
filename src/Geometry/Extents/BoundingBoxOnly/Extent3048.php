<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 76°S to 80°S, 156°W to 132°W (ST05-08).
 * @internal
 */
class Extent3048
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-132, -76], [-156, -76], [-156, -80], [-132, -80], [-132, -76],
                ],
            ],
        ];
    }
}
