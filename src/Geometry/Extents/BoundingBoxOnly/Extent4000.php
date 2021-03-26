<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Germany - onshore 10.5°E to 12°E.
 * @internal
 */
class Extent4000
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [12, 54.584508937875], [10.5, 54.584508937875], [10.5, 47.39527130127], [12, 47.39527130127], [12, 54.584508937875],
                ],
            ],
        ];
    }
}
