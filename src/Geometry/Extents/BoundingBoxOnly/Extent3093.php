<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Finland - 19.5°E to 20.5°E onshore.
 * @internal
 */
class Extent3093
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [20.5, 60.470784890687], [19.5, 60.470784890687], [19.5, 59.92859979148], [20.5, 59.92859979148], [20.5, 60.470784890687],
                ],
            ],
        ];
    }
}
