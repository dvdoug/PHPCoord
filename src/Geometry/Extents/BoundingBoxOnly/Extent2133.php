<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 168°W to 162°W - AK, OCS.
 * @internal
 */
class Extent2133
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-162, 74.284743983571], [-168, 74.284743983571], [-168, 49.529692774427], [-162, 49.529692774427], [-162, 74.284743983571],
                ],
            ],
        ];
    }
}
