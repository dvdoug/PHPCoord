<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Asia - Brunei and East Malaysia - 108°E to 114°E.
 * @internal
 */
class Extent1852
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [114, 7.3625241230005], [109.315949602, 7.3625241230005], [109.315949602, 0.85277760028885], [114, 0.85277760028885], [114, 7.3625241230005],
                ],
            ],
        ];
    }
}
