<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 80°S to 84°S, 120°E to 150°E (SU51-55).
 * @internal
 */
class Extent3072
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [150, -80], [120, -80], [120, -84], [150, -84], [150, -80],
                ],
            ],
        ];
    }
}
