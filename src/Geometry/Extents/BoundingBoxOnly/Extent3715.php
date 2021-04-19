<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Iraq - 34.6°N to 36.2°N, 42.8°E to 45°E (map 6).
 * @internal
 */
class Extent3715
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [45, 36.23487467901], [42.775062436251, 36.23487467901], [42.775062436251, 34.592356526781], [45, 34.592356526781], [45, 36.23487467901],
                ],
            ],
        ];
    }
}
