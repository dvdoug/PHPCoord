<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/UAE - east of 54°E.
 * @internal
 */
class Extent1750
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [57.125489553001, 26.263764140001], [54, 26.263764140001], [54, 22.63332939148], [57.125489553001, 22.63332939148], [57.125489553001, 26.263764140001],
                ],
            ],
        ];
    }
}
