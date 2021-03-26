<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 84°W to 78°W onshore.
 * @internal
 */
class Extent3863
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-78, 46.126098632813], [-84, 46.126098632813], [-84, 24.410230723243], [-78, 24.410230723243], [-78, 46.126098632813],
                ],
            ],
        ];
    }
}
