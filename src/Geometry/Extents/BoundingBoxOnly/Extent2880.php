<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - Australian sector north of 80°S.
 * @internal
 */
class Extent2880
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [136, -60], [45, -60], [45, -80], [136, -80], [136, -60],
                ],
            ],
            [
                [
                    [160, -60], [142, -60], [142, -80], [160, -80], [160, -60],
                ],
            ],
        ];
    }
}
