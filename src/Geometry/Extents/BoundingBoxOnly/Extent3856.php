<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - Ross Ice Shelf Region.
 * @internal
 */
class Extent3856
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [210, -76], [150, -76], [150, -90], [210, -90], [210, -76],
                ],
            ],
        ];
    }
}
