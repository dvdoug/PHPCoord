<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/North America - 66°W to 60°W and NAD27 by country.
 * @internal
 */
class Extent2150
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
                    [-65.922866396538, 82.963477642068], [-66, 82.963477642068], [-66, 82.882990504796], [-65.922866396538, 82.882990504796], [-65.922866396538, 82.963477642068],
                ],
            ],
            [
                [
                    [-60.725126850261, 82.955311112031], [-66, 82.955311112031], [-66, 81.571015180905], [-60.725126850261, 81.571015180905], [-60.725126850261, 82.955311112031],
                ],
            ],
            [
                [
                    [-64.127893276254, 81.593900411784], [-66, 81.593900411784], [-66, 81.1489009431], [-64.127893276254, 81.1489009431], [-64.127893276254, 81.593900411784],
                ],
            ],
        ];
    }
}