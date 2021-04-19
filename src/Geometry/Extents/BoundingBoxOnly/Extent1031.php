<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Antarctic/Antarctica.
 * @internal
 */
class Extent1031
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [180, -60], [-180, -60], [-180, -90], [180, -90], [180, -60],
                ],
            ],
        ];
    }
}
