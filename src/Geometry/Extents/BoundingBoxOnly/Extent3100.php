<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Finland - 26.5°E to 27.5°E onshore.
 * @internal
 */
class Extent3100
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [27.5, 70.042890836885], [26.5, 70.042890836885], [26.5, 60.364121259106], [27.5, 60.364121259106], [27.5, 70.042890836885],
                ],
            ],
        ];
    }
}
