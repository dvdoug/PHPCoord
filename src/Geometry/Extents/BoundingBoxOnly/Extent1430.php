<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - Ontario - 78°W to 75°W.
 * @internal
 */
class Extent1430
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-75, 46.249781778414], [-78, 46.249781778414], [-78, 43.633327484131], [-75, 43.633327484131], [-75, 46.249781778414],
                ],
            ],
        ];
    }
}
