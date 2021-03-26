<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 178.5°W to 175.5°W onshore.
 * @internal
 */
class Extent2707
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-175.5, 68.664911448463], [-178.5, 68.664911448463], [-178.5, 64.744930747072], [-175.5, 64.744930747072], [-175.5, 68.664911448463],
                ],
            ],
            [
                [
                    [-177.287626, 71.604632774986], [-178.5, 71.604632774986], [-178.5, 70.952090943322], [-177.287626, 70.952090943322], [-177.287626, 71.604632774986],
                ],
            ],
        ];
    }
}
