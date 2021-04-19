<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 79°N to 67°N,  60°E to 150°E.
 * @internal
 */
class Extent4037
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [150, 79.000001907349], [60, 79.000001907349], [60, 67], [150, 67], [150, 79.000001907349],
                ],
            ],
        ];
    }
}
