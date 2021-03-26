<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 64°S to 68°S, 120°E to 132°E (SQ51-52).
 * @internal
 */
class Extent3004
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [132, -64], [120, -64], [120, -68], [132, -68], [132, -64],
                ],
            ],
        ];
    }
}
