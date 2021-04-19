<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 72°S to 76°S, 18°E to 36°E (SS34-36).
 * @internal
 */
class Extent3038
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [36, -72], [18, -72], [18, -76], [36, -76], [36, -72],
                ],
            ],
        ];
    }
}
