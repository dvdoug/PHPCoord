<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/China - 100.5°E to 103.5°E.
 * @internal
 */
class Extent2720
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [103.5, 42.685717170771], [100.5, 42.685717170771], [100.5, 21.139492034913], [103.5, 21.139492034913], [103.5, 42.685717170771],
                ],
            ],
        ];
    }
}
