<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 31°20'N to 32°N; 131°E to 132°E.
 * @internal
 */
class Extent2525
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [131.54920497702, 31.999266666667], [131, 31.999266666667], [131, 31.332566666667], [131.54920497702, 31.332566666667], [131.54920497702, 31.999266666667],
                ],
            ],
        ];
    }
}
