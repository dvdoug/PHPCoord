<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 76°S to 80°S, 36°E to 60°E (ST37-40).
 * @internal
 */
class Extent3056
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [60, -76], [36, -76], [36, -80], [60, -80], [60, -76],
                ],
            ],
        ];
    }
}
