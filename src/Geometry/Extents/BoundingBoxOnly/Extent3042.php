<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 72°S to 76°S, 90°E to 108°E (SS46-48).
 * @internal
 */
class Extent3042
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [108, -72], [90, -72], [90, -76], [108, -76], [108, -72],
                ],
            ],
        ];
    }
}
