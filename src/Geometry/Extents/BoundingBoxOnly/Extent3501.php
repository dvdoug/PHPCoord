<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 102°W to 96°W.
 * @internal
 */
class Extent3501
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-96, 49.000274658203], [-102, 49.000274658203], [-102, 25.839859008738], [-96, 25.839859008738], [-96, 49.000274658203],
                ],
            ],
        ];
    }
}
