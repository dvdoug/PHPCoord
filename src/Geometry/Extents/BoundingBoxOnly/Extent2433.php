<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 43°20'N to 44°N; 141°E to 142°E.
 * @internal
 */
class Extent2433
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [142, 43.999866666667], [141.26925338315, 43.999866666667], [141.26925338315, 43.333166666667], [142, 43.333166666667], [142, 43.999866666667],
                ],
            ],
        ];
    }
}
