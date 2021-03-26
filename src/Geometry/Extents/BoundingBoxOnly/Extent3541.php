<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - Alberta - 118.5°W to 115.5°W.
 * @internal
 */
class Extent3541
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-115.5, 60], [-118.5, 60], [-118.5, 50.779955117982], [-115.5, 50.779955117982], [-115.5, 60],
                ],
            ],
        ];
    }
}
