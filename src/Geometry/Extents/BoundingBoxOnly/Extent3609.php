<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Africa/Congo DR (Zaire) - Katanga west of 25.5°E.
 * @internal
 */
class Extent3609
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [25.5, -6.5828384735794], [21.749025344849, -6.5828384735794], [21.749025344849, -11.710495381833], [25.5, -11.710495381833], [25.5, -6.5828384735794],
                ],
            ],
            [
                [
                    [25.5, -6.3283290863036], [25.255598068238, -6.3283290863036], [25.255598068238, -6.5486102104186], [25.5, -6.5486102104186], [25.5, -6.3283290863036],
                ],
            ],
        ];
    }
}
