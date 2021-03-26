<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 80°S to 84°S, 150°W to 120°W (SU06-10).
 * @internal
 */
class Extent3063
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-120, -80], [-150, -80], [-150, -84], [-120, -84], [-120, -80],
                ],
            ],
        ];
    }
}
