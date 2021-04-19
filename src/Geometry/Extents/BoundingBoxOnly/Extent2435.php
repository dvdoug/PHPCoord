<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 43°20'N to 44°N; 143°E to 144°E.
 * @internal
 */
class Extent2435
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [144, 43.999866666667], [143, 43.999866666667], [143, 43.333166666667], [144, 43.333166666667], [144, 43.999866666667],
                ],
            ],
        ];
    }
}
