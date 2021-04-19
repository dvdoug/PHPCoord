<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 64°S to 68°S, 156°E to 168°E (SQ57-58).
 * @internal
 */
class Extent3007
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [168, -64], [156, -64], [156, -68], [168, -68], [168, -64],
                ],
            ],
        ];
    }
}
