<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 68°S to 72°S, 36°E to 48°E (SR37-38).
 * @internal
 */
class Extent3017
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [48, -68], [36, -68], [36, -72], [48, -72], [48, -68],
                ],
            ],
        ];
    }
}
