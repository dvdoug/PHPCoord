<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 68°S to 72°S, 24°W to 12°W (SR27-28).
 * @internal
 */
class Extent3012
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-12, -68], [-24, -68], [-24, -72], [-12, -72], [-12, -68],
                ],
            ],
        ];
    }
}
