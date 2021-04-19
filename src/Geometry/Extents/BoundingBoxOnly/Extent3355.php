<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Brazil - west of 54°W and south of 18°S.
 * @internal
 */
class Extent3355
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-54, -27.189140319824], [-57.608001708984, -27.189140319824], [-57.608001708984, -31.906721115112], [-54, -31.906721115112], [-54, -27.189140319824],
                ],
            ],
            [
                [
                    [-54, -18], [-58.158889770508, -18], [-58.158889770508, -25.633056640625], [-54, -25.633056640625], [-54, -18],
                ],
            ],
        ];
    }
}
