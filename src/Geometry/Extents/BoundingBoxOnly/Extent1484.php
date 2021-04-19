<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/Argentina - 42.5°S to 50.3°S and 70.5°W to 67.5°W.
 * @internal
 */
class Extent1484
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-67.5, -42.498651188945], [-70.5, -42.498651188945], [-70.5, -50.333332349748], [-67.5, -50.333332349748], [-67.5, -42.498651188945],
                ],
            ],
        ];
    }
}
