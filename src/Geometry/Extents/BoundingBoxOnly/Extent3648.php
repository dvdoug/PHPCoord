<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - onshore - 8°E to 9°E.
 * @internal
 */
class Extent3648
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [9, 64.093478160454], [8, 64.093478160454], [8, 58.007094440541], [9, 58.007094440541], [9, 64.093478160454],
                ],
            ],
        ];
    }
}
