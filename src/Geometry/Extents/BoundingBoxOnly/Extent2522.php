<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 32°N to 32°40'N; 129°54'E to 131°E.
 * @internal
 */
class Extent2522
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [131, 32.665966666667], [129.89646204236, 32.665966666667], [129.89646204236, 31.999266666667], [131, 31.999266666667], [131, 32.665966666667],
                ],
            ],
        ];
    }
}
