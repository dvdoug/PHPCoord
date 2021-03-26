<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 84°S to 88°S, 0°E to 60°E (SV31-40).
 * @internal
 */
class Extent3077
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [60, -84], [0, -84], [0, -88], [60, -88], [60, -84],
                ],
            ],
        ];
    }
}
