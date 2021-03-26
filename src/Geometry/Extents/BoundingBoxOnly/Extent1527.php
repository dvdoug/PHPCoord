<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Turkey - 34.5°E to 37.5°E onshore.
 * @internal
 */
class Extent1527
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [37.5, 42.141587394161], [34.5, 42.141587394161], [34.5, 35.81844329834], [37.5, 35.81844329834], [37.5, 42.141587394161],
                ],
            ],
        ];
    }
}
