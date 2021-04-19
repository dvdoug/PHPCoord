<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/India - mainland south of 15°N.
 * @internal
 */
class Extent1673
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [74.379821158986, 14.069828368764], [74.273789070507, 14.069828368764], [74.273789070507, 13.96184220161], [74.379821158986, 13.96184220161], [74.379821158986, 14.069828368764],
                ],
            ],
            [
                [
                    [80.39620909844, 15], [73.942904609249, 15], [73.942904609249, 8.0271183475451], [80.39620909844, 8.0271183475451], [80.39620909844, 15],
                ],
            ],
        ];
    }
}
