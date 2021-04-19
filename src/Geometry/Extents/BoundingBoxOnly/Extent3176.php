<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Brazil - 54°W to 48°W and south of 15°S.
 * @internal
 */
class Extent3176
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-48, -15], [-54, -15], [-54, -33.779504776001], [-48, -33.779504776001], [-48, -15],
                ],
            ],
        ];
    }
}
