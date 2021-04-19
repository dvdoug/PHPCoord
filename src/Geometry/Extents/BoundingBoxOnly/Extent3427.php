<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Latin America - 96°W to 90°W; N hemisphere and SIRGAS 2000 by country.
 * @internal
 */
class Extent3427
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-90, 7.1934185028076], [-95.345743179321, 7.1934185028076], [-95.345743179321, 0], [-90, 0], [-90, 7.1934185028076],
                ],
            ],
            [
                [
                    [-90, 26.008417129517], [-96, 26.008417129517], [-96, 10.129552841187], [-90, 10.129552841187], [-90, 26.008417129517],
                ],
            ],
        ];
    }
}
