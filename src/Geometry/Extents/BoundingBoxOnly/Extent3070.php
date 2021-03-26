<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 80°S to 84°S, 60°E to 90°E (SU41-45).
 * @internal
 */
class Extent3070
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [90, -80], [60, -80], [60, -84], [90, -84], [90, -80],
                ],
            ],
        ];
    }
}
