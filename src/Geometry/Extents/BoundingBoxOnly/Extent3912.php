<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Ukraine - 34.5°E to 37.5°E.
 * @internal
 */
class Extent3912
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [37.5, 51.243987588822], [34.5, 51.243987588822], [34.5, 43.241987177962], [37.5, 43.241987177962], [37.5, 51.243987588822],
                ],
            ],
        ];
    }
}
