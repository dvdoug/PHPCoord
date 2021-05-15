<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 71°10'N to 66°10'N, 47°W to 29°W.
 * @internal
 */
class Extent4117
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-29, 71.166666030884], [-47, 71.166666030884], [-47, 66.166666030884], [-29, 66.166666030884], [-29, 71.166666030884],
                ],
            ],
        ];
    }
}
