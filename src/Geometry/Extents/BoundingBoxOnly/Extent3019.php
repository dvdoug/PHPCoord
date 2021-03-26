<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 68°S to 72°S, 60°E to 72°E (SR41-42).
 * @internal
 */
class Extent3019
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [72, -68], [60, -68], [60, -72], [72, -72], [72, -68],
                ],
            ],
        ];
    }
}
