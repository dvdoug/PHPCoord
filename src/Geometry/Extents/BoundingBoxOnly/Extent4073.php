<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 81°10'N to 76°10'N,  Greenland west of 54°W.
 * @internal
 */
class Extent4073
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-54, 81.166666030884], [-74.998683569945, 81.166666030884], [-74.998683569945, 76.166666030884], [-54, 76.166666030884], [-54, 81.166666030884],
                ],
            ],
        ];
    }
}
