<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 42°40'N to 43°20'N; 143°E to 144°E.
 * @internal
 */
class Extent2441
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [144, 43.333166666667], [143, 43.333166666667], [143, 42.666466666667], [144, 42.666466666667], [144, 43.333166666667],
                ],
            ],
        ];
    }
}
