<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - GoM - west of 95°W.
 * @internal
 */
class Extent3360
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-95, 28.961587855496], [-97.211482716314, 28.961587855496], [-97.211482716314, 25.975158230373], [-95, 25.975158230373], [-95, 28.961587855496],
                ],
            ],
        ];
    }
}
