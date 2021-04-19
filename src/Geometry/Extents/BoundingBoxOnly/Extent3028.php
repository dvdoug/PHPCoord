<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 68°S to 72°S, 168°E to 180°E (SR59-60).
 * @internal
 */
class Extent3028
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [180, -68], [168, -68], [168, -72], [180, -72], [180, -68],
                ],
            ],
        ];
    }
}
