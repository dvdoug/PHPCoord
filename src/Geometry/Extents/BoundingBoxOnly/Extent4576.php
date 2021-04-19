<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Brazil - 54°W to 48°W and 15°S to 27°30'S.
 * @internal
 */
class Extent4576
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-48, -15], [-54, -15], [-54, -27.499952627735], [-48, -27.499952627735], [-48, -15],
                ],
            ],
        ];
    }
}
