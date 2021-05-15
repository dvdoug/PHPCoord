<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 71°10'N to 66°10'N, 141°W to 122°W.
 * @internal
 */
class Extent4112
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-122, 71.166666030884], [-141, 71.166666030884], [-141, 66.166666030884], [-122, 66.166666030884], [-122, 71.166666030884],
                ],
            ],
        ];
    }
}
