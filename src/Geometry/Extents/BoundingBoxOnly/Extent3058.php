<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 76°S to 80°S, 84°E to 108°E (ST45-48).
 * @internal
 */
class Extent3058
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [108, -76], [84, -76], [84, -80], [108, -80], [108, -76],
                ],
            ],
        ];
    }
}
