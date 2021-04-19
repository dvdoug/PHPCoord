<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Austria - west of 11°50'E.
 * @internal
 */
class Extent1706
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [11.833333333333, 47.603394808617], [9.5335693359375, 47.603394808617], [9.5335693359375, 46.771110534668], [11.833333333333, 46.771110534668], [11.833333333333, 47.603394808617],
                ],
            ],
        ];
    }
}
