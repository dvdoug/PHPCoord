<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Brazil - 42°W to 36°W onshore.
 * @internal
 */
class Extent1818
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-36, -2.682373046875], [-42, -2.682373046875], [-42, -22.957443237305], [-36, -22.957443237305], [-36, -2.682373046875],
                ],
            ],
        ];
    }
}
