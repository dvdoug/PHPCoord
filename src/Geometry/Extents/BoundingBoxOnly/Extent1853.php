<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Asia - Brunei and East Malaysia - 114°E to 120°E.
 * @internal
 */
class Extent1853
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [119.606977611, 7.6624381230005], [114, 7.6624381230005], [114, 1.4322218894964], [119.606977611, 1.4322218894964], [119.606977611, 7.6624381230005],
                ],
            ],
        ];
    }
}
