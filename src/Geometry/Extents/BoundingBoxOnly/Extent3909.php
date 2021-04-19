<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Ukraine - 28.5°E to 31.5°E.
 * @internal
 */
class Extent3909
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [31.5, 52.119987487793], [28.5, 52.119987487793], [28.5, 43.422918669286], [31.5, 43.422918669286], [31.5, 52.119987487793],
                ],
            ],
        ];
    }
}
