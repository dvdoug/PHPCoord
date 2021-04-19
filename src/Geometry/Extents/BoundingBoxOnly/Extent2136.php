<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 150°W to 144°W - AK, OCS.
 * @internal
 */
class Extent2136
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-144, 74.120021534526], [-150, 74.120021534526], [-150, 54.05721190029], [-144, 54.05721190029], [-144, 74.120021534526],
                ],
            ],
        ];
    }
}
