<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - 41°N to 85°N, west of 50°W.
 * @internal
 */
class Extent4618
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-50, 85], [-141.00299072266, 85], [-141.00299072266, 41], [-50, 41], [-50, 85],
                ],
            ],
        ];
    }
}
