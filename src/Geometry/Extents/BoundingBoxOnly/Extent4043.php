<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 71°N to 59°N,  60°E to 150°E.
 * @internal
 */
class Extent4043
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [150, 71], [60, 71], [60, 59], [150, 59], [150, 71],
                ],
            ],
        ];
    }
}
