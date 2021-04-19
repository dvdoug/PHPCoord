<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 162°W to 156°W - AK, OCS.
 * @internal
 */
class Extent2134
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-156, 74.709768295288], [-162, 74.709768295288], [-162, 50.984490477099], [-156, 50.984490477099], [-156, 74.709768295288],
                ],
            ],
        ];
    }
}
