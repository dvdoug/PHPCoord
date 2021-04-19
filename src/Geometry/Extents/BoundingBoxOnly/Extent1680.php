<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/India - mainland 72°E to 78°E.
 * @internal
 */
class Extent1680
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [78, 35.501331329346], [72, 35.501331329346], [72, 8.027118347545], [78, 8.027118347545], [78, 35.501331329346],
                ],
            ],
            [
                [
                    [74.379821158986, 14.069828368764], [74.273789070507, 14.069828368764], [74.273789070507, 13.96184220161], [74.379821158986, 13.96184220161], [74.379821158986, 14.069828368764],
                ],
            ],
        ];
    }
}
