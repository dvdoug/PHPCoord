<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 72°S to 76°S, 108°E to 126°E (SS49-51).
 * @internal
 */
class Extent3043
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [126, -72], [108, -72], [108, -76], [126, -76], [126, -72],
                ],
            ],
        ];
    }
}
