<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 64°S to 68°S, 72°E to 84°E (SQ43-44).
 * @internal
 */
class Extent3000
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [84, -64], [72, -64], [72, -68], [84, -68], [84, -64],
                ],
            ],
        ];
    }
}
