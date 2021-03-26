<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 41°20'N to 42°N; west of 141°E.
 * @internal
 */
class Extent2449
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [141, 41.999766666667], [139.91276341136, 41.999766666667], [139.91276341136, 41.348161211323], [141, 41.348161211323], [141, 41.999766666667],
                ],
            ],
            [
                [
                    [141, 41.57864317941], [140.74796973498, 41.57864317941], [140.74796973498, 41.333066666667], [141, 41.333066666667], [141, 41.57864317941],
                ],
            ],
        ];
    }
}
