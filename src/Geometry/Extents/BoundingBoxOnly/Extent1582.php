<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Africa/Kenya - north of equator and east of 36°E.
 * @internal
 */
class Extent1582
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [41.905166625977, 4.4826828429364], [36, 4.4826828429364], [36, 0], [41.905166625977, 0], [41.905166625977, 4.4826828429364],
                ],
            ],
        ];
    }
}
