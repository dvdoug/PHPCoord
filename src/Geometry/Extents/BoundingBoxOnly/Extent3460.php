<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Greenland - 12°W to 6°W.
 * @internal
 */
class Extent3460
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-6, 84], [-12, 84], [-12, 72.439883918958], [-6, 72.439883918958], [-6, 84],
                ],
            ],
        ];
    }
}
