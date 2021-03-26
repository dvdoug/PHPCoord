<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 32°40'N to 33°20'N; 133°E to 134°E.
 * @internal
 */
class Extent2520
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [133.36240685356, 33.332666666667], [133, 33.332666666667], [133, 32.702989750596], [133.36240685356, 32.702989750596], [133.36240685356, 33.332666666667],
                ],
            ],
            [
                [
                    [134, 33.332666666667], [133.99048019931, 33.332666666667], [133.99048019931, 33.321671227063], [134, 33.321671227063], [134, 33.332666666667],
                ],
            ],
        ];
    }
}
