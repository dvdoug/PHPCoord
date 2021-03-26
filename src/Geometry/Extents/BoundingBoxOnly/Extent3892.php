<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Germany - offshore North Sea west of 4.5°E.
 * @internal
 */
class Extent3892
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [4.5, 55.919278225498], [3.3499994686502, 55.919278225498], [3.3499994686502, 55.249999997876], [4.5, 55.249999997876], [4.5, 55.919278225498],
                ],
            ],
        ];
    }
}
