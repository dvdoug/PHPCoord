<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 54°W to 48°W, N hemisphere.
 * @internal
 */
class Extent1833
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-48, 9.2340564727783], [-54, 9.2340564727783], [-54, 0], [-48, 0], [-48, 9.2340564727783],
                ],
            ],
        ];
    }
}
