<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Arctic/Arctic - 87°N to 75°N,  60°E to 150°E.
 * @internal
 */
class Extent4029
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [150.00000190735, 87], [60, 87], [60, 75.000001907349], [150.00000190735, 75.000001907349], [150.00000190735, 87],
                ],
            ],
        ];
    }
}
