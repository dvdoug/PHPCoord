<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 71°10'N to 66°10'N,  65°W to 47°W.
 * @internal
 */
class Extent4116
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-47, 71.166666030884], [-65, 71.166666030884], [-65, 66.166666030884], [-47, 66.166666030884], [-47, 71.166666030884],
                ],
            ],
        ];
    }
}
