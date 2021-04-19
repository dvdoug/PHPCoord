<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Ukraine - 30°E to 36°E.
 * @internal
 */
class Extent3903
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [36, 52.378601074219], [30, 52.378601074219], [30, 43.188055156001], [36, 43.188055156001], [36, 52.378601074219],
                ],
            ],
        ];
    }
}
