<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 64°S to 68°S, 60°E to 72°E (SQ41-42).
 * @internal
 */
class Extent2999
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [72, -64], [60, -64], [60, -68], [72, -68], [72, -64],
                ],
            ],
        ];
    }
}
