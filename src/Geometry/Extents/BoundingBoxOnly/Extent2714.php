<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/China - 82.5°E to 85.5°E.
 * @internal
 */
class Extent2714
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [85.5, 47.224712371826], [82.5, 47.224712371826], [82.5, 28.263610839844], [85.5, 28.263610839844], [85.5, 47.224712371826],
                ],
            ],
        ];
    }
}
