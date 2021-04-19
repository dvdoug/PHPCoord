<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Finland - west of 19.5°E onshore nominal.
 * @internal
 */
class Extent3595
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [19.5, 60.339161470003], [19.242808015033, 60.339161470003], [19.242808015033, 60.082651200054], [19.5, 60.082651200054], [19.5, 60.339161470003],
                ],
            ],
        ];
    }
}
