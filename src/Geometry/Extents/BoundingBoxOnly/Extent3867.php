<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/North America - 138°W to 132°W and NAD83 by country.
 * @internal
 */
class Extent3867
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-132, 79.41717084388], [-138, 79.41717084388], [-138, 48.065621604762], [-132, 48.065621604762], [-132, 79.41717084388],
                ],
            ],
        ];
    }
}
