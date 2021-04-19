<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - west of 24°E onshore.
 * @internal
 */
class Extent1763
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [22.866872787476, 55.313291549683], [19.575708389282, 55.313291549683], [19.575708389282, 54.325555801392], [22.866872787476, 54.325555801392], [22.866872787476, 55.313291549683],
                ],
            ],
        ];
    }
}
