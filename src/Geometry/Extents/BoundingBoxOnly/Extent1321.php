<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Europe - Austria and former Yugoslavia onshore.
 * @internal
 */
class Extent1321
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [16.320198358786, 43.132538953472], [15.982471428516, 43.132538953472], [15.982471428516, 42.959957058017], [16.320198358786, 42.959957058017], [16.320198358786, 43.132538953472],
                ],
            ],
            [
                [
                    [15.294207758193, 44.222600200686], [14.784835001336, 44.222600200686], [14.784835001336, 43.821070185406], [15.294207758193, 43.821070185406], [15.294207758193, 44.222600200686],
                ],
            ],
            [
                [
                    [23.030969619751, 49.018745422363], [9.5335693359376, 49.018745422363], [9.5335693359376, 40.855888366699], [23.030969619751, 40.855888366699], [23.030969619751, 49.018745422363],
                ],
            ],
        ];
    }
}