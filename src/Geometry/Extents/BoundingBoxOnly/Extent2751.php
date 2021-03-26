<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Russia - 31.5°E to 34.5°E onshore.
 * @internal
 */
class Extent2751
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [34.5, 70.01092338562], [31.5, 70.01092338562], [31.5, 51.243989898353], [34.5, 51.243989898353], [34.5, 70.01092338562],
                ],
            ],
        ];
    }
}
