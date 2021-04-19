<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 68°S to 72°S, 72°E to 84°E (SR43-44).
 * @internal
 */
class Extent3020
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [84, -68], [72, -68], [72, -72], [84, -72], [84, -68],
                ],
            ],
        ];
    }
}
