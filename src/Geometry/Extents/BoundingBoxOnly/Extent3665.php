<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - onshore - 22°E to 23°E.
 * @internal
 */
class Extent3665
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [23, 70.805023704351], [22, 70.805023704351], [22, 68.691375732422], [23, 68.691375732422], [23, 70.805023704351],
                ],
            ],
        ];
    }
}
