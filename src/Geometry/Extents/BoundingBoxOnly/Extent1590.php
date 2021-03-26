<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/China - 90°E to 96°E.
 * @internal
 */
class Extent1590
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [96, 47.892268017519], [90, 47.892268017519], [90, 27.715101242065], [96, 27.715101242065], [96, 47.892268017519],
                ],
            ],
        ];
    }
}
