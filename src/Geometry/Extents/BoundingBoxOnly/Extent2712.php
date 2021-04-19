<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/China - 76.5°E to 79.5°E.
 * @internal
 */
class Extent2712
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [79.5, 32.696079254151], [78.404327392578, 32.696079254151], [78.404327392578, 31.035829544068], [79.5, 31.035829544068], [79.5, 32.696079254151],
                ],
            ],
            [
                [
                    [79.5, 41.825726016166], [76.5, 41.825726016166], [76.5, 32.782390588816], [79.5, 32.782390588816], [79.5, 41.825726016166],
                ],
            ],
        ];
    }
}
