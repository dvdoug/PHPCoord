<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Asia - India; Pakistan - 28°N to 35°35'N.
 * @internal
 */
class Extent1669
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [81.632060152144, 35.583], [60.866302490235, 35.583], [60.866302490235, 28], [81.632060152144, 28], [81.632060152144, 35.583],
                ],
            ],
        ];
    }
}
