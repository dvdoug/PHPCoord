<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Greenland - east - 72°N to 75°N.
 * @internal
 */
class Extent2559
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-18.115729186054, 75], [-38, 75], [-38, 72], [-18.115729186054, 72], [-18.115729186054, 75],
                ],
            ],
            [
                [
                    [-17.214211881199, 75], [-19.100311246695, 75], [-19.100311246695, 74.886987908143], [-17.214211881199, 74.886987908143], [-17.214211881199, 75],
                ],
            ],
        ];
    }
}
