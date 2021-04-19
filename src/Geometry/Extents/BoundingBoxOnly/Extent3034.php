<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 72°S to 76°S, 72°W to 54°W (SS19-21).
 * @internal
 */
class Extent3034
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-54, -72], [-72, -72], [-72, -76], [-54, -76], [-54, -72],
                ],
            ],
        ];
    }
}
