<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 168°E to 174°E onshore.
 * @internal
 */
class Extent1788
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [168.19739341736, 54.651762865071], [168, 54.651762865071], [168, 54.452356338501], [168.19739341736, 54.452356338501], [168.19739341736, 54.651762865071],
                ],
            ],
            [
                [
                    [174, 70.180543899536], [168, 70.180543899536], [168, 59.863718032837], [174, 59.863718032837], [174, 70.180543899536],
                ],
            ],
        ];
    }
}
