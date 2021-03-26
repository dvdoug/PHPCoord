<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Latin America - 84°W to 78°West; N hemisphere and SIRGAS by country.
 * @internal
 */
class Extent3421
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-78, 19.535837173462], [-84, 19.535837173462], [-84, 0], [-78, 0], [-78, 19.535837173462],
                ],
            ],
        ];
    }
}
