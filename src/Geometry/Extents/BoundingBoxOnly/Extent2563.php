<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Greenland - west - 78°N to 81°N.
 * @internal
 */
class Extent2563
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-44, 81], [-73.281564503721, 81], [-73.281564503721, 78], [-44, 78], [-44, 81],
                ],
            ],
        ];
    }
}
