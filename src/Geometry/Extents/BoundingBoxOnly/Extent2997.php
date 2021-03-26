<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 64°S to 68°S, 36°E to 48°E (SQ37-38).
 * @internal
 */
class Extent2997
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [48, -64], [36, -64], [36, -68], [48, -68], [48, -64],
                ],
            ],
        ];
    }
}
