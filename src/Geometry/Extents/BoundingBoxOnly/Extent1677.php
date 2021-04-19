<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/India - onshore 21°N to 28°N and west of 82°E.
 * @internal
 */
class Extent1677
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [82, 28], [68.136841438671, 28], [68.136841438671, 21], [82, 21], [82, 28],
                ],
            ],
        ];
    }
}
