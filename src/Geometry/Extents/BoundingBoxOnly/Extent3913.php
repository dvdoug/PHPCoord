<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Ukraine - east of 37.5°E.
 * @internal
 */
class Extent3913
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [40.178745269775, 50.385009832215], [37.5, 50.385009832215], [37.5, 46.777372048368], [40.178745269775, 46.777372048368], [40.178745269775, 50.385009832215],
                ],
            ],
        ];
    }
}
