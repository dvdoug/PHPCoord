<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 126°W to 120°W onshore.
 * @internal
 */
class Extent3857
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-120, 49.01227760315], [-124.78931045532, 49.01227760315], [-124.78931045532, 34.406522750855], [-120, 34.406522750855], [-120, 49.01227760315],
                ],
            ],
            [
                [
                    [-120, 34.085313796997], [-120.2860660553, 34.085313796997], [-120.2860660553, 33.856344223023], [-120, 33.856344223023], [-120, 34.085313796997],
                ],
            ],
            [
                [
                    [-122.95846176147, 49.048540115357], [-123.1698513031, 49.048540115357], [-123.1698513031, 48.923215866089], [-122.95846176147, 48.923215866089], [-122.95846176147, 49.048540115357],
                ],
            ],
        ];
    }
}
