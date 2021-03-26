<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 45°20'N to 46°N; 141°E to 142°E.
 * @internal
 */
class Extent2425
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [142, 45.535358965168], [141.56874890971, 45.535358965168], [141.56874890971, 45.333266666667], [142, 45.333266666667], [142, 45.535358965168],
                ],
            ],
        ];
    }
}
