<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 68°S to 72°S, 84°W to 72°W (SR17-18).
 * @internal
 */
class Extent3010
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-72, -68], [-84, -68], [-84, -72], [-72, -72], [-72, -68],
                ],
            ],
        ];
    }
}
