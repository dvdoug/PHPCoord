<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 64°30'N to 59°30'N, 44°W to 29°W.
 * @internal
 */
class Extent4124
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-29, 64.500001907349], [-44, 64.500001907349], [-44, 59.500001907349], [-29, 59.500001907349], [-29, 64.500001907349],
                ],
            ],
        ];
    }
}
