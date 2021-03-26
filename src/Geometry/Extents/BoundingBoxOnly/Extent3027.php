<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 68°S to 72°S, 156°E to 168°E (SR57-58).
 * @internal
 */
class Extent3027
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [168, -68], [156, -68], [156, -72], [168, -72], [168, -68],
                ],
            ],
        ];
    }
}
