<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 33°20'N to 34°N; 133°E to 134°E.
 * @internal
 */
class Extent2512
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [134, 33.999366666667], [133, 33.999366666667], [133, 33.332666666667], [134, 33.332666666667], [134, 33.999366666667],
                ],
            ],
        ];
    }
}
