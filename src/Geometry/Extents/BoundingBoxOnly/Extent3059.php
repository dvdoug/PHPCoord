<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 76°S to 80°S, 108°E to 132°E (ST49-52).
 * @internal
 */
class Extent3059
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [132, -76], [108, -76], [108, -80], [132, -80], [132, -76],
                ],
            ],
        ];
    }
}
