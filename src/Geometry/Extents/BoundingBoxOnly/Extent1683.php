<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/India - mainland 90°E to 96°E.
 * @internal
 */
class Extent1683
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [96, 29.411635103922], [90, 29.411635103922], [90, 21.946229934692], [96, 21.946229934692], [96, 29.411635103922],
                ],
            ],
        ];
    }
}
