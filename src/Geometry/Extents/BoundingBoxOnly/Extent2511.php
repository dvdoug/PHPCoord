<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 33°20'N to 34°N; 132°E to 133°E.
 * @internal
 */
class Extent2511
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [132.51158553285, 33.999366666667], [132, 33.999366666667], [132, 33.721408694788], [132.51158553285, 33.721408694788], [132.51158553285, 33.999366666667],
                ],
            ],
            [
                [
                    [133, 33.999366666667], [132, 33.999366666667], [132, 33.332666666667], [133, 33.332666666667], [133, 33.999366666667],
                ],
            ],
        ];
    }
}
