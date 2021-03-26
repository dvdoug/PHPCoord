<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 44°N to 44°40'N; 142°E to 143°E.
 * @internal
 */
class Extent2430
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [143, 44.666566666667], [142, 44.666566666667], [142, 43.999866666667], [143, 43.999866666667], [143, 44.666566666667],
                ],
            ],
        ];
    }
}
