<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 64°S to 68°S, 84°E to 96°E (SQ45-46).
 * @internal
 */
class Extent3001
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [96, -64], [84, -64], [84, -68], [96, -68], [96, -64],
                ],
            ],
        ];
    }
}
