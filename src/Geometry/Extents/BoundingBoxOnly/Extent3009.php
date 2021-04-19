<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 68°S to 72°S, 96°W to 84°W (SR15-16).
 * @internal
 */
class Extent3009
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-84, -68], [-96, -68], [-96, -72], [-84, -72], [-84, -68],
                ],
            ],
        ];
    }
}
