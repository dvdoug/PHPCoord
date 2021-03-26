<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - onshore - 20ºE to 21ºE.
 * @internal
 */
class Extent3662
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [21, 70.286164126833], [20, 70.286164126833], [20, 68.559899681773], [21, 68.559899681773], [21, 70.286164126833],
                ],
            ],
            [
                [
                    [20.204233169556, 68.529899068], [20, 68.529899068], [20, 68.376404683736], [20.204233169556, 68.376404683736], [20.204233169556, 68.529899068],
                ],
            ],
        ];
    }
}
