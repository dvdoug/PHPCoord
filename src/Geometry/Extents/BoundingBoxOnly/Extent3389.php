<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Iraq - east of 48°E onshore.
 * @internal
 */
class Extent3389
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [48.608537698861, 30.997189026679], [48, 30.997189026679], [48, 29.877218367148], [48.608537698861, 29.877218367148], [48.608537698861, 30.997189026679],
                ],
            ],
        ];
    }
}
