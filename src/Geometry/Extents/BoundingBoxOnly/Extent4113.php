<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 71°10'N to 66°10'N, 122°W to 103°W.
 * @internal
 */
class Extent4113
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-103, 71.166666030884], [-122, 71.166666030884], [-122, 66.166666030884], [-103, 66.166666030884], [-103, 71.166666030884],
                ],
            ],
        ];
    }
}
