<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 172.5°W to 169.5°W onshore.
 * @internal
 */
class Extent2709
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-169.571173, 67.051554853981], [-172.5, 67.051554853981], [-172.5, 64.354798022751], [-169.571173, 64.354798022751], [-169.571173, 67.051554853981],
                ],
            ],
        ];
    }
}
