<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/India - onshore 15°N to 21°N.
 * @internal
 */
class Extent1672
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [87.143630363088, 21], [72.601288460155, 21], [72.601288460155, 15], [87.143630363088, 15], [87.143630363088, 21],
                ],
            ],
            [
                [
                    [71.838447017742, 21], [70.146173049933, 21], [70.146173049933, 20.64073433723], [71.838447017742, 20.64073433723], [71.838447017742, 21],
                ],
            ],
        ];
    }
}
