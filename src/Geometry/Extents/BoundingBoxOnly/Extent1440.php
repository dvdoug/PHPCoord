<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - Ontario - 90°W to 84°W.
 * @internal
 */
class Extent1440
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-84, 56.894989545085], [-90, 56.894989545085], [-90, 46.119971321774], [-84, 46.119971321774], [-84, 56.894989545085],
                ],
            ],
        ];
    }
}
