<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 76°S to 80°S, 12°W to 12°E (ST29-32).
 * @internal
 */
class Extent3054
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [12, -76], [-12, -76], [-12, -80], [12, -80], [12, -76],
                ],
            ],
        ];
    }
}
