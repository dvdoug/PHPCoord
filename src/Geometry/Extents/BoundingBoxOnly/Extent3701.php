<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Iraq - 34.6°N to 36.2°N, west of 42.8°E (map 5).
 * @internal
 */
class Extent3701
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [42.819208449623, 36.214184639548], [41.091927181313, 36.214184639548], [41.091927181313, 34.573951798444], [42.819208449623, 34.573951798444], [42.819208449623, 36.214184639548],
                ],
            ],
        ];
    }
}
