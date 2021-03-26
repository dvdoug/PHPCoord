<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Asia - Middle East - Iraq; Israel; Jordan; Lebanon; Kuwait; Saudi Arabia; Syria.
 * @internal
 */
class Extent2345
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [42.230400839993, 17.059273107938], [41.70150802722, 17.059273107938], [41.70150802722, 16.514366208706], [42.230400839993, 16.514366208706], [42.230400839993, 17.059273107938],
                ],
            ],
            [
                [
                    [55.666107177735, 37.383674621582], [34.175099445817, 37.383674621582], [34.175099445817, 16.377502441406], [55.666107177735, 16.377502441406], [55.666107177735, 37.383674621582],
                ],
            ],
        ];
    }
}
