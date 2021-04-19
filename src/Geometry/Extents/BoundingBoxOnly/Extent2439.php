<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 42°40'N to 43°20'N; 141°E to 142°E.
 * @internal
 */
class Extent2439
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [142, 43.333166666667], [141, 43.333166666667], [141, 42.666466666667], [142, 42.666466666667], [142, 43.333166666667],
                ],
            ],
        ];
    }
}
