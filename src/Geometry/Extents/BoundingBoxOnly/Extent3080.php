<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica - 88°S to 90°S, 180°W to 180°E (SW01-60).
 * @internal
 */
class Extent3080
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [180, -88], [-180, -88], [-180, -90], [180, -90], [180, -88],
                ],
            ],
        ];
    }
}
