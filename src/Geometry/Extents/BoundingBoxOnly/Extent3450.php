<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Greenland - 72°W to 66°W.
 * @internal
 */
class Extent3450
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-66, 80.89440188134], [-72, 80.89440188134], [-72, 73.241062868496], [-66, 73.241062868496], [-66, 80.89440188134],
                ],
            ],
        ];
    }
}
