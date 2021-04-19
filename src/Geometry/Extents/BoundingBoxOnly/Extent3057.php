<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 76°S to 80°S, 60°E to 84°E (ST41-44).
 * @internal
 */
class Extent3057
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [84, -76], [60, -76], [60, -80], [84, -80], [84, -76],
                ],
            ],
        ];
    }
}
