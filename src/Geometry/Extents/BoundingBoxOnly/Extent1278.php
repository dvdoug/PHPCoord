<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - Australian sector.
 * @internal
 */
class Extent1278
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [136, -60], [45, -60], [45, -90], [136, -90], [136, -60],
                ],
            ],
            [
                [
                    [160, -60], [142, -60], [142, -90], [160, -90], [160, -60],
                ],
            ],
        ];
    }
}
