<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Greenland - 18°W to 12°W.
 * @internal
 */
class Extent3459
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-12, 84], [-18, 84], [-18, 68.674916377983], [-12, 68.674916377983], [-12, 84],
                ],
            ],
        ];
    }
}
