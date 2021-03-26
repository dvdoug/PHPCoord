<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - Alberta - west of 118.5°W.
 * @internal
 */
class Extent3540
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-118.5, 60], [-120, 60], [-120, 52.884357452393], [-118.5, 52.884357452393], [-118.5, 60],
                ],
            ],
        ];
    }
}
