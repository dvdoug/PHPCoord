<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - onshore - 18°E to 24°E.
 * @internal
 */
class Extent4068
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [24, 70.912810838308], [18, 70.912810838308], [18, 68.044711989891], [24, 68.044711989891], [24, 70.912810838308],
                ],
            ],
            [
                [
                    [24.000001907349, 71.076671019081], [23.730527730775, 71.076671019081], [23.730527730775, 70.861182998268], [24.000001907349, 70.861182998268], [24.000001907349, 71.076671019081],
                ],
            ],
        ];
    }
}
