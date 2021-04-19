<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 40°40'N to 41°20'N; 140°E to 141°E.
 * @internal
 */
class Extent2451
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [141, 41.333066666667], [140, 41.333066666667], [140, 40.666366666667], [141, 40.666366666667], [141, 41.333066666667],
                ],
            ],
        ];
    }
}
