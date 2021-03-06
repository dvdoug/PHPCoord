<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - New England - south (CT, MA, NH, RI, VT).
 * @internal
 */
class Extent2378
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-71.534226031553, 41.244524866935], [-71.625121441976, 41.244524866935], [-71.625121441976, 41.136497337271], [-71.534226031553, 41.136497337271], [-71.534226031553, 41.244524866935],
                ],
            ],
            [
                [
                    [-69.89352607727, 41.433023452759], [-70.298570632934, 41.433023452759], [-70.298570632934, 41.197793960571], [-69.89352607727, 41.197793960571], [-69.89352607727, 41.433023452759],
                ],
            ],
            [
                [
                    [-69.860315322876, 45.303743362427], [-73.725237656697, 45.303743362427], [-73.725237656697, 40.98738452844], [-69.860315322876, 40.98738452844], [-69.860315322876, 45.303743362427],
                ],
            ],
        ];
    }
}
