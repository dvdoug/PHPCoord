<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 32°40'N to 33°20'N; 131°E to 132°E.
 * @internal
 */
class Extent2518
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [132, 33.332666666667], [131, 33.332666666667], [131, 32.665966666667], [132, 32.665966666667], [132, 33.332666666667],
                ],
            ],
            [
                [
                    [132, 33.332666666667], [131.96003969472, 33.332666666667], [131.96003969472, 33.293479502724], [132, 33.293479502724], [132, 33.332666666667],
                ],
            ],
        ];
    }
}
