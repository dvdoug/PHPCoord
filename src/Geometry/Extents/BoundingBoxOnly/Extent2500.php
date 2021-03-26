<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - north of 34°N; 131°E to 132°E.
 * @internal
 */
class Extent2500
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [132, 34.896292020907], [131, 34.896292020907], [131, 33.999366666667], [132, 33.999366666667], [132, 34.896292020907],
                ],
            ],
        ];
    }
}
