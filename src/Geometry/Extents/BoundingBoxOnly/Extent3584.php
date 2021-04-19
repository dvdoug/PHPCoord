<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Europe - 19.5°E to 22.5°E onshore and S-42(83) by country.
 * @internal
 */
class Extent3584
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [22.5, 49.586097004832], [19.5, 49.586097004832], [19.5, 46.105133027499], [22.5, 46.105133027499], [22.5, 49.586097004832],
                ],
            ],
        ];
    }
}
