<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Iraq - 29.7°N to 31.4°N, 43.9°E to 46.1°E (map 20).
 * @internal
 */
class Extent3708
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [46.051438457888, 31.364510533147], [43.948561542112, 31.364510533147], [43.948561542112, 29.736178431041], [46.051438457888, 29.736178431041], [46.051438457888, 31.364510533147],
                ],
            ],
        ];
    }
}
