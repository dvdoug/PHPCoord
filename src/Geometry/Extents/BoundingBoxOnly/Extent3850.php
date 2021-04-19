<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Honduras - onshore south of 14°38'30"N.
 * @internal
 */
class Extent3850
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-85.01892852753, 14.641667], [-89.350494384608, 14.641667], [-89.350494384608, 12.985172271483], [-85.01892852753, 12.985172271483], [-85.01892852753, 14.641667],
                ],
            ],
            [
                [
                    [-84.400786233466, 14.641667], [-84.560392948913, 14.641667], [-84.560392948913, 14.618818282938], [-84.400786233466, 14.618818282938], [-84.400786233466, 14.641667],
                ],
            ],
        ];
    }
}
