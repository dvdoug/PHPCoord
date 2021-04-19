<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 76°S to 80°S, 132°E to 156°E (ST53-56).
 * @internal
 */
class Extent3060
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [156, -76], [132, -76], [132, -80], [156, -80], [156, -76],
                ],
            ],
        ];
    }
}
