<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Greenland - east coast - 69°N to 72°N.
 * @internal
 */
class Extent3370
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-21.326383634051, 72], [-29.681582252457, 72], [-29.681582252457, 69], [-21.326383634051, 69], [-21.326383634051, 72],
                ],
            ],
        ];
    }
}
