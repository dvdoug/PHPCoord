<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/China - 85.5°E to 88.5°E.
 * @internal
 */
class Extent2715
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [88.5, 49.173324584961], [85.5, 49.173324584961], [85.5, 27.804996490479], [88.5, 27.804996490479], [88.5, 49.173324584961],
                ],
            ],
        ];
    }
}
