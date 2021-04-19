<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 68°S to 72°S, 12°W to 0°W (SR29-30).
 * @internal
 */
class Extent3013
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [0, -68], [-12, -68], [-12, -72], [0, -72], [0, -68],
                ],
            ],
        ];
    }
}
