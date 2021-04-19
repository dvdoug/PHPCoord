<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 60°W to 54°W, S hemisphere.
 * @internal
 */
class Extent1832
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-54, 0], [-60, 0], [-60, -44.819801330566], [-54, -44.819801330566], [-54, 0],
                ],
            ],
        ];
    }
}
