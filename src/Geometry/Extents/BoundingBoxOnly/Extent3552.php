<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/France - mainland - 48°N to 50°N.
 * @internal
 */
class Extent3552
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [8.2260780334473, 50], [-4.8653622509834, 50], [-4.8653622509834, 48], [8.2260780334473, 48], [8.2260780334473, 50],
                ],
            ],
        ];
    }
}
