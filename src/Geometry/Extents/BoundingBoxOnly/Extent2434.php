<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 43°20'N to 44°N; 142°E to 143°E.
 * @internal
 */
class Extent2434
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [143, 43.999866666667], [142, 43.999866666667], [142, 43.333166666667], [143, 43.333166666667], [143, 43.999866666667],
                ],
            ],
        ];
    }
}
