<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 64°S to 68°S, 72°W to 60°W (SQ19-20).
 * @internal
 */
class Extent2995
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-60, -64], [-72, -64], [-72, -68], [-60, -68], [-60, -64],
                ],
            ],
        ];
    }
}
