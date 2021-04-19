<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 37°20'N to 38°N; 139°E to 140°E.
 * @internal
 */
class Extent2468
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [140, 37.999566666667], [139, 37.999566666667], [139, 37.332866666667], [140, 37.332866666667], [140, 37.999566666667],
                ],
            ],
        ];
    }
}
