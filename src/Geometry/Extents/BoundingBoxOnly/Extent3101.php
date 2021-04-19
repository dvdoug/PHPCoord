<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Finland - 27.5°E to 28.5°E onshore.
 * @internal
 */
class Extent3101
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [28.5, 70.088607788086], [27.5, 70.088607788086], [27.5, 60.428585580251], [28.5, 60.428585580251], [28.5, 70.088607788086],
                ],
            ],
        ];
    }
}
