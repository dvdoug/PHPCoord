<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - Texas west of 100°W.
 * @internal
 */
class Extent2380
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-100, 36.493912716666], [-106.65006189088, 36.493912716666], [-106.65006189088, 28.040840642597], [-100, 28.040840642597], [-100, 36.493912716666],
                ],
            ],
        ];
    }
}
