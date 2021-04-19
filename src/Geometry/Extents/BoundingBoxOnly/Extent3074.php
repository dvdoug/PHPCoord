<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 84°S to 88°S, 180°W to 120°W (SV01-10).
 * @internal
 */
class Extent3074
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-120, -84], [-180, -84], [-180, -88], [-120, -88], [-120, -84],
                ],
            ],
        ];
    }
}
