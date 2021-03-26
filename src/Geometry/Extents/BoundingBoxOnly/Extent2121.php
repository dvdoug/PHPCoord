<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Guatemala - south of 15°51'30"N.
 * @internal
 */
class Extent2121
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-88.196707177284, 15.858333], [-92.285793526611, 15.858333], [-92.285793526611, 13.69651534565], [-88.196707177284, 13.69651534565], [-88.196707177284, 15.858333],
                ],
            ],
        ];
    }
}
