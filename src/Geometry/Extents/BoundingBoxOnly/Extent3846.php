<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Greenland - southwest coast south of 63°N.
 * @internal
 */
class Extent3846
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-42.52393003546, 63], [-50.712219208805, 63], [-50.712219208805, 59.74371386496], [-42.52393003546, 59.74371386496], [-42.52393003546, 63],
                ],
            ],
        ];
    }
}
