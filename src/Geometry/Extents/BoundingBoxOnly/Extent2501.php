<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 34°N to 34°40'N; 132°E to 133°E.
 * @internal
 */
class Extent2501
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [133, 34.666066666667], [132, 34.666066666667], [132, 33.999366666667], [133, 33.999366666667], [133, 34.666066666667],
                ],
            ],
            [
                [
                    [133, 34.167409742069], [132.71686040006, 34.167409742069], [132.71686040006, 33.999366666667], [133, 33.999366666667], [133, 34.167409742069],
                ],
            ],
        ];
    }
}
