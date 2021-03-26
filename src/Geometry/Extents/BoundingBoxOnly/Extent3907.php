<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Ukraine - 22.5°E to 25.5°E.
 * @internal
 */
class Extent3907
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [25.5, 51.959854125977], [22.5, 51.959854125977], [22.5, 47.71314239502], [25.5, 47.71314239502], [25.5, 51.959854125977],
                ],
            ],
        ];
    }
}
