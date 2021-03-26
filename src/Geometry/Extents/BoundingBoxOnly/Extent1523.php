<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Europe-FSU/Poland - east of 22.5°E.
 * @internal
 */
class Extent1523
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [24.143468856812, 54.408321380615], [22.5, 54.408321380615], [22.5, 49.002914428711], [24.143468856812, 49.002914428711], [24.143468856812, 54.408321380615],
                ],
            ],
        ];
    }
}
