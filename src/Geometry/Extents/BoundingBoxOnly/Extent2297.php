<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - California - north of 36.5°N.
 * @internal
 */
class Extent2297
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-116.54915169611, 42.002191775136], [-124.44132804871, 42.002191775136], [-124.44132804871, 36.5], [-116.54915169611, 36.5], [-116.54915169611, 42.002191775136],
                ],
            ],
        ];
    }
}
