<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Brazil - 36°W to 30°W.
 * @internal
 */
class Extent3447
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-30, -17.216369870804], [-32.900419235229, -17.216369870804], [-32.900419235229, -23.795684782807], [-30, -23.795684782807], [-30, -17.216369870804],
                ],
            ],
            [
                [
                    [-30, 4.1859912872314], [-36, 4.1859912872314], [-36, -20.104112625122], [-30, -20.104112625122], [-30, 4.1859912872314],
                ],
            ],
        ];
    }
}
