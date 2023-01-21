<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - onshore - 18°E to 19°E.
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
                    [19.00000126171, 70.286068092373], [18, 70.286068092373], [18, 68.044711989891], [19.00000126171, 68.044711989891], [19.00000126171, 70.286068092373],
                ],
            ],
        ];
    }
}
