<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Europe - 18°W to 12°W and ED50 by country.
 * @internal
 */
class Extent1631
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-12, 56.563342167973], [-16.096100515106, 56.563342167973], [-16.096100515106, 48.435891570402], [-12, 48.435891570402], [-12, 56.563342167973],
                ],
            ],
        ];
    }
}
