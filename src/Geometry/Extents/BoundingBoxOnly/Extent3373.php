<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 174°E to 180°E - AK, OCS.
 * @internal
 */
class Extent3373
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [180, 56.66214], [174, 56.66214], [174, 47.92956], [180, 47.92956], [180, 56.66214],
                ],
            ],
        ];
    }
}
