<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 80°S to 84°S, 0°E to 30°E (SU31-35).
 * @internal
 */
class Extent3068
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [30, -80], [0, -80], [0, -84], [30, -84], [30, -80],
                ],
            ],
        ];
    }
}
