<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - Texas east of 100°W.
 * @internal
 */
class Extent2379
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-93.507388858387, 34.579634629863], [-100, 34.579634629863], [-100, 25.839860916138], [-93.507388858387, 25.839860916138], [-93.507388858387, 34.579634629863],
                ],
            ],
        ];
    }
}
