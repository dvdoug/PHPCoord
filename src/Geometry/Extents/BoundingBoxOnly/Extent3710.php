<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Iraq - 29.7°N to 31.4°N, 46.1°E to 48°E (map 21).
 * @internal
 */
class Extent3710
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [48, 31.360201796158], [46.034078467373, 31.360201796158], [46.034078467373, 29.724853054994], [48, 29.724853054994], [48, 31.360201796158],
                ],
            ],
        ];
    }
}
