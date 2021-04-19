<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/China - 102°E to 108°E.
 * @internal
 */
class Extent3944
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [108, 20.028314855862], [107.1594446, 20.028314855862], [107.1594446, 17.75974555043], [108, 17.75974555043], [108, 20.028314855862],
                ],
            ],
            [
                [
                    [108, 42.466243743897], [102, 42.466243743897], [102, 21.536132812], [108, 21.536132812], [108, 42.466243743897],
                ],
            ],
        ];
    }
}
