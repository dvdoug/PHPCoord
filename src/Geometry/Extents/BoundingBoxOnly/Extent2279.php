<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - Quebec and Ontario - 75°W to 72°W.
 * @internal
 */
class Extent2279
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-72, 62.529189652736], [-75, 62.529189652736], [-75, 44.981708362931], [-72, 44.981708362931], [-72, 62.529189652736],
                ],
            ],
        ];
    }
}
