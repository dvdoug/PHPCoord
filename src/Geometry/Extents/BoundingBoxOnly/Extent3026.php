<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 68°S to 72°S, 144°E to 156°E (SR55-56).
 * @internal
 */
class Extent3026
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [156, -68], [144, -68], [144, -72], [156, -72], [156, -68],
                ],
            ],
        ];
    }
}
