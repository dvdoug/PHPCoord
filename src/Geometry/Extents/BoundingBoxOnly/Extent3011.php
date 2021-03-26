<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 68°S to 72°S, 72°W to 60°W (SR19-20).
 * @internal
 */
class Extent3011
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-60, -68], [-72, -68], [-72, -72], [-60, -72], [-60, -68],
                ],
            ],
        ];
    }
}
