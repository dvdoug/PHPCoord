<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 64°S to 68°S, 96°E to 108°E (SQ47-48).
 * @internal
 */
class Extent3002
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [108, -64], [96, -64], [96, -68], [108, -68], [108, -64],
                ],
            ],
        ];
    }
}
