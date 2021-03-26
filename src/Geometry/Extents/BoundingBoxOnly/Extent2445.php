<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 42°N to 42°40'N; 140°E to 141°E.
 * @internal
 */
class Extent2445
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [141, 42.666466666667], [140, 42.666466666667], [140, 41.999766666667], [141, 41.999766666667], [141, 42.666466666667],
                ],
            ],
        ];
    }
}
