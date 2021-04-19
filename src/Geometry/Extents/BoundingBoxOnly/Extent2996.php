<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 64°S to 68°S, 60°W to 48°W (SQ21-22).
 * @internal
 */
class Extent2996
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-48, -64], [-60, -64], [-60, -68], [-48, -68], [-48, -64],
                ],
            ],
        ];
    }
}
