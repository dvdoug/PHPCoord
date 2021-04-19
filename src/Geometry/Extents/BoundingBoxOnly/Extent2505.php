<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 34°N to 34°40'N; 136°E to 137°E.
 * @internal
 */
class Extent2505
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [136.98189657427, 34.666066666667], [136, 34.666066666667], [136, 33.999366666667], [136.98189657427, 33.999366666667], [136.98189657427, 34.666066666667],
                ],
            ],
            [
                [
                    [137, 34.666066666667], [136.86797416396, 34.666066666667], [136.86797416396, 34.524712698273], [137, 34.524712698273], [137, 34.666066666667],
                ],
            ],
        ];
    }
}
