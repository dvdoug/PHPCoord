<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 36°N to 36°40'N; west of137°E.
 * @internal
 */
class Extent2476
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [137, 36.666166666667], [135.90655451367, 36.666166666667], [135.90655451367, 35.999466666667], [137, 35.999466666667], [137, 36.666166666667],
                ],
            ],
        ];
    }
}
