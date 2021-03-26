<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Greenland - 54°W to 48°W.
 * @internal
 */
class Extent3453
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-48, 84], [-54, 84], [-54, 56.908528306801], [-48, 56.908528306801], [-48, 84],
                ],
            ],
        ];
    }
}
