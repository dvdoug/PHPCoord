<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 64°S to 68°S, 108°E to 120°E (SQ49-50).
 * @internal
 */
class Extent3003
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [120, -64], [108, -64], [108, -68], [120, -68], [120, -64],
                ],
            ],
        ];
    }
}
