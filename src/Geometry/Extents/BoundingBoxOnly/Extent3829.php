<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Chile - 78°W to 72°W.
 * @internal
 */
class Extent3829
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-76.133626937866, -23.474910736084], [-78, -23.474910736084], [-78, -29.247711181641], [-76.133626937866, -29.247711181641], [-76.133626937866, -23.474910736084],
                ],
            ],
            [
                [
                    [-72, -18.35037612915], [-78, -18.35037612915], [-78, -59.354999542236], [-72, -59.354999542236], [-72, -18.35037612915],
                ],
            ],
        ];
    }
}
