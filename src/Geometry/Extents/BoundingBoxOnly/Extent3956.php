<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Iraq - east of 48°E.
 * @internal
 */
class Extent3956
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [48.749148545, 30.997189026679], [48, 30.997189026679], [48, 29.609146143], [48.749148545, 29.609146143], [48.749148545, 30.997189026679],
                ],
            ],
        ];
    }
}
