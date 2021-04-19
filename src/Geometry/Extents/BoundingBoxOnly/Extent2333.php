<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Norway - offshore 62°N to 65°N and west of 5°E.
 * @internal
 */
class Extent2333
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [5, 65], [-0.48876349999983, 65], [-0.48876349999983, 62], [5, 62], [5, 65],
                ],
            ],
        ];
    }
}
