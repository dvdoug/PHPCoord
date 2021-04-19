<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - Oregon and Washington.
 * @internal
 */
class Extent2381
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-116.47041116841, 49.01227760315], [-124.78931045532, 49.01227760315], [-124.78931045532, 41.987672177954], [-116.47041116841, 41.987672177954], [-116.47041116841, 49.01227760315],
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
