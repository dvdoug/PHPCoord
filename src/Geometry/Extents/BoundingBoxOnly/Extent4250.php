<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Africa/French Southern Territories - 66°E to 72°E.
 * @internal
 */
class Extent4250
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [72, -45.118526926], [66, -45.118526926], [66, -53.235254934], [72, -53.235254934], [72, -45.118526926],
                ],
            ],
        ];
    }
}
