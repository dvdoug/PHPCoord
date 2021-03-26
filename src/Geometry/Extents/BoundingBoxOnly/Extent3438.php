<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 60°W to 54°W, N hemisphere and SIRGAS 2000 by country.
 * @internal
 */
class Extent3438
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-54, 12.187284469604], [-60, 12.187284469604], [-60, 1.1868762969971], [-54, 1.1868762969971], [-54, 12.187284469604],
                ],
            ],
        ];
    }
}
