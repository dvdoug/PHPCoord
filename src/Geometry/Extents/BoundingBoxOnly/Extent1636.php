<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Europe - 12°E to 18°E and ED50 by country.
 * @internal
 */
class Extent1636
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [18, 47.094581604004], [12, 47.094581604004], [12, 34.498055148], [18, 34.498055148], [18, 47.094581604004],
                ],
            ],
            [
                [
                    [16.508249515, 55.691500168001], [13.992835514695, 55.691500168001], [13.992835514695, 54.536222214278], [16.508249515, 54.536222214278], [16.508249515, 55.691500168001],
                ],
            ],
            [
                [
                    [13.147958575, 56.694789035937], [12, 56.694789035937], [12, 54.382168862945], [13.147958575, 54.382168862945], [13.147958575, 56.694789035937],
                ],
            ],
            [
                [
                    [12.856109619141, 63.209537070997], [12, 63.209537070997], [12, 59.88582611084], [12.856109619141, 59.88582611084], [12.856109619141, 63.209537070997],
                ],
            ],
            [
                [
                    [18, 84.412145286932], [12, 84.412145286932], [12, 63.324785095533], [18, 63.324785095533], [18, 84.412145286932],
                ],
            ],
        ];
    }
}