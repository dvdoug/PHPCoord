<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/France - mainland south of 43°N and Corsica.
 * @internal
 */
class Extent3545
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [9.6293959027848, 43.060430409677], [8.503435748653, 43.060430409677], [8.503435748653, 41.314903831524], [9.6293959027848, 41.314903831524], [9.6293959027848, 43.060430409677],
                ],
            ],
            [
                [
                    [3.2402216289603, 43], [-1.0560829534005, 43], [-1.0560829534005, 42.332912445068], [3.2402216289603, 42.332912445068], [3.2402216289603, 43],
                ],
            ],
        ];
    }
}
