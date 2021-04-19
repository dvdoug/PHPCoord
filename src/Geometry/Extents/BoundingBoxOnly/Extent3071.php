<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 80°S to 84°S, 90°E to 120°E (SU46-50).
 * @internal
 */
class Extent3071
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [120, -80], [90, -80], [90, -84], [120, -84], [120, -80],
                ],
            ],
        ];
    }
}
