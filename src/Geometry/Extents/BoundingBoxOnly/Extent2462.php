<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 38°N to 38°40'N; 139°E to 140°E.
 * @internal
 */
class Extent2462
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [140, 38.666266666667], [139.11168604359, 38.666266666667], [139.11168604359, 37.999566666667], [140, 37.999566666667], [140, 38.666266666667],
                ],
            ],
        ];
    }
}
