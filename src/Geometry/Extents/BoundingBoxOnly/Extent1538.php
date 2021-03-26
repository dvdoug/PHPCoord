<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Finland - 25.5°E to 28.5°E onshore.
 * @internal
 */
class Extent1538
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [28.5, 70.088607788086], [25.5, 70.088607788086], [25.5, 60.183839770471], [28.5, 60.183839770471], [28.5, 70.088607788086],
                ],
            ],
        ];
    }
}
