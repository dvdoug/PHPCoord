<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 72°W to 66°W.
 * @internal
 */
class Extent3506
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-66, 47.467891693115], [-72, 47.467891693115], [-72, 33.614374187759], [-66, 33.614374187759], [-66, 47.467891693115],
                ],
            ],
        ];
    }
}
