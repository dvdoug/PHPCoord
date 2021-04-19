<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 34°40'N to 35°20'N; 132°E to 133°E.
 * @internal
 */
class Extent2490
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [133, 35.332766666667], [132, 35.332766666667], [132, 34.666066666667], [133, 34.666066666667], [133, 35.332766666667],
                ],
            ],
        ];
    }
}
