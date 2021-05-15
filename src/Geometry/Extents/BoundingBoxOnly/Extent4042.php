<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 71°N to 59°N, 12°W to 78°E.
 * @internal
 */
class Extent4042
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [78, 71], [-12, 71], [-12, 59], [78, 59], [78, 71],
                ],
            ],
        ];
    }
}
