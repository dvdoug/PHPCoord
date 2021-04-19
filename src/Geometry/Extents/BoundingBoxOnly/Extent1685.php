<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Pakistan - 28°N to 35°35'N.
 * @internal
 */
class Extent1685
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [77.823926705845, 35.58333333], [60.866302490235, 35.58333333], [60.866302490235, 28], [77.823926705845, 28], [77.823926705845, 35.58333333],
                ],
            ],
        ];
    }
}
