<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 84°W to 78°W and GoM OCS.
 * @internal
 */
class Extent3642
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-78, 46.126098632813], [-84.081692313727, 46.126098632813], [-84.081692313727, 23.81750013802], [-78, 23.81750013802], [-78, 46.126098632813],
                ],
            ],
        ];
    }
}
