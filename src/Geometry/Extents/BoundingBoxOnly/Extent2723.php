<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/China - 109.5°E to 112.5°E onshore.
 * @internal
 */
class Extent2723
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [111.07342078149, 20.183787472482], [109.5, 20.183787472482], [109.5, 18.118700269992], [111.07342078149, 18.118700269992], [111.07342078149, 20.183787472482],
                ],
            ],
            [
                [
                    [112.5, 45.100547790528], [109.5, 45.100547790528], [109.5, 20.183434404635], [112.5, 20.183434404635], [112.5, 45.100547790528],
                ],
            ],
        ];
    }
}
