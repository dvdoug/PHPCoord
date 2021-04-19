<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/China - 84°E to 90°E.
 * @internal
 */
class Extent1589
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [90, 49.173324584961], [84, 49.173324584961], [84, 27.327966125071], [90, 27.327966125071], [90, 49.173324584961],
                ],
            ],
        ];
    }
}
