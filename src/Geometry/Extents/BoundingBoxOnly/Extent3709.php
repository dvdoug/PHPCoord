<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Iraq - 31.4°N to 33°N, 42°E to 43.9°E (map 15).
 * @internal
 */
class Extent3709
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [43.948561542112, 32.983804431108], [42, 32.983804431108], [42, 31.328894873152], [43.948561542112, 31.328894873152], [43.948561542112, 32.983804431108],
                ],
            ],
        ];
    }
}
