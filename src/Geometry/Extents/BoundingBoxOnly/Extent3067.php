<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 80°S to 84°S, 30°W to 0°W (SU26-30).
 * @internal
 */
class Extent3067
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [0, -80], [-30, -80], [-30, -84], [0, -84], [0, -80],
                ],
            ],
        ];
    }
}
