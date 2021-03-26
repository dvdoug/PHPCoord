<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 81°10'N to 76°10'N,  Canada east of 84°W.
 * @internal
 */
class Extent4072
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-64.782108940168, 81.166666030884], [-84, 81.166666030884], [-84, 76.166666030884], [-64.782108940168, 76.166666030884], [-64.782108940168, 81.166666030884],
                ],
            ],
        ];
    }
}
