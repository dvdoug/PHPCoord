<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Brazil - 48°W to 42°W and north of 0°N.
 * @internal
 */
class Extent4129
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-42, 5.1226054124216], [-48, 5.1226054124216], [-48, 0], [-42, 0], [-42, 5.1226054124216],
                ],
            ],
        ];
    }
}
