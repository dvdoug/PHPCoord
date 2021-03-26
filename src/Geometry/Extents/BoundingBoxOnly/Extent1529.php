<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Turkey - 40.5°E to 43.5°E onshore.
 * @internal
 */
class Extent1529
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [43.5, 41.594718933106], [40.5, 41.594718933106], [40.5, 37.022175906749], [43.5, 37.022175906749], [43.5, 41.594718933106],
                ],
            ],
        ];
    }
}
