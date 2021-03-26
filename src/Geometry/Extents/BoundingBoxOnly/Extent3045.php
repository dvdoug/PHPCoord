<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 72°S to 76°S, 144°E to 162°E (SS55-57).
 * @internal
 */
class Extent3045
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [162, -72], [144, -72], [144, -76], [162, -76], [162, -72],
                ],
            ],
        ];
    }
}
