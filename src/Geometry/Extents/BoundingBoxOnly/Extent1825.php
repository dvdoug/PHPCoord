<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 78°W to 72°W, N hemisphere.
 * @internal
 */
class Extent1825
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-72, 15.033334732056], [-78, 15.033334732056], [-78, 0], [-72, 0], [-72, 15.033334732056],
                ],
            ],
        ];
    }
}
