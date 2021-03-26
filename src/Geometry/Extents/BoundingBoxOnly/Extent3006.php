<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 64°S to 68°S, 144°E to 156°E (SQ55-56).
 * @internal
 */
class Extent3006
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [156, -64], [144, -64], [144, -68], [156, -68], [156, -64],
                ],
            ],
        ];
    }
}
