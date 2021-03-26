<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Africa/Angola - offshore blocks 7 8 24 + WGC spec.
 * @internal
 */
class Extent2320
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [13.853610992432, -6.0106854964942], [8.2018785080005, -6.0106854964942], [8.2018785080005, -17.254833218282], [13.853610992432, -17.254833218282], [13.853610992432, -6.0106854964942],
                ],
            ],
        ];
    }
}
