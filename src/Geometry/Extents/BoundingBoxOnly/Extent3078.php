<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 84°S to 88°S, 60°E to 120°E (SV41-50).
 * @internal
 */
class Extent3078
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [120, -84], [60, -84], [60, -88], [120, -88], [120, -84],
                ],
            ],
        ];
    }
}
