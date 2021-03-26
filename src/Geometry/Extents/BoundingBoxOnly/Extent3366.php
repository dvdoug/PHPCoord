<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Greenland - west coast - 72°N to 75°N.
 * @internal
 */
class Extent3366
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-52.027841571817, 75], [-58.038134677113, 75], [-58.038134677113, 72], [-52.027841571817, 72], [-52.027841571817, 75],
                ],
            ],
            [
                [
                    [-58.042196416491, 75], [-58.203542241491, 75], [-58.203542241491, 74.995750316433], [-58.042196416491, 74.995750316433], [-58.042196416491, 75],
                ],
            ],
        ];
    }
}
