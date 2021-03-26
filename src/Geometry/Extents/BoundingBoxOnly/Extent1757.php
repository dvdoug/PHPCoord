<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 78°W to 72°W, S hemisphere and PSAD56 by country.
 * @internal
 */
class Extent1757
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-71.993759155273, -34.015771865845], [-74.473331451416, -34.015771865845], [-74.473331451416, -43.5], [-71.993759155273, -43.5], [-71.993759155273, -34.015771865845],
                ],
            ],
            [
                [
                    [-72, 0], [-78, 0], [-78, -17.101764678955], [-72, -17.101764678955], [-72, 0],
                ],
            ],
        ];
    }
}
