<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Yemen - South Yemen - mainland west of 48°E.
 * @internal
 */
class Extent1492
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [48, 17.949596661617], [43.370927865134, 17.949596661617], [43.370927865134, 12.54647651247], [48, 12.54647651247], [48, 17.949596661617],
                ],
            ],
        ];
    }
}
