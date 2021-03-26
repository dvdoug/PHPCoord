<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Chile - onshore 39°S to 43°30'S.
 * @internal
 */
class Extent2403
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-71.387786865234, -38.999996185303], [-74.473331451416, -38.999996185303], [-74.473331451416, -43.5], [-71.387786865234, -43.5], [-71.387786865234, -38.999996185303],
                ],
            ],
        ];
    }
}
