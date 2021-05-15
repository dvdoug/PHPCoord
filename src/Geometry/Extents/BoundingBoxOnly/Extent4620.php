<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/UK - Tweedmouth to Aberdeen.
 * @internal
 */
class Extent4620
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-1.95, 57.2], [-3.55, 57.2], [-3.55, 55.55], [-1.95, 55.55], [-1.95, 57.2],
                ],
            ],
        ];
    }
}
