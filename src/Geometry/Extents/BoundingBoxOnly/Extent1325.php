<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/North America - Canada and USA (CONUS, Alaska mainland).
 * @internal
 */
class Extent1325
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-47.743430543984, 86.453745196084], [-172.53713452354, 86.453745196084], [-172.53713452354, 23.81750013802], [-47.743430543984, 23.81750013802], [-47.743430543984, 86.453745196084],
                ],
            ],
        ];
    }
}
