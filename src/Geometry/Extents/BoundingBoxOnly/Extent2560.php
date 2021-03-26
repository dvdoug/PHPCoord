<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Greenland - east - 69°N to 72°N.
 * @internal
 */
class Extent2560
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-21.326383634051, 72], [-38, 72], [-38, 69], [-21.326383634051, 69], [-21.326383634051, 72],
                ],
            ],
        ];
    }
}
