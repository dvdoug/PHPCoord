<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 54°W to 48°W, S hemisphere and SIRGAS 2000 by country.
 * @internal
 */
class Extent3444
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-52.311437606811, -49.186712265015], [-54, -49.186712265015], [-54, -54.179334640503], [-52.311437606811, -54.179334640503], [-52.311437606811, -49.186712265015],
                ],
            ],
            [
                [
                    [-48, 7.0353221893311], [-54, 7.0353221893311], [-54, -39.948959350586], [-48, -39.948959350586], [-48, 7.0353221893311],
                ],
            ],
        ];
    }
}
