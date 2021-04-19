<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 72°S to 76°S, 144°W to 126°W (SS07-09).
 * @internal
 */
class Extent3030
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-126, -72], [-144, -72], [-144, -76], [-126, -76], [-126, -72],
                ],
            ],
        ];
    }
}
