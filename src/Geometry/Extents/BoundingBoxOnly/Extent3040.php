<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 72°S to 76°S, 54°E to 72°E (SS40-42).
 * @internal
 */
class Extent3040
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [72, -72], [54, -72], [54, -76], [72, -76], [72, -72],
                ],
            ],
        ];
    }
}
