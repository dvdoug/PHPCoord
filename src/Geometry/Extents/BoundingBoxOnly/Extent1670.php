<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Asia - India; Pakistan - onshore 21°N to 28°N and west of 82°E.
 * @internal
 */
class Extent1670
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [82, 28], [61.591580237669, 28], [61.591580237669, 21], [82, 21], [82, 28],
                ],
            ],
        ];
    }
}
