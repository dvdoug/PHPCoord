<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Greenland - 24°W to 18°W.
 * @internal
 */
class Extent3458
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-18, 84], [-24, 84], [-24, 67.705589290104], [-18, 67.705589290104], [-18, 84],
                ],
            ],
        ];
    }
}
