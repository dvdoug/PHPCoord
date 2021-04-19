<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 72°S to 76°S, 126°W to 108°W (SS10-12).
 * @internal
 */
class Extent3031
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-108, -72], [-126, -72], [-126, -76], [-108, -76], [-108, -72],
                ],
            ],
        ];
    }
}
