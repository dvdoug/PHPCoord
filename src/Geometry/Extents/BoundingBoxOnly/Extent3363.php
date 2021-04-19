<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Greenland - west coast - 63°N to 66°N.
 * @internal
 */
class Extent3363
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-49.17303982598, 66], [-53.698308707676, 66], [-53.698308707676, 63], [-49.17303982598, 63], [-49.17303982598, 66],
                ],
            ],
        ];
    }
}
