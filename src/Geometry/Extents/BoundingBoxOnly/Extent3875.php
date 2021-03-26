<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - Labrador - 63°W to 60°W.
 * @internal
 */
class Extent3875
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-60, 58.551936510445], [-63, 58.551936510445], [-63, 52], [-60, 52], [-60, 58.551936510445],
                ],
            ],
            [
                [
                    [-62.750367187118, 58.919798716175], [-63, 58.919798716175], [-63, 58.50789712374], [-62.750367187118, 58.50789712374], [-62.750367187118, 58.919798716175],
                ],
            ],
        ];
    }
}
