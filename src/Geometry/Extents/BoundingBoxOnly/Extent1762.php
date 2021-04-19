<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 60°W to 54°W, N hemisphere and PSAD56 by country.
 * @internal
 */
class Extent1762
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-56.470672607422, 8.570348739624], [-60, 8.570348739624], [-60, 1.1868762969971], [-56.470672607422, 1.1868762969971], [-56.470672607422, 8.570348739624],
                ],
            ],
        ];
    }
}
