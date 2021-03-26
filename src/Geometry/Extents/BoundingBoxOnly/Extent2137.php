<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/North America - 144°W to 138°W and NAD27 by country.
 * @internal
 */
class Extent2137
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-138, 73.585323604668], [-144, 73.585323604668], [-144, 53.474233627319], [-138, 53.474233627319], [-138, 73.585323604668],
                ],
            ],
        ];
    }
}
