<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 102°W to 96°W and GoM OCS.
 * @internal
 */
class Extent3637
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-95.873023580522, 49.000274658203], [-102, 49.000274658203], [-102, 25.839859008738], [-95.873023580522, 25.839859008738], [-95.873023580522, 49.000274658203],
                ],
            ],
        ];
    }
}
