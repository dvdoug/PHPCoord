<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Greenland - 48°W to 42°W.
 * @internal
 */
class Extent3454
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-42, 84], [-48, 84], [-48, 56.383177168], [-42, 56.383177168], [-42, 84],
                ],
            ],
        ];
    }
}
