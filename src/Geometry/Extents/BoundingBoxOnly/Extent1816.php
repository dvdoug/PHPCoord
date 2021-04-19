<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 54°W to 48°W, S hemisphere and SAD69 by country.
 * @internal
 */
class Extent1816
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-48, 7.0353221893311], [-54, 7.0353221893311], [-54, -35.708560916853], [-48, -35.708560916853], [-48, 7.0353221893311],
                ],
            ],
        ];
    }
}
