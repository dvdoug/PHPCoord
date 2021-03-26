<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/North America - 120°W to 114°W and NAD83 by country.
 * @internal
 */
class Extent3404
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-114, 83.491072941219], [-120, 83.491072941219], [-120, 30.880069938347], [-114, 30.880069938347], [-114, 83.491072941219],
                ],
            ],
        ];
    }
}
