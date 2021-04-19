<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 72°S to 76°S, 0°E to 18°E (SS31-33).
 * @internal
 */
class Extent3037
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [18, -72], [0, -72], [0, -76], [18, -76], [18, -72],
                ],
            ],
        ];
    }
}
