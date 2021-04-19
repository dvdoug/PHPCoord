<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 76°S to 80°S, 132°W to 108°W (ST09-12).
 * @internal
 */
class Extent3049
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-108, -76], [-132, -76], [-132, -80], [-108, -80], [-108, -76],
                ],
            ],
        ];
    }
}
