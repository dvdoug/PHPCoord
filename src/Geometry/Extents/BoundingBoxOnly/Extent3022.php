<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 68°S to 72°S, 96°E to 108°E (SR47-48).
 * @internal
 */
class Extent3022
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [108, -68], [96, -68], [96, -72], [108, -72], [108, -68],
                ],
            ],
        ];
    }
}
