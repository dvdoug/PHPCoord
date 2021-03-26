<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Europe - 24°E to 30°E and ETRS89 by country.
 * @internal
 */
class Extent2129
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [30.000000000001, 84.722623821813], [24, 84.722623821813], [24, 59.640422390199], [30.000000000001, 59.640422390199], [30.000000000001, 84.722623821813],
                ],
            ],
        ];
    }
}
