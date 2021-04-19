<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/North America - 144°W to 138°W and NAD83 by country.
 * @internal
 */
class Extent3872
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-137.99974414177, 73.585323604668], [-144, 73.585323604668], [-144, 52.059228809204], [-137.99974414177, 52.059228809204], [-137.99974414177, 73.585323604668],
                ],
            ],
        ];
    }
}
