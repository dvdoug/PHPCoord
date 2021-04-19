<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Latin America - 90°W to 84°W; N hemisphere and SIRGAS 2000 by country.
 * @internal
 */
class Extent3428
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-84, 0.31421470642096], [-84.146776199341, 0.31421470642096], [-84.146776199341, 0], [-84, 0], [-84, 0.31421470642096],
                ],
            ],
            [
                [
                    [-84, 25.761865615845], [-90, 25.761865615845], [-90, 0], [-84, 0], [-84, 25.761865615845],
                ],
            ],
        ];
    }
}
