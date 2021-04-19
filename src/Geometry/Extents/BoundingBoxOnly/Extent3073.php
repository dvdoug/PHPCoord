<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 80°S to 84°S, 150°E to 180° (SU56-60).
 * @internal
 */
class Extent3073
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [180, -80], [150, -80], [150, -84], [180, -84], [180, -80],
                ],
            ],
        ];
    }
}
