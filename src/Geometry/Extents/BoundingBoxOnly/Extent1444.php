<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - Quebec - 72°W to 66°W.
 * @internal
 */
class Extent1444
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-66, 61.790725031735], [-72, 61.790725031735], [-72, 45.019157409668], [-66, 45.019157409668], [-66, 61.790725031735],
                ],
            ],
        ];
    }
}
