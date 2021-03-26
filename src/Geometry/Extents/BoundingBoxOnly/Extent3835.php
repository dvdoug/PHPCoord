<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 72°W to 66°W, S hemisphere onshore.
 * @internal
 */
class Extent3835
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-66, 2.1428470611168], [-72, 2.1428470611168], [-72, -45], [-66, -45], [-66, 2.1428470611168],
                ],
            ],
        ];
    }
}
