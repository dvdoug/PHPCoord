<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 120°W to 114°W.
 * @internal
 */
class Extent3498
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-114, 49.003128051758], [-120, 49.003128051758], [-120, 30.880069938347], [-114, 30.880069938347], [-114, 49.003128051758],
                ],
            ],
        ];
    }
}
