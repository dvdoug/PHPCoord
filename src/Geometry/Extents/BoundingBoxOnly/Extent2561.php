<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Greenland - east - 66°N to 69°N.
 * @internal
 */
class Extent2561
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-25.148826118595, 69], [-42, 69], [-42, 66], [-25.148826118595, 66], [-25.148826118595, 69],
                ],
            ],
        ];
    }
}
