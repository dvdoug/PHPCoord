<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 68°S to 72°S, 132°E to 144°E (SR53-54).
 * @internal
 */
class Extent3025
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [144, -68], [132, -68], [132, -72], [144, -72], [144, -68],
                ],
            ],
        ];
    }
}
