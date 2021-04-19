<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 96°W to 90°W.
 * @internal
 */
class Extent3502
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-90, 49.376655578613], [-96.000018984178, 49.376655578613], [-96.000018984178, 25.616981926865], [-90, 25.616981926865], [-90, 49.376655578613],
                ],
            ],
        ];
    }
}
