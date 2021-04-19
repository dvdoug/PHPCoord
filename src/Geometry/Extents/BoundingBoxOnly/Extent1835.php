<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * South America/South America - 48°W to 42°W.
 * @internal
 */
class Extent1835
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-42, 0], [-48, 0], [-48, -33.491727828979], [-42, -33.491727828979], [-42, 0],
                ],
            ],
        ];
    }
}
