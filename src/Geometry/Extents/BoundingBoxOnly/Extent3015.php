<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 68°S to 72°S, 12°E to 24°E (SR33-34).
 * @internal
 */
class Extent3015
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [24, -68], [12, -68], [12, -72], [24, -72], [24, -68],
                ],
            ],
        ];
    }
}
