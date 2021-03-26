<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Germany - East Germany - 10.5°E to 13.5°E onshore.
 * @internal
 */
class Extent3997
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [13.5, 54.732431145027], [10.5, 54.732431145027], [10.5, 50.204719543457], [13.5, 50.204719543457], [13.5, 54.732431145027],
                ],
            ],
        ];
    }
}
