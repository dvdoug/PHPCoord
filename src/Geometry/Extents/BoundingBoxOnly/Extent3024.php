<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 68°S to 72°S, 120°E to 132°E (SR51-52).
 * @internal
 */
class Extent3024
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [132, -68], [120, -68], [120, -72], [132, -72], [132, -68],
                ],
            ],
        ];
    }
}
