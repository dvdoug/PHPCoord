<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 54°W to 48°W, S hemisphere.
 * @internal
 */
class Extent1834
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-48, 0], [-54, 0], [-54, -39.948959350586], [-48, -39.948959350586], [-48, 0],
                ],
            ],
        ];
    }
}
