<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 68°S to 72°S, 0°E to 12°E (SR31-32).
 * @internal
 */
class Extent3014
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [12, -68], [0, -68], [0, -72], [12, -72], [12, -68],
                ],
            ],
        ];
    }
}
