<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/Canada - Quebec and Ontario - 78°W to 75°W.
 * @internal
 */
class Extent2280
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-75, 62.642984671515], [-78, 62.642984671515], [-78, 43.633327484131], [-75, 43.633327484131], [-75, 62.642984671515],
                ],
            ],
        ];
    }
}
