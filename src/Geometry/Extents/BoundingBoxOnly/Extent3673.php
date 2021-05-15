<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - onshore - 28°E to 29°E.
 * @internal
 */
class Extent3673
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [29, 71.129636113919], [28, 71.129636113919], [28, 69.721627181629], [29, 69.721627181629], [29, 71.129636113919],
                ],
            ],
            [
                [
                    [29, 69.316759222095], [28.782915115357, 69.316759222095], [28.782915115357, 69.036891960933], [29, 69.036891960933], [29, 69.316759222095],
                ],
            ],
        ];
    }
}
