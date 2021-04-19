<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/North America - 132°W to 126°W and NAD83 by country.
 * @internal
 */
class Extent3866
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-126, 80.922905029812], [-132, 80.922905029812], [-132, 35.38079992744], [-126, 35.38079992744], [-126, 80.922905029812],
                ],
            ],
        ];
    }
}
