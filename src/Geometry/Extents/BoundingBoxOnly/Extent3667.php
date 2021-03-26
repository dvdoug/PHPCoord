<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - onshore - 23ºE to 24ºE.
 * @internal
 */
class Extent3667
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [24, 71.076671019081], [23.730527730775, 71.076671019081], [23.730527730775, 70.860865236018], [24, 70.860865236018], [24, 71.076671019081],
                ],
            ],
            [
                [
                    [24, 70.912810838308], [23, 70.912810838308], [23, 68.629852294922], [24, 68.629852294922], [24, 70.912810838308],
                ],
            ],
        ];
    }
}
