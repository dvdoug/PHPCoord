<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - onshore - west of 6°E.
 * @internal
 */
class Extent3636
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [6, 62.481513694436], [4.6869756196883, 62.481513694436], [4.6869756196883, 59.092965821231], [6, 59.092965821231], [6, 62.481513694436],
                ],
            ],
            [
                [
                    [6, 59.241766865833], [5.3646918010126, 59.241766865833], [5.3646918010126, 58.325353631934], [6, 58.325353631934], [6, 59.241766865833],
                ],
            ],
        ];
    }
}
