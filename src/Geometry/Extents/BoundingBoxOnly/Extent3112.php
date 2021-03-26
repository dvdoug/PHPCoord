<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 84°W to 78°W, N hemisphere and PSAD56 by country.
 * @internal
 */
class Extent3112
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-78, 1.4496593475342], [-80.178207397461, 1.4496593475342], [-80.178207397461, 0], [-78, 0], [-78, 1.4496593475342],
                ],
            ],
        ];
    }
}
