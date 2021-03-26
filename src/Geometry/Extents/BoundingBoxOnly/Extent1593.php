<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/China - 108°E to 114°E onshore.
 * @internal
 */
class Extent1593
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [114, 45.100547790528], [108, 45.100547790528], [108, 20.183434404635], [114, 20.183434404635], [114, 45.100547790528],
                ],
            ],
            [
                [
                    [111.07342078149, 20.183787472482], [108.56599853959, 20.183787472482], [108.56599853959, 18.118700269992], [111.07342078149, 18.118700269992], [111.07342078149, 20.183787472482],
                ],
            ],
        ];
    }
}
