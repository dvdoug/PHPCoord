<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - onshore - 13°E to 14°E.
 * @internal
 */
class Extent3654
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [14, 67.5084215526], [13, 67.5084215526], [13, 64.015548706055], [14, 64.015548706055], [14, 67.5084215526],
                ],
            ],
            [
                [
                    [14, 68.398024609318], [13, 68.398024609318], [13, 67.800089281372], [14, 67.800089281372], [14, 68.398024609318],
                ],
            ],
        ];
    }
}
