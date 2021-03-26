<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Kuwait - west of 48°E onshore.
 * @internal
 */
class Extent1739
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [48, 30.084159851074], [46.546943664551, 30.084159851074], [46.546943664551, 28.538883209229], [48, 28.538883209229], [48, 30.084159851074],
                ],
            ],
        ];
    }
}
