<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/China - 79.5°E to 82.5°E.
 * @internal
 */
class Extent2713
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [82.5, 45.351921081543], [79.5, 45.351921081543], [79.5, 29.957697696046], [82.5, 29.957697696046], [82.5, 45.351921081543],
                ],
            ],
            [
                [
                    [82.5, 45.877468133165], [82.314926147461, 45.877468133165], [82.314926147461, 45.47687639509], [82.5, 45.47687639509], [82.5, 45.877468133165],
                ],
            ],
        ];
    }
}
