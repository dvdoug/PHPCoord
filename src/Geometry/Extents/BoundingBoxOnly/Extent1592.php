<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/China - 102°E to 108°E onshore.
 * @internal
 */
class Extent1592
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [108, 42.466243743897], [102, 42.466243743897], [102, 21.536132812], [108, 21.536132812], [108, 42.466243743897],
                ],
            ],
        ];
    }
}
