<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/North America - 102°W to 96°W and NAD83 by country.
 * @internal
 */
class Extent3407
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-96, 84], [-102, 84], [-102, 25.839859008738], [-96, 25.839859008738], [-96, 84],
                ],
            ],
        ];
    }
}
