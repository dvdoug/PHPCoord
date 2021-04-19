<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 64°S to 68°S, 48°E to 60°E (SQ39-40).
 * @internal
 */
class Extent2998
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [60, -64], [48, -64], [48, -68], [60, -68], [60, -64],
                ],
            ],
        ];
    }
}
