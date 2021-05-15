<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 64°30'N to 59°30'N, 59°W to 44°W.
 * @internal
 */
class Extent4123
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-44, 64.500001907349], [-59, 64.500001907349], [-59, 59.500001907349], [-44, 59.500001907349], [-44, 64.500001907349],
                ],
            ],
        ];
    }
}
