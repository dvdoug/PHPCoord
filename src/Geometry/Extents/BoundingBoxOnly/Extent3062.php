<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 80°S to 84°S, 180°W to 150°W (SU01-05).
 * @internal
 */
class Extent3062
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-150, -80], [-180, -80], [-180, -84], [-150, -84], [-150, -80],
                ],
            ],
        ];
    }
}
