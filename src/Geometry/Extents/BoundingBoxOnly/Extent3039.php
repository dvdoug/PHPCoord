<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 72°S to 76°S, 36°E to 54°E (SS37-39).
 * @internal
 */
class Extent3039
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [54, -72], [36, -72], [36, -76], [54, -76], [54, -72],
                ],
            ],
        ];
    }
}
