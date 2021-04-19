<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/UK - Great Britain mainland onshore.
 * @internal
 */
class Extent2792
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [1.796632, 58.704322], [-7.050604, 58.704322], [-7.050604, 49.939102], [1.796632, 49.939102], [1.796632, 58.704322],
                ],
            ],
            [
                [
                    [-4.625519, 51.219208], [-4.711163, 51.219208], [-4.711163, 51.13907], [-4.625519, 51.13907], [-4.625519, 51.219208],
                ],
            ],
        ];
    }
}
