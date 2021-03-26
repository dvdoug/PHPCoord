<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - Ontario - 88.5°W to 85.5°W.
 * @internal
 */
class Extent1435
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-85.5, 56.696581269621], [-88.5, 56.696581269621], [-88.5, 47.17202871001], [-85.5, 47.17202871001], [-85.5, 56.696581269621],
                ],
            ],
        ];
    }
}
