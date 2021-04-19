<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 96°W to 90°W onshore.
 * @internal
 */
class Extent3861
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-90, 49.376655578613], [-96, 49.376655578613], [-96, 28.423334904526], [-90, 28.423334904526], [-90, 49.376655578613],
                ],
            ],
        ];
    }
}
