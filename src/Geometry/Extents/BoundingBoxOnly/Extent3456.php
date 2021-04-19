<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Greenland - 36°W to 30°W.
 * @internal
 */
class Extent3456
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-30, 84], [-36, 84], [-36, 60.161515108486], [-30, 60.161515108486], [-30, 84],
                ],
            ],
        ];
    }
}
