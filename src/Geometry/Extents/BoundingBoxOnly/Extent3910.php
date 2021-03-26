<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Ukraine - 31.5°E to 34.5°E.
 * @internal
 */
class Extent3910
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [34.5, 52.378601074219], [31.5, 52.378601074219], [31.5, 43.188055156001], [34.5, 43.188055156001], [34.5, 52.378601074219],
                ],
            ],
        ];
    }
}
