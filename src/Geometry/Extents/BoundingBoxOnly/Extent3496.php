<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * North America/USA - 132°W to 126°W.
 * @internal
 */
class Extent3496
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [-129.99365234375, 56.836415470762], [-132, 56.836415470762], [-132, 54.381558079887], [-129.99365234375, 54.381558079887], [-129.99365234375, 56.836415470762],
                ],
            ],
            [
                [
                    [-126, 48.136872450614], [-129.16350562, 48.136872450614], [-129.16350562, 35.38079992744], [-126, 35.38079992744], [-126, 48.136872450614],
                ],
            ],
        ];
    }
}
