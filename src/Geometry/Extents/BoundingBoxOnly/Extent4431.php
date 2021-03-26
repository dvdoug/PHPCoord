<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Ukraine - 31°E to 34°E onshore.
 * @internal
 */
class Extent4431
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [34, 52.378601074219], [31, 52.378601074219], [31, 44.329493709157], [34, 44.329493709157], [34, 52.378601074219],
                ],
            ],
        ];
    }
}
