<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 84°S to 88°S, 60°W to 0°W (SV21-30).
 * @internal
 */
class Extent3076
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [0, -84], [-60, -84], [-60, -88], [0, -88], [0, -84],
                ],
            ],
        ];
    }
}
