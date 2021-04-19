<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 34°N to 34°40'N; 134°E to 135°E.
 * @internal
 */
class Extent2503
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [135, 34.666066666667], [134, 34.666066666667], [134, 33.999366666667], [135, 33.999366666667], [135, 34.666066666667],
                ],
            ],
        ];
    }
}
