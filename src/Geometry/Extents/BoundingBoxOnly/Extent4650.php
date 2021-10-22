<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Ukraine - Kyiv city and oblast.
 * @internal
 */
class Extent4650
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [32.159176, 51.534181995], [29.268715, 51.534181995], [29.268715, 49.177311], [32.159176, 49.177311], [32.159176, 51.534181995],
                ],
            ],
            [
                [
                    [30.784047, 51.552241], [30.646811, 51.552241], [30.646811, 51.510058], [30.784047, 51.510058], [30.784047, 51.552241],
                ],
            ],
        ];
    }
}
