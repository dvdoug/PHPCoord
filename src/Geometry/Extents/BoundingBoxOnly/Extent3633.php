<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Mexico - 96°W to 90°W.
 * @internal
 */
class Extent3633
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-90, 26.008415942751], [-96, 26.008415942751], [-96, 12.103074126835], [-90, 12.103074126835], [-90, 26.008415942751],
                ],
            ],
        ];
    }
}
