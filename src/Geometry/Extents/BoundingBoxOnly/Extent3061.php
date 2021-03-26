<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 76°S to 80°S, 156°E to 180°E (ST57-60).
 * @internal
 */
class Extent3061
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [180, -76], [156, -76], [156, -80], [180, -80], [180, -76],
                ],
            ],
        ];
    }
}
