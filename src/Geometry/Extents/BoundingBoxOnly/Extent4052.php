<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 84°30'N to 79°30'N, 174°W to 135°W.
 * @internal
 */
class Extent4052
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-135, 84.500001907349], [-174, 84.500001907349], [-174, 79.500001907349], [-135, 79.500001907349], [-135, 84.500001907349],
                ],
            ],
        ];
    }
}
