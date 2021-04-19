<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - Quebec and Labrador - 69°W to 66°W.
 * @internal
 */
class Extent2278
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-66, 58.994812332991], [-69, 58.994812332991], [-69, 48.728939535172], [-66, 48.728939535172], [-66, 58.994812332991],
                ],
            ],
            [
                [
                    [-66, 49.272042905014], [-69, 49.272042905014], [-69, 47.311696983465], [-66, 47.311696983465], [-66, 49.272042905014],
                ],
            ],
        ];
    }
}
