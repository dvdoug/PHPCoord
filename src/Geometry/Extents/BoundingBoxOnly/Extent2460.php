<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 38°40'N to 39°20'N; 140°E to 141°E.
 * @internal
 */
class Extent2460
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [141, 39.332966666667], [140, 39.332966666667], [140, 38.666266666667], [141, 38.666266666667], [141, 39.332966666667],
                ],
            ],
        ];
    }
}
