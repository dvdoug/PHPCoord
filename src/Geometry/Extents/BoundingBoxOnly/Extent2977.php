<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - CONUS north of 41°N, west of 112°W - onshore.
 * @internal
 */
class Extent2977
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-122.95846176147, 49.048540115357], [-123.1698513031, 49.048540115357], [-123.1698513031, 48.923215866089], [-122.95846176147, 48.923215866089], [-122.95846176147, 49.048540115357],
                ],
            ],
            [
                [
                    [-112, 49.01227760315], [-124.78931045532, 49.01227760315], [-124.78931045532, 41], [-112, 41], [-112, 49.01227760315],
                ],
            ],
        ];
    }
}
