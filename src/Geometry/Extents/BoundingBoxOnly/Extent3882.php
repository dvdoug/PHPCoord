<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Papua New Guinea - west of 144°E.
 * @internal
 */
class Extent3882
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [144, 2.3015508846989], [139.20114063, 2.3015508846989], [139.20114063, -11.148474895], [144, -11.148474895], [144, 2.3015508846989],
                ],
            ],
        ];
    }
}
