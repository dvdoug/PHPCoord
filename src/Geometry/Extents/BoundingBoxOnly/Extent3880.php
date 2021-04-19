<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - Labrador - west of 66°W.
 * @internal
 */
class Extent3880
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-66, 55.334693908691], [-67.804527282715, 55.334693908691], [-67.804527282715, 52.058405883994], [-66, 52.058405883994], [-66, 55.334693908691],
                ],
            ],
        ];
    }
}
