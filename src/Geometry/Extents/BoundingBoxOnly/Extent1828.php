<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 72°W to 66°W, S hemisphere.
 * @internal
 */
class Extent1828
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-66, 0], [-72, 0], [-72, -59.864894866943], [-66, -59.864894866943], [-66, 0],
                ],
            ],
        ];
    }
}
