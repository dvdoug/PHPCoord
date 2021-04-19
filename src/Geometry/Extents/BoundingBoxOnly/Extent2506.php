<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 34°N to 34°40'N; 137°E to 138°E.
 * @internal
 */
class Extent2506
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [138, 34.666066666667], [137, 34.666066666667], [137, 34.518468298108], [138, 34.518468298108], [138, 34.666066666667],
                ],
            ],
        ];
    }
}
