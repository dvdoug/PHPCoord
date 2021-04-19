<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 64°S to 68°S, 132°E to 144°E (SQ53-54).
 * @internal
 */
class Extent3005
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [144, -64], [132, -64], [132, -68], [144, -68], [144, -64],
                ],
            ],
        ];
    }
}
