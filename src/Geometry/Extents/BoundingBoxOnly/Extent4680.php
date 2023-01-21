<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/UK - Oxford to Worcester.
 * @internal
 */
class Extent4680
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-1.15, 52.25], [-2.3, 52.25], [-2.3, 51.65], [-1.15, 51.65], [-1.15, 52.25],
                ],
            ],
        ];
    }
}
