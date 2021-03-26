<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 68°S to 72°S, 84°E to 96°E (SR45-46).
 * @internal
 */
class Extent3021
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [96, -68], [84, -68], [84, -72], [96, -72], [96, -68],
                ],
            ],
        ];
    }
}
