<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 72°S to 76°S, 72°E to 90°E (SS43-45).
 * @internal
 */
class Extent3041
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [90, -72], [72, -72], [72, -76], [90, -76], [90, -72],
                ],
            ],
        ];
    }
}
