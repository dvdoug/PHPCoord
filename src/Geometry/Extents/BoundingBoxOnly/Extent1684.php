<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/India - east of 96°E.
 * @internal
 */
class Extent1684
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [97.415161132813, 29.463344573975], [96, 29.463344573975], [96, 27.101289749146], [97.415161132813, 27.101289749146], [97.415161132813, 29.463344573975],
                ],
            ],
        ];
    }
}
