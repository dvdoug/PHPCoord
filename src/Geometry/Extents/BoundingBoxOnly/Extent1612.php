<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Argentina - 61.5°W to 58.5°W onshore.
 * @internal
 */
class Extent1612
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-58.5, -23.376359939575], [-61.500240325928, -23.376359939575], [-61.500240325928, -39.058769226074], [-58.5, -39.058769226074], [-58.5, -23.376359939575],
                ],
            ],
        ];
    }
}
