<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/UK - Britain and UKCS 49°45'N to 61°N, 9°W to 2°E.
 * @internal
 */
class Extent4390
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [2.000000000001, 61], [-9, 61], [-9, 49.758303], [2.000000000001, 49.758303], [2.000000000001, 61],
                ],
            ],
        ];
    }
}
