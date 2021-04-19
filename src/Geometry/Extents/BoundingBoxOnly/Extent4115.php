<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 71°10'N to 66°10'N,  84°W to 65°W.
 * @internal
 */
class Extent4115
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-65, 71.166666030884], [-84, 71.166666030884], [-84, 66.166666030884], [-65, 66.166666030884], [-65, 71.166666030884],
                ],
            ],
        ];
    }
}
