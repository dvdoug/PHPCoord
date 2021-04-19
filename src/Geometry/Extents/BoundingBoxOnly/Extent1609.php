<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Argentina - 70.5°W to 67.5°W onshore.
 * @internal
 */
class Extent1609
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-67.5, -52.594263076782], [-68.637889862061, -52.594263076782], [-68.637889862061, -54.899435043335], [-67.5, -54.899435043335], [-67.5, -52.594263076782],
                ],
            ],
            [
                [
                    [-67.5, -24.089658737183], [-70.5, -24.089658737183], [-70.5, -52.427352905273], [-67.5, -52.427352905273], [-67.5, -24.089658737183],
                ],
            ],
        ];
    }
}
