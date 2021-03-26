<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 162°W to 156°W - AK, HI.
 * @internal
 */
class Extent3489
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-156, 25.57941114], [-162, 25.57941114], [-162, 15.577321067487], [-156, 15.577321067487], [-156, 25.57941114],
                ],
            ],
            [
                [
                    [-156, 74.709768295288], [-162, 74.709768295288], [-162, 50.984490477099], [-156, 50.984490477099], [-156, 74.709768295288],
                ],
            ],
        ];
    }
}
