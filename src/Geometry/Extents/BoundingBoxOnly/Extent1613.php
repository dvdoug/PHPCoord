<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Argentina - 58.5°W to 55.5°W onshore.
 * @internal
 */
class Extent1613
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-55.5, -27.066194534302], [-58.5, -27.066194534302], [-58.5, -38.587524414062], [-55.5, -38.587524414062], [-55.5, -27.066194534302],
                ],
            ],
            [
                [
                    [-57.553894042969, -24.843534469604], [-58.5, -24.843534469604], [-58.5, -27.023559570312], [-57.553894042969, -27.023559570312], [-57.553894042969, -24.843534469604],
                ],
            ],
        ];
    }
}
