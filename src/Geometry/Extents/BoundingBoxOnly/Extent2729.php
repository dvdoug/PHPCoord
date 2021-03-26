<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/China - 127.5°E to 130.5°E.
 * @internal
 */
class Extent2729
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [130.5, 49.886397893967], [127.5, 49.886397893967], [127.5, 41.3717918396], [130.5, 41.3717918396], [130.5, 49.886397893967],
                ],
            ],
            [
                [
                    [127.58731079102, 50.246326152011], [127.5, 50.246326152011], [127.5, 50.062127735954], [127.58731079102, 50.062127735954], [127.58731079102, 50.246326152011],
                ],
            ],
        ];
    }
}
