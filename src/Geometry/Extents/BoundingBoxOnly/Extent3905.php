<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Ukraine - east of 36°E.
 * @internal
 */
class Extent3905
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [40.178745269775, 50.439155578613], [36, 50.439155578613], [36, 43.434496156004], [40.178745269775, 43.434496156004], [40.178745269775, 50.439155578613],
                ],
            ],
        ];
    }
}
