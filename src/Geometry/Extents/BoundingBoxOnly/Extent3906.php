<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Ukraine - west of 22.5°E.
 * @internal
 */
class Extent3906
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [22.5, 48.973304594648], [22.151441574097, 48.973304594648], [22.151441574097, 48.243606567383], [22.5, 48.243606567383], [22.5, 48.973304594648],
                ],
            ],
        ];
    }
}
