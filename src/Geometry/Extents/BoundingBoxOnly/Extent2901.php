<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Australasia and Oceania/Australia - 138°E to 144°E, 8°S to 12°S (SC54) onshore.
 * @internal
 */
class Extent2901
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [143.30864365835, -10.656530380249], [141.77851852359, -10.656530380249], [141.77851852359, -12], [143.30864365835, -12], [143.30864365835, -10.656530380249],
                ],
            ],
        ];
    }
}
