<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 60°W to 54°W, N hemisphere.
 * @internal
 */
class Extent1831
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-54, 10.693311691284], [-60, 10.693311691284], [-60, 0], [-54, 0], [-54, 10.693311691284],
                ],
            ],
        ];
    }
}
