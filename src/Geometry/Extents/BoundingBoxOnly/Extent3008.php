<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 68°S to 72°S, 108°W to 96°W (SR13-14).
 * @internal
 */
class Extent3008
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-96, -68], [-108, -68], [-108, -72], [-96, -72], [-96, -68],
                ],
            ],
        ];
    }
}
