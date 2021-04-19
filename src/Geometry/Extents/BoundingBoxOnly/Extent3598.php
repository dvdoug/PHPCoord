<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Finland - 21.5°E to 22.5°E onshore nominal.
 * @internal
 */
class Extent3598
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [22.5, 69.305571254735], [21.5, 69.305571254735], [21.5, 68.440132141113], [22.5, 68.440132141113], [22.5, 69.305571254735],
                ],
            ],
            [
                [
                    [22.5, 63.725146841924], [21.5, 63.725146841924], [21.5, 59.766151694915], [22.5, 59.766151694915], [22.5, 63.725146841924],
                ],
            ],
        ];
    }
}
