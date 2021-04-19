<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 42°40'N to 43°20'N; 142°E to 143°E.
 * @internal
 */
class Extent2440
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [143, 43.333166666667], [142, 43.333166666667], [142, 42.666466666667], [143, 42.666466666667], [143, 43.333166666667],
                ],
            ],
        ];
    }
}
