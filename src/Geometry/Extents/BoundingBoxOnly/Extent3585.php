<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Europe - 22.5°E to 25.5°E onshore and S-42(58) by country.
 * @internal
 */
class Extent3585
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [25.5, 48.245500385548], [22.5, 48.245500385548], [22.5, 41.243049621582], [25.5, 41.243049621582], [25.5, 48.245500385548],
                ],
            ],
            [
                [
                    [24.143468856812, 54.408321380615], [22.5, 54.408321380615], [22.5, 48.973304594648], [24.143468856812, 48.973304594648], [24.143468856812, 54.408321380615],
                ],
            ],
        ];
    }
}
