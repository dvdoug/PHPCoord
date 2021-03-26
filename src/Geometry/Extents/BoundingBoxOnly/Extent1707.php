<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Austria - 11°50'E to 14°50'E.
 * @internal
 */
class Extent1707
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [14.833333333333, 48.785557074294], [11.833333333333, 48.785557074294], [11.833333333333, 46.407493591309], [14.833333333333, 46.407493591309], [14.833333333333, 48.785557074294],
                ],
            ],
        ];
    }
}
