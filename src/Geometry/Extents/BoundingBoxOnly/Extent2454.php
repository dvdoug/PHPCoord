<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 40°N to 40°40'N; 140°E to 141°E.
 * @internal
 */
class Extent2454
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [141, 40.666366666667], [140, 40.666366666667], [140, 39.999666666667], [141, 39.999666666667], [141, 40.666366666667],
                ],
            ],
        ];
    }
}
