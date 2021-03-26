<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 72°S to 76°S, 126°E to 144°E (SS52-54).
 * @internal
 */
class Extent3044
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [144, -72], [126, -72], [126, -76], [144, -76], [144, -72],
                ],
            ],
        ];
    }
}
