<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents\BoundingBoxOnly;

/**
 * Asia-ExFSU/Japan - 36°40'N to 37°20'N; 137°E to 138°E.
 * @internal
 */
class Extent2472
{
    public function __invoke(): array
    {
        return
        [
            [
                [
                    [137.3047132481, 37.332866666667], [137, 37.332866666667], [137, 37.128810101193], [137.3047132481, 37.128810101193], [137.3047132481, 37.332866666667],
                ],
            ],
            [
                [
                    [138, 37.153257090523], [137, 37.153257090523], [137, 36.666166666667], [138, 36.666166666667], [138, 37.153257090523],
                ],
            ],
        ];
    }
}
