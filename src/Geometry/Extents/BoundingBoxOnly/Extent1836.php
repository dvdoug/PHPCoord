<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 42°W to 36°W.
 * @internal
 */
class Extent1836
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-36, 0], [-42, 0], [-42, -26.346200942993], [-36, -26.346200942993], [-36, 0],
                ],
            ],
        ];
    }
}
