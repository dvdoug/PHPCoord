<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - 84°W to 78°W.
 * @internal
 */
class Extent3416
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-78, 84], [-84, 84], [-84, 41.675552368164], [-78, 41.675552368164], [-78, 84],
                ],
            ],
        ];
    }
}
