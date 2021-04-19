<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Greenland - east - 63°N to 66°N.
 * @internal
 */
class Extent2562
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-36, 66], [-46, 66], [-46, 63], [-36, 63], [-36, 66],
                ],
            ],
        ];
    }
}
