<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Turkey - east of 43.5°E.
 * @internal
 */
class Extent1530
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [44.820545196533, 41.017642773315], [43.5, 41.017642773315], [43.5, 36.971237182617], [44.820545196533, 36.971237182617], [44.820545196533, 41.017642773315],
                ],
            ],
        ];
    }
}
