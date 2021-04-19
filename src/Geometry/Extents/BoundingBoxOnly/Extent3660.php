<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - onshore - 18ºE to 19ºE.
 * @internal
 */
class Extent3660
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [19, 70.263298483637], [18, 70.263298483637], [18, 68.044711989891], [19, 68.044711989891], [19, 70.263298483637],
                ],
            ],
        ];
    }
}
