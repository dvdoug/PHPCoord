<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 72°S to 76°S, 162°E to 180°E (SS58-60).
 * @internal
 */
class Extent3046
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [180, -72], [162, -72], [162, -76], [180, -76], [180, -72],
                ],
            ],
        ];
    }
}
