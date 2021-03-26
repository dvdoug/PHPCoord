<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 68°S to 72°S, 24°E to 36°E (SR35-36).
 * @internal
 */
class Extent3016
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [36, -68], [24, -68], [24, -72], [36, -72], [36, -68],
                ],
            ],
        ];
    }
}
