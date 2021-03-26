<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 34°N to 34°40'N; 133°E to 134°E.
 * @internal
 */
class Extent2502
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [134, 34.666066666667], [133, 34.666066666667], [133, 33.999366666667], [134, 33.999366666667], [134, 34.666066666667],
                ],
            ],
            [
                [
                    [133.11488113223, 34.150137225038], [133, 34.150137225038], [133, 33.999366666667], [133.11488113223, 33.999366666667], [133.11488113223, 34.150137225038],
                ],
            ],
        ];
    }
}
