<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 68°S to 72°S, 48°E to 60°E (SR39-40).
 * @internal
 */
class Extent3018
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [60, -68], [48, -68], [48, -72], [60, -72], [60, -68],
                ],
            ],
        ];
    }
}
