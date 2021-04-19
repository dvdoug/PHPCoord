<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - zone VI.
 * @internal
 */
class Extent1859
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [136.988053, 34.551388], [136.97583, 34.551388], [136.97583, 34.538613], [136.988053, 34.538613], [136.988053, 34.551388],
                ],
            ],
            [
                [
                    [136.98189657427, 36.320677295694], [134.867311, 36.320677295694], [134.867311, 33.405519516154], [136.98189657427, 33.405519516154], [136.98189657427, 36.320677295694],
                ],
            ],
        ];
    }
}
