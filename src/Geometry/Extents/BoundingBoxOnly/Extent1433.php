<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - Ontario - MTM zone 12.
 * @internal
 */
class Extent1433
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-79.5, 55.205201425337], [-82.5, 55.205201425337], [-82.5, 46], [-79.5, 46], [-79.5, 55.205201425337],
                ],
            ],
        ];
    }
}
