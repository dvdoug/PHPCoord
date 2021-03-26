<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 64°S to 68°S, 180°W to 168°W (SQ01-02).
 * @internal
 */
class Extent2994
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-168, -64], [-180, -64], [-180, -68], [-168, -68], [-168, -64],
                ],
            ],
        ];
    }
}
