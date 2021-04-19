<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 68°S to 72°S, 108°E to 120°E (SR49-50).
 * @internal
 */
class Extent3023
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [120, -68], [108, -68], [108, -72], [120, -72], [120, -68],
                ],
            ],
        ];
    }
}
