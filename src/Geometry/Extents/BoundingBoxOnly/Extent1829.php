<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 66°W to 60°W, N hemisphere.
 * @internal
 */
class Extent1829
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-60, 16.745054244995], [-66, 16.745054244995], [-66, 0], [-60, 0], [-60, 16.745054244995],
                ],
            ],
        ];
    }
}
