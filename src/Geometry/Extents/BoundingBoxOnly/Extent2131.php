<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Europe - 36°E to 42°E and ETRS89 by country.
 * @internal
 */
class Extent2131
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [38, 79.064563073348], [36, 79.064563073348], [36, 72.993902051111], [38, 72.993902051111], [38, 79.064563073348],
                ],
            ],
        ];
    }
}
