<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/North America - 66°W to 60°W and NAD83 by country.
 * @internal
 */
class Extent3420
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-60, 73.241062868496], [-66, 73.241062868496], [-66, 39.852678019852], [-60, 39.852678019852], [-60, 73.241062868496],
                ],
            ],
            [
                [
                    [-60, 84], [-66, 84], [-66, 80.89440188134], [-60, 80.89440188134], [-60, 84],
                ],
            ],
            [
                [
                    [-63.299536558955, 22.081935136199], [-66, 22.081935136199], [-66, 15.632166335315], [-63.299536558955, 15.632166335315], [-63.299536558955, 22.081935136199],
                ],
            ],
        ];
    }
}
