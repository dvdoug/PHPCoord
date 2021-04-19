<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 84°S to 88°S, 120°E to 180°E (SV51-60).
 * @internal
 */
class Extent3079
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [180, -84], [120, -84], [120, -88], [180, -88], [180, -84],
                ],
            ],
        ];
    }
}
