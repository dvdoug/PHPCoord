<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Iraq - 29.7 to 31.4°N, 42°E to 43.9°E (map 19).
 * @internal
 */
class Extent3706
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [43.965724855145, 31.360201796158], [42, 31.360201796158], [42, 29.755341196451], [43.965724855145, 29.755341196451], [43.965724855145, 31.360201796158],
                ],
            ],
        ];
    }
}
