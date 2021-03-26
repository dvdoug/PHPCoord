<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Iraq - 33°N to 34.6°N, 43.9°E to 46.1°E (map 11).
 * @internal
 */
class Extent3725
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [46.199016571046, 34.611849263596], [43.90934239097, 34.611849263596], [43.90934239097, 32.983521744479], [46.199016571046, 32.983521744479], [46.199016571046, 34.611849263596],
                ],
            ],
        ];
    }
}
