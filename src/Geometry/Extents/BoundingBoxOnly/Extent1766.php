<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 36°E to 42°E onshore.
 * @internal
 */
class Extent1766
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [42, 66.510820152323], [36, 66.510820152323], [36, 43.189926846241], [42, 43.189926846241], [42, 66.510820152323],
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
