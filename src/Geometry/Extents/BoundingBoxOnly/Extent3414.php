<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - 96°W to 90°W.
 * @internal
 */
class Extent3414
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-90, 84], [-96, 84], [-96, 48.031912562541], [-90, 48.031912562541], [-90, 84],
                ],
            ],
        ];
    }
}
