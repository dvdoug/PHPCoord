<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Europe - FSU onshore 36°E to 42°E.
 * @internal
 */
class Extent1796
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [42, 66.510820152322], [36, 66.510820152322], [36, 41.430126190186], [42, 41.430126190186], [42, 66.510820152322],
                ],
            ],
            [
                [
                    [41.518899917603, 69.22199312483], [36, 69.22199312483], [36, 66.003908157349], [41.518899917603, 66.003908157349], [41.518899917603, 69.22199312483],
                ],
            ],
        ];
    }
}
