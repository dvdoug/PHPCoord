<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 66°W to 60°W, N hemisphere and PSAD56 by country.
 * @internal
 */
class Extent1760
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-60, 4.8845005035401], [-60.152229309082, 4.8845005035401], [-60.152229309082, 4.4940280914307], [-60, 4.4940280914307], [-60, 4.8845005035401],
                ],
            ],
            [
                [
                    [-60, 10.797822952271], [-66, 10.797822952271], [-66, 0.64916801452642], [-60, 0.64916801452642], [-60, 10.797822952271],
                ],
            ],
            [
                [
                    [-65.152025222778, 11.02610206604], [-65.463703155518, 11.02610206604], [-65.463703155518, 10.830316543579], [-65.152025222778, 10.830316543579], [-65.152025222778, 11.02610206604],
                ],
            ],
            [
                [
                    [-63.757154464722, 11.225671768189], [-64.453262329102, 11.225671768189], [-64.453262329102, 10.807168960571], [-63.757154464722, 10.807168960571], [-63.757154464722, 11.225671768189],
                ],
            ],
        ];
    }
}