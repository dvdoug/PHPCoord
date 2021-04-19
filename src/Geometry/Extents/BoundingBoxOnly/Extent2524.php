<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 31°20'N to 32°N; 130°E to 131°E.
 * @internal
 */
class Extent2524
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [131, 31.999266666667], [130.10468131288, 31.999266666667], [130.10468131288, 31.332566666667], [131, 31.332566666667], [131, 31.999266666667],
                ],
            ],
        ];
    }
}
