<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 80°S to 84°S, 30°E to 60°E (SU36-40).
 * @internal
 */
class Extent3069
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [60, -80], [30, -80], [30, -84], [60, -84], [60, -80],
                ],
            ],
        ];
    }
}
