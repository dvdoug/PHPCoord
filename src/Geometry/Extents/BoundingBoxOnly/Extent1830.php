<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 66°W to 60°W, S hemisphere.
 * @internal
 */
class Extent1830
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-60, 0], [-66, 0], [-66, -58.386787414551], [-60, -58.386787414551], [-60, 0],
                ],
            ],
        ];
    }
}
