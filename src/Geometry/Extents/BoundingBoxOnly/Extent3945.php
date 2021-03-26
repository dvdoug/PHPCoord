<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/China - 108°E to 114°E.
 * @internal
 */
class Extent3945
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [114, 45.100547790528], [108, 45.100547790528], [108, 16.701346131], [114, 16.701346131], [114, 45.100547790528],
                ],
            ],
        ];
    }
}
