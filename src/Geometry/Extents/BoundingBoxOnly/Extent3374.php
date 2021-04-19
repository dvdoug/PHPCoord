<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 180°W to 174°W - AK, OCS.
 * @internal
 */
class Extent3374
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-174, 63.206756873146], [-180, 63.206756873146], [-180, 47.881341934204], [-174, 47.881341934204], [-174, 63.206756873146],
                ],
            ],
        ];
    }
}
