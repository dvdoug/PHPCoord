<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Brazil - 60°W to 54°W.
 * @internal
 */
class Extent3881
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-54, -27.189140416747], [-57.608001708954, -27.189140416747], [-57.608001708954, -31.906721115112], [-54, -31.906721115112], [-54, -27.189140416747],
                ],
            ],
            [
                [
                    [-54, 4.5080547332608], [-60, 4.5080547332608], [-60, -25.633056640561], [-54, -25.633056640561], [-54, 4.5080547332608],
                ],
            ],
        ];
    }
}
