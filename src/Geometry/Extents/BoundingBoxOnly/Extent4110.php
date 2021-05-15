<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 71°10'N to 66°10'N, 174°W to 156°W.
 * @internal
 */
class Extent4110
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-156, 71.166666030884], [-174, 71.166666030884], [-174, 66.166666030884], [-156, 66.166666030884], [-156, 71.166666030884],
                ],
            ],
        ];
    }
}
