<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Ukraine - 24°E to 30°E.
 * @internal
 */
class Extent3898
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [30, 51.959854125977], [24, 51.959854125977], [24, 46.460959119405], [30, 46.460959119405], [30, 51.959854125977],
                ],
            ],
            [
                [
                    [30, 46.544967651367], [28.214839935303, 46.544967651367], [28.214839935303, 45.102670389447], [30, 45.102670389447], [30, 46.544967651367],
                ],
            ],
        ];
    }
}
