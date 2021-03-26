<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 76°S to 80°S, 12°E to 36°E (ST33-36).
 * @internal
 */
class Extent3055
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [36, -76], [12, -76], [12, -80], [36, -80], [36, -76],
                ],
            ],
        ];
    }
}
