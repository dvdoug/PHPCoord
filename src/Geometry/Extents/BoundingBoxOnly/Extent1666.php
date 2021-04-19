<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Thailand - east of 102°E.
 * @internal
 */
class Extent1666
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [103.625385597, 9.0914352942763], [102, 9.0914352942763], [102, 6.0282662696163], [103.625385597, 6.0282662696163], [103.625385597, 9.0914352942763],
                ],
            ],
            [
                [
                    [105.63928985596, 18.434993743897], [102, 18.434993743897], [102, 11.008200103079], [105.63928985596, 11.008200103079], [105.63928985596, 18.434993743897],
                ],
            ],
        ];
    }
}
